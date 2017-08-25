<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{

    public function login(){
        if(IS_POST)
        {
            $name  = I('post.login_name');
            $pwd  = I('post.login_pwd');
            $yzm  = I('post.login_yzm');
            $res = $this->check_verify($yzm);
            if(!$res)
            {
                $this->error('验证码有误，请重新输入');exit;
            }
            $db = M('login');
            $data = $db->where(["login_name"=>$name])->find();
            if(empty($data['salt']))
            {
                if($data['login_pwd'] != md5($pwd))
                {
                    $this->error('密码错误请重新登录');
                }
                else
                {
                    session('id',$data['login_id']);
                    $salt = rand(1,9999);
                    $ip = $data['login_ip'] = get_client_ip();
                    $time = $data['login_time'] = time();
                    $pwd = md5(md5($pwd).$salt);
                    $db->where(["login_id"=>$data['login_id']])
                        ->save(["login_pwd"=>$pwd,"salt"=>$salt,"login_ip"=>$ip,"login_time"=>$time]);
                    $this->success('登录成功',U('Index/main'),3);
                }
            }
            else
            {
                if($data['login_pwd']!=md5(md5($pwd).$data['salt']))
                {
                    $this->error('密码错误',U('Login/login'),2);
                }
                else
                {
                    session('id',$data['login_id']);
                    get_log("管理员登录");
                    $this->success('登陆成功',U('Index/main'),3);
                }
            }
        }
        else
        {
            $this->display('Login/login');
        }
    }

    public function checked()
    {
            $Verify =     new \Think\Verify();
            $Verify->codeSet = '0123456789';
            $Verify->length   = 3;
            $Verify->entry();
    }
    function check_verify($code,$id='')
    {
        $verify = new \Think\Verify();
        return $verify->check($code,$id);
    }

    public function quit()
    {
        session_destroy();
        get_log("管理员退出");
        $this->success('请重新登录',U('Login/login'),2);
    }

}