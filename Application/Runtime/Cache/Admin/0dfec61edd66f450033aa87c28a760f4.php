<?php if (!defined('THINK_PATH')) exit();?>﻿

<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />

    <meta name="keywords" content="数据库，SQL，建模，设计，数据库设计，数据库建模，数据库设计工具">
    <meta name="description" content="在线数据库设计工具，每隔3分钟自动保存草稿，一键下载数据库文档和脚本，脚本可以直接创建生成数据库，窗口可以最小化最大化，方便使用">

    <title>小青年登录入口</title>
    <link href="/Public/Admin/css/layui.css" rel="stylesheet" />

    <style>
        body{
            width:100%;
            height:100%;
            margin:0;
            padding:0;
            background:url("/Public/Admin/1.jpg");
            background-size:100%;
        }

        .main {
            width: 600px;
            margin: 0 auto;
            margin-top: 150px;
            background-color: transparent;
            color:#fff;
        }

        .formbox {
            padding: 30px;
            padding-left: 0;
        }

        .formbox input {
            background-color: transparent;
        }
    </style>


</head>





<body>
<div class="main">


    <fieldset class="layui-elem-field">
        <legend style="color: #ff8a47">登录</legend>
        <div class="formbox">
            <form class="layui-form" action="<?php echo U('Login/login');?>" method="post" id="font">
                <div class="layui-form-item">
                    <label class="layui-form-label">帐号</label>
                    <div class="layui-input-block">
                        <input type="text" name="login_name" required lay-verify="required" placeholder="帐号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="login_pwd" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux"></div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">验证码</label>
                    <div class="layui-input-inline">
                        <input type="text" name="login_yzm" required lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input">
                        <img src="<?php echo U('Admin/Login/checked');?>" onclick="checked(this)" alt="" width="185" height="40"/>
                    </div>
                    <div class="layui-form-mid layui-word-aux"></div>
                </div>



                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="submit" value="登录" class="layui-btn" lay-submit lay-filter="reg" style="background-color: #0dffa0">
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>



                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <a onclick="Reg()" style="cursor:pointer;">现在注册帐号</a>
                    </div>
                </div>
            </form>

        </div>
    </fieldset>

    <script src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
    <script src="/Public/Admin/js/layui.js"></script>
    <script src="/Public/Admin/js/jquery.validate.js"></script>
    <script src="/Public/Admin/js/messages_zh.js"></script>
    <script>
        function checked(obj){
            obj.src="<?php echo U('Login/checked');?>?a="+Math.random();
        }
    </script>
    <script>
        function Reg() {


            layer.open({
                type: 2,
                title: "注册",
                skin: 'layui-layer-rim', //加上边框
                area: ['600px', '300px'], //宽高
                content: "/home/reg"
            });


        }

        $(document).ready(function () {

            $(".main").css("margin-top", ($(window).height() - $(".main").height()) * 0.5 + "px");


        });

    </script>
</div>


<div  style="    position: fixed;
    bottom: 0;
   color:#fff;
    width: 100%;
    text-align: center;
}">问题反馈：573595216@qq.com</div>

</body>


</html>