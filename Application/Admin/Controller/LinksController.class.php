<?php
namespace Admin\Controller;
use Think\Controller;
class LinksController extends CommonController
{
    public function show()
    {
        $p = I('get.p',1);
        $count = M('links')->count();
        $pages = $this->getPage($count);
        $res = M('links')->page($p.','.$this->result['set_page'])->order('links_id desc')->select();
        $this->assign('res',$res);
        $this->assign('pages',$pages);
        $this->display();
    }

    public function add()
    {
        if(IS_POST)
        {
            $param = I('post.');
            $res = M('links')->add($param);
            if($res)
            {
                $this->success('添加成功',U('Links/show',2));
            }
            else
            {
                $this->error('添加失败');exit;
            }
        }
        else
        {
            $this->display();
        }
    }

    public function del()
    {
        $id = I('get.id');
        $res = M('links')->where(['links_id'=>$id])->delete();
        if($res)
        {
            $this->success('删除成功',U('Links/show'),2);
        }
        else
        {
            $this->error('删除失败');exit;
        }
    }

    public function update()
    {
        if(IS_POST)
        {
            $param = I('post.');
            $res = M('links')
                ->where(['links_id'=>$param['links_id']])
                ->save(['links_name'=>$param['links_name'],'links_url'=>$param['links_url'],'links_sort'=>$param['links_sort']]);
            if($res)
            {
                $this->success('修改成功',U('Links/show'),2);
            }
            else
            {
                $this->error('修改失败');exit;
            }
        }
        else
        {
            $id = I('get.id');
            $res = M('links')->where('links_id ='.$id)->find();
            $this->assign('res',$res);
            $this->display();
        }
    }
}