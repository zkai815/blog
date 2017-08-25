<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends AutoController
{
    public function detail()
    {
        $id = I('get.id');
        $res = M('article')->where(['article_id'=>$id])->find();
        $reg = M('type')->where(['is_del'=>1])->select();
        $result = D('Article')->limit(8)->relation(true)->order("article_id desc")->where($where)->select();
        $data = D('Article')->limit(3)->relation(true)->order("article_id desc")->where($where)->select();
        $this->assign('reg',$reg);
        $this->assign('res',$res);
        $this->assign('result',$result);
        $this->assign('data',$data);
        $this->display();
    }
}