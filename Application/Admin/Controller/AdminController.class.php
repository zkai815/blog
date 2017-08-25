<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController
{
    public function show()
    {
        $p = I('get.p',1);
        $count = M('login')->count();
        $pages = $this->getPage($count);
        $res = M('Login')->page($p.','.$this->result['set_page'])->select();
        $this->assign('pages',$pages);
        $this->assign('res',$res);
        $this->display();
    }

    public function add()
    {
        if(IS_POST)
        {
            $data['login_name'] = I('post.login_name');
            $data['login_pwd'] = I('post.login_pwd','','md5');
            $db = D('login');
            if(!$db->create())
            {
                $this->error($db->getError());
            }
            else
            {
                $data = $db->add($data);
                if($data)
                {
                    get_log("管理员添加".$data['login_name']);
                    $this->success('添加成功',U('Admin/show'),2);
                }
                else
                {
                    $this->error('添加失败');
                }
            }

        }
        else
        {
            $this->display();
        }
    }

    public function del()
    {
        $id = I("param.id");
        $res = M('login')->where("login_id = $id")->delete();
        if($res)
        {
            get_log("管理员删除".$res['login_name']);
            $this->success('删除成功',U('Admin/show'),2);
        }
        else
        {
            $this->error('删除失败');
        }
    }
    public function update()
    {
        $id = I('param.id');
        $db = M('login');
        $res = $db->where("login_id = $id")->find();
        $this->assign('res',$res);
        $this->display('Admin/update');
    }

    public function do_update()
    {
        $param = I('post.');
        $db = M('login');
        $data = $db->where("login_id =". $param['login_id'])->find();

        if(empty($data['salt']))
        {
            if(md5($param['login_pwd'])!=$data['login_pwd'])
            {
                $this->error('你输入的原密码有误！请重新输入');exit;
            }
            else
            {
                $res = $db->where("login_id=".$param['login_id'])->save(['login_name' => $param['login_name'],'login_pwd'=>md5($param['repwd'])]);
                if($res)
                {
                    get_log("管理员修改密码".$data['login_name']);
                    $this->success("密码修改成功",U('Admin/show'));
                }
                else
                {
                    $this->error('密码修改失败请重试');exit;
                }
            }
        }
        else
        {
            if(md5(md5($param['login_pwd']).$data['salt']) != $data['login_pwd'])
            {
                $this->error('原密码不正确，请重新输入');exit;
            }
            else
            {
                $res = $db->where("login_id=".$param['login_id'])->save(['login_name' => $param['login_name'],'login_pwd'=>md5(md5($param['repwd']).$data['salt'])]);
                if($res)
                {
                    get_log("管理员修改密码".$data['login_name']);
                    $this->success("密码修改成功",U('Admin/show'));
                }
                else
                {
                    $this->error('密码修改失败请重试');exit;
                }
            }
        }
    }
}