<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController
{
    public function show()
    {
        $p = I('get.p',1);
        $count = M('user')->count();
        $pages = $this->getPage($count);
        $res = M('user')->order('user_id desc')->page($p.','.$this->result['set_page'])->select();
        $this->assign('res',$res);
        $this->assign('pages',$pages);
        $this->display();
    }

    public function del()
    {
        $id = I('get.id');
        $res = M('user')->where(['user_id'=>$id])->delete();
        if($res)
        {
            $this->success('删除成功',U('User/show'),2);
        }
        else
        {
            $this->error('删除失败');exit;
        }
    }
}