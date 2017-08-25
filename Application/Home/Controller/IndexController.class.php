<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends AutoController {

    public function index()
    {
        $res = D('Article')->limit(8)->relation(true)->order("article_id desc")->where(['article_del'=>1])->select();
        $data = M('links')->select();
        $this->assign('res',$res);
        $this->assign('data',$data);
        $this->display();
    }
}