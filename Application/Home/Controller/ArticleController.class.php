<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends AutoController
{
    public function article(){
        $param = I('get.keywords');
        $id = I('get.id');
        $where = ['article_del'=>1];
        if(!empty($param))
        {
            $where['article_name'] = array('like',"%$param%");
        }
        if(!empty($id)){
            $where['type_id'] = array('eq',$id);
        }
        $res = D('Article')->limit(8)->relation(true)->order("article_id desc")->where($where)->select();
        $data = D('Article')->limit(3)->relation(true)->order("article_id desc")->where($where)->select();
        $reg = M('type')->where(['is_del'=>1])->select();
        $this->assign('reg',$reg);
        $this->assign('res',$res);
        $this->assign('data',$data);
        $this->display();
    }
    //访问量
    public function setIc()
    {
        $id = I('get.id');
        M('Article')->where(['article_id'=>$id])->setInc('count');
        echo '1';
    }
}