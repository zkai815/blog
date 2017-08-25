<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController
{
    //文章展示
    public function show()
    {
        if(IS_AJAX)
        {
            $map=I('get.map','');
            $where = ['article_status'=>1];
            if(!empty($map['keywords']))
            {
                $where['article_name'] = array('like',"%$map[keywords]%");
            }
            if(!empty($map['type_id']))
            {
                $where['type_id'] = array('eq',$map['type_id']);
            }
            $map['stime'] = strtotime($map['stime']);
            $map['etime'] = strtotime($map['etime']);
            if(!empty($map['stime']) || !empty($map['etime']))
            {
                $where['article_time'][] = array('egt',$map['stime']);
            }
            if(!empty($map['etime']))
            {
                $where['article_time'][] = array('elt',$map['etime']);
            }
            $pageSize = I('get.pageSize',5);
            $currentIndex = I('get.currentIndex',1);
            $count = D('Article')->relation(true)->where($where)->count();
            $pages = ceil($count/$pageSize);
            $data = D('Article')->relation(true)->where($where)->order('article_id desc')->page($currentIndex.','.$pageSize)->select();
            echo json_encode(['data'=>$data,'pages'=>$pages]);exit;
        }
        else
        {
            $data = M('type')->where(['is_del'=>1])->select();
            $this->assign('data',$data);
            $this->display('Article/show');
        }
    }
    //文章添加
    public function add()
    {
        if(IS_POST)
        {
            $param['article_name'] = I('post.article_name');
            $param['article_author'] = I('post.article_author');
            $param['article_status'] = I('post.article_status');
            $param['type_id'] = I('post.type_id');
            $my_tally_id = I('post.my_tally_id');
            $param['article_message'] = I('post.article_message');
            $param['article_time'] = time();
            $param['img_path'] = I('post.img_path');
            $param['article_path'] = $param['img_path'];
            unset($param['img_path']);
            $db = D('Article');
            if(!$db->create())
            {
                $this->error($db->getError());
            }
            else
            {
                $data = $db->add($param);
                foreach($my_tally_id as $key =>$v)
                {
                    $result[] = array("my_tally_id" =>$v,"my_article_id"=>$data);
                }
                $res = M('tally_article')->addAll($result);
                if($res)
                {
                    get_log("文章添加");
                    $this->success('添加成功',U('Article/show'),2);
                }
                else
                {
                    $this->error('添加失败',U('Article/add'),1);
                }
            }
        }
        else
        {
            $res = M('type')->where(['is_del'=>1])->select();
            $data = M('tally')->where(['is_del'=>1])->select();
            $this->assign('data',$data);
            $this->assign('res',$res);
            $this->display();
        }
    }
    //前台验证
    public function do_add()
    {
        $param = I('post.article_name');
        $data = M('article')->where(["article_name" => $param])->find();
        if($data)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
    }
    //文章删除
    public function del()
    {
        $id = I('get.id');
        $res = M('article')->where(['article_id'=>$id])->save(['article_del'=>0]);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    //文章修改
    public function update()
    {
        if(IS_POST)
        {
            $param = I('post.');
            $id = $param['article_id'];
            $tally = $param['my_tally_id'];
            $param['article_time'] = time();
            $imgpath = $this->getup('article_path');
            $param['article_path'] = $imgpath;
            M('article')->where(['article_id'=>$id])->save($param);
            M('tally_article')->where(["my_article_id"=>$id])->delete();
            foreach($tally as $key =>$val)
            {
                $result[] = array("my_tally_id" =>$val,"my_article_id"=>$id);
            }
            $res = M('tally_article')->addAll($result);
            if($res)
            {
                $this->success('修改成功',U('Article/show'));
            }
            else
            {
                $this->error('修改失败');
            }
        }
        else
        {
            $id = I('get.id');
            $reg = M('article')->where(['article_id'=>$id])->find();
            $res = M('type')->where(['is_del'=>1,'article_id'=>$id])->select();
            $data = M('tally')->where(['is_del'=>1,'article_id'=>$id])->select();
            $result = M('tally_article')->where(['my_article_id'=>$id])->getField('my_tally_id',true);
            $this->assign('reg',$reg);
            $this->assign('result',$result);
            $this->assign('data',$data);
            $this->assign('res',$res);
            $this->display();
        }
    }


    //文件上传
    public function getUpload()
    {
        $return = $this->upload('img');

        if ($return['isError']) {
            $res = ["code" => 0, "msg" => $return['msg'], "data" => ''];
        } else {
            $res = ["code" => 1, "msg" => "", "data" => ["src" => $return['data']]];
        }
        echo json_encode($res);
    }
}