<?php
return array(
    'DEFAULT_CONTROLLER'    =>  'Login', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称


    'TMPL_ACTION_ERROR'     =>  'Public/messages', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Public/messages',// 默认成功跳转对应的模板文件

    'PAGE_SIZE'             => 2,               //分页条数

    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'my_boke',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'my_',    // 数据库表前缀

    'UPLOAD_SIZE'           =>  '3145728',      //文件上传大小
    'UPLOAD_ETS'            =>  array('jpg', 'gif', 'png', 'jpeg'),  //文件上传格式

    'URL_HTML_SUFFIX'       =>  'html'
);