<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index()
    {
        $this->display('User/index');
    }
    public function login(){
            $name  = I('post.name');
            $pwd  = I('post.pwd');
            $db = M('user');
            $data = $db->where(["name"=>$name])->find();
            if(empty($data['salt']))
            {
                if($data['pwd'] != md5($pwd))
                {
                    echo 1;
                }
                else
                {
                    session('id',$data['user_id']);
                    $salt = rand(1,9999);
                    $ip = $data['ip'] = get_client_ip();
                    $time = $data['time'] = time();
                    $pwd = md5(md5($pwd).$salt);
                    $db->where(["user_id"=>$data['user_id']])
                        ->save(["pwd"=>$pwd,"salt"=>$salt,"ip"=>$ip,"time"=>$time]);
                    echo 0;
                }
            }
            else
            {
                if($data['pwd']!= md5(md5($pwd).$data['salt']))
                {
                    echo 1;
                }
                else
                {
                    echo 0;
                    session('id',$data['user_id']);
                }
            }
    }


    public function tui(){
        session_destroy();
        $this->error('退出成功',U('Index/index'));
    }
}