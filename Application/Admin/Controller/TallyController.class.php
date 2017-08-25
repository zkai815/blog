<?php
namespace Admin\Controller;
use Think\Controller;
class TallyController extends CommonController
{
    public function show()
    {
        $p = I('get.p',1);
        $db = M('tally');
        $count = $db->count();
        $pages = $this->getPage($count);
        $res = $db ->where(['is_del'=>1])->page($p.','.$this->result['set_page'])->order('tally_id desc')-> select();
        $this->assign('res',$res);
        $this->assign('pages',$pages);
        $this->display();
    }

    public function add()
    {
        if(IS_POST)
        {
            $param = I('post.');
            $db = D('Tally');
            if(!$db->create())
            {
                $this->error($db->getError());
            }
            else
            {
                $res = $db -> add($param);
                if($res)
                {
                    get_log("标签添加");
                    $this->success('添加成功',U('Tally/show'),2);
                }
                else
                {
                    $this->error('添加失败');
                }
            }
        }
        else
        {
            $this->display();
        }
    }


    public function do_add()
    {
        $param = I('post.tally_name');
        $data = M('tally')->where(["tally_name" => $param])->find();
        if($data)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
    }

    public function update()
    {
        if(IS_POST)
        {
            $param = I('post.');
            $res = M('tally')->where('tally_id='.$param['tally_id'])->save(['tally_name'=>$param['tally_name']]);
            if($res)
            {
                get_log('标签名修改'.$param['tally_name']);
                $this->success('修改成功',U('Tally/show'));
            }
            else
            {
                $this->error('修改失败');
            }
        }
        else
        {
            $id = I('get.id');
            $res = M('tally')->where('tally_id ='.$id)->find();
            $this->assign('res',$res);
            $this->display();
        }
    }
    public function del()
    {
        $id = I("param.id");
        $res = M('tally')->where("tally_id = $id")->save(['is_del'=>0]);
        if($res)
        {
            get_log('标签名删除');
            $this->success('删除成功',U('Tally/show'),2);
        }
        else
        {
            $this->error('删除失败');
        }
    }

}