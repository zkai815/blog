<?php
namespace Admin\Controller;
use Think\Controller;
class SetController extends CommonController
{
    public function add()
    {
        if(IS_POST)
        {
            $param = I('post.');
            $result = [];
            foreach($param as $key =>$val)
            {
                $result = M('set')->where(['set_name'=>$key])->save(['set_value'=>$val]);
            }
            if($result === false)
            {
                $this->error('配置失败');exit;
            }
            else
            {
                S('result',null);
                $this->success('配置成功');
            }
        }
        else
        {
            $result = do_set();
            $this->assign('result',$result);
            $this->display();
        }
    }
}