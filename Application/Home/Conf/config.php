<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'my_boke',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'my_',    // 数据库表前缀

    'TMPL_ACTION_ERROR'     =>  'Public/messages', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Public/messages',// 默认成功跳转对应的模板文件

    'HTML_CACHE_ON'     =>    true,  // 开启静态缓存
    'HTML_CACHE_TIME'   =>    60,    // 全局静态缓存有效期（秒）
     'HTML_FILE_SUFFIX'  =>    '.shtml',  // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
        '*'=>array('{$_SERVER.REQUEST_URI|md5}'),
    )
);