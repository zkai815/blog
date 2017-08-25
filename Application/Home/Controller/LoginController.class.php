<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{
    public function index()
    {
        $this->display('index');
    }
    //图片验证码
    public function verify()
    {
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    public function signUp()
    {
        $data=I('post.');
        $telephone=$data['telephone'];
        $code=$data['code'];
        $selTel=session('telephone');
        $selCode=session('rand');
        $pwd=md5($data['pwd']);
        $ip = get_client_ip();
        $time = time();
        if($telephone==$selTel&&$code==$selCode)
        {
            $res=M('user')->add(array('name'=>$data['name'],'pwd'=>$pwd,'ip'=>$ip,'time'=>$time));
            if($res)
            {
                $this->success('注册成功，请使用注册账号重新登录',U('Index/index'));
            }
        }
        else
        {
            $this->error('请不要瞎搞');
        }
    }


    //验证码识别
    public function verification()
    {
        $verify = I('get.verify');
        $telephone=I('get.telephone');
        $res=$this->check_verify($verify);
        if(empty($telephone))
        {
            echo -1;die;
        }
        if(!$res)
        {
            echo 1;die;
        }
        $this->getInfo($telephone);
    }


    //手机验证码
    public function getInfo($telephone)
    {
        $rand=rand(11111,99999);
        session('rand',$rand);
        session('telephone',$telephone);
        $code=urlencode("code=".$rand);
        $url="http://api.k780.com/?app=sms.send&tempid=50926&param=$code&phone=$telephone&appkey=20001&sign=9d94b2c4e0e5ecca4fad6a9729430116&format=json";
        $content=file_get_contents($url);
        $return=json_decode($content,true);
    }

    //检查是否账号重复
    public function show()
    {
        $data=I('post.name');
        $Login=M('user');
        $res=$Login->where(['name'=>$data])->find();
        if($res)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
    }
}