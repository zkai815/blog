<?php
//基础设置
function do_set()
{
    $result = S('result');
    if($result)
    {
        return $result;
    }
    else
    {
        $dataList = M('set')->select();
        $result = [];
        foreach($dataList as $key =>$val)
        {
            $result[$val['set_name']] = $val['set_value'];
        }
        echo "Running";
        //缓存
        S('result',$result);
        return $result;
    }
}
//记录用户来访时间
    function save_access()
    {
        $user = session('username');
        $username = isset($user)?$user : "";
        $data = ['ip'=>get_client_ip(),'acs_time'=>$_SERVER['REQUEST_TIME'],'user_agent'=>$_SERVER['HTTP_USER_AGENT'],'url'=>$_SERVER['REQUEST_URI'],'user_name'=>$username];
        M('Access')->add($data);
    }
?>