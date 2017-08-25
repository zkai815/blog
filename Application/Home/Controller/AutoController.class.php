<?php
namespace Home\Controller;
use Think\Controller;
class AutoController extends Controller
{
    public function _initialize(){
        //记录来访用户信息
        save_access();
        //获取配置
        $result = do_set();
    }
}