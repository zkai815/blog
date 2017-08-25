<?php
namespace Admin\Controller;
use Think\Controller;
class LogController extends CommonController
{

    //日志展示
    public function show()
    {
        $p = I('get.p',1);
        $count = M('log')->count();
        $pages = $this->getPage($count);
        $res = M('log')->page($p.','.$this->result['set_page'])->select();
        $this->assign('pages',$pages);
        $this->assign('res',$res);
        $this->display();
    }


    //清除日志记录
    public function del()
    {
        $param = I('post.time');
        $log = time() - $param * 3600 * 24 * 30;
        $res['log_time'] = array('elt',$log);
        $data = M('log')->where($res)->delete();
        if($data)
        {
            $this->success('删除成功',U('Log/show'),2);
        }
        else
        {
            $this->error('删除失败');exit;
        }
    }
}