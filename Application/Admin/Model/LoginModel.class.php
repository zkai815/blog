<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model
{
    protected $_validate = array(
        array('login_name','','标签名称已经存在！',1,'unique',1),
        array('login_pwd','repwd','确认密码不正确','0','confirm')
    );
}