<?php
namespace Admin\Controller;
use Think\Controller;
class PassController extends CommonController
{
    //回收站展示
    public function show()
    {
        $res = M('article')->where(['article_del'=>0])->select();
        $this->assign('res',$res);
        $this->display();
    }

    //回收站还原
    public function del()
    {
        $id = I('get.id');
        $res = M('article')->where(['article_id'=>$id])->save(['article_del'=>1]);
        if($res)
        {
            $this->redirect('Pass/show');
        }
        else
        {
            $this->error('操作有误，请重新还原');
        }
    }

    //彻底删除数据
    public function do_del()
    {
        $id = I('get.id');

        $data = M('tally_article')->where(["my_article_id"=>$id])->getField('my_article_id',true);
        $res = M('tally_article')->where(['my_article_id'=>$id])->delete($data);
        M('article')->where(['article_id'=>$id])->delete();
        if($res)
        {
            $this->success('删除数据成功',U('Pass/show'),2);
        }
        else
        {
            $this->error('删除数据失败');
        }
    }
}