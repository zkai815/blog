<?php
namespace Admin\Controller;
use Think\Controller;
class ReviewController extends CommonController
{
    public function show()
    {
        $p = I('get.p',1);
        $count = M('review')->count();
        $pages = $this->getPage($count);
        $res = D('Review')->relation(true)->order('review_id desc')->page($p.','.$this->result['set_page'])->select();
        $this->assign('res',$res);
        $this->assign('pages',$pages);
        $this->display();
    }

    public function del()
    {
        $id = I('get.id');
        $res = M('review')->where(['review_id'=>$id])->delete();
        if($res)
        {
            $this->success('删除成功',U('review/show'),2);
        }
        else
        {
            $this->error('删除失败');
        }
    }
}