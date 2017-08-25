<?php
//    管理员日志
    function get_log($message)
    {
        $id = session('id');
        $data = ['log_time'=>time(),'log_name'=>$id['login_id'],'log_message'=>$message,'log_ip'=>get_client_ip()];
        M('log')->add($data);
    }

//   清除缓存
    function deleteFile($dirName)
    {
        if(file_exists($dirName))
        {
            $handle = opendir($dirName);
            while(($file = readdir($handle))!== false)
            {
                if($file == '.' || $file == '..')
                {
                    continue;
                }
                if(is_dir($dirName.$file))
                {
                    deleteFile($dirName.$file.'/');
                }
                else
                {
                    //清除文件
                    $result = unlink($dirName.$file);
                    if(!$result)
                    {
                        return false;
                    }
                }
            }
            closedir($handle);
            return true;
        }
    }
?>