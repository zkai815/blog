<?php
namespace Admin\Controller;
use Think\Controller;
class SortController extends CommonController {
    public function show()
    {
        $p = I('get.p',1);
        $count = M('type')->count();
        $pages = $this ->getPage($count);
        $res = M('type')->where(['is_del'=>1])->page($p.','.$this->result['set_page'])->order('type_id desc')->select();
        $this->assign('res',$res);
        $this->assign('pages',$pages);
        $this->display();
    }

    public function add()
    {
        if(IS_POST)
        {
            $param = I('post.');
            $db = D('Type');
            if(!$db->create($param))
            {
                $this->error($db->getError());
            }
            else
            {
                $data = $db -> add($param);
                if($data)
                {
                    get_log("分类添加");
                    $this->success('添加成功',U('Sort/show'),2);
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
        $param = I('post.type_name');
        $data = M('type')->where(["type_name" => $param])->find();
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
        if (IS_POST)
        {
            $param = I('param.');
            $res = M('type')->where('type_id ='.$param['type_id'])->save(['type_name'=>$param['type_name']]);
            if($res)
            {
                get_log('分类修改'.$param['type_name']);
                $this->success('修改成功',U('Sort/show'),2);
            }
            else
            {
                $this->error('修改失败');exit;
            }
        }
        else
        {
            $id = I('get.id');
            $res = M('type')->where('type_id ='.$id)->find();
            $this->assign('res',$res);
            $this->display();
        }
    }

    public function del()
    {
        $param = I('param.id');
        $reg = M('type')->where("type_id = $param")->save(['is_del'=>0]);
        if($reg)
        {
            get_log('分类删除');
            $this->success('删除成功',U('Sort/show'),2);
        }
        else
        {
            $this->error('已放入回收站');
        }
    }
}