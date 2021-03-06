<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/Public/Admin/css/layuis.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<a class="layui-btn layui-btn-normal" href="<?php echo U('Admin/show');?>">管理员列表</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>密码修改</legend>
</fieldset>
<form class="layui-form" action="<?php echo U('Admin/do_update');?>" method="post" id="ff">
    <div class="layui-form-item">
        <label class="layui-form-label">管理员名称</label>
        <div class="layui-input-block">
            <input name="login_name"  value="<?php echo ($res["login_name"]); ?>" lay-verify="title" autocomplete="off" placeholder="请输入管理员名称" class="layui-input" type="text">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">旧密码</label>
        <div class="layui-input-block">
            <input name="login_pwd" id="login_pwd" lay-verify="title" autocomplete="off" placeholder="请输入管理员密码" class="layui-input" type="password">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">新密码</label>
        <div class="layui-input-block">
            <input type="hidden" name="login_id" value="<?php echo ($res["login_id"]); ?>"/>
            <input name="repwd"  placeholder="请输入管理员确认密码" class="layui-input" type="password">
        </div>
    </div>
    <label class="layui-form-label"></label>
    <div class="layui-form-item">
        <input type="submit" value="提交" class="layui-btn" lay-submit="" lay-filter="demo1"/>
    </div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jq.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/messages_zh.js"></script>
<script>
    $(function(){
        $("#ff").validate({
            rules: {
                login_name: "required",
                login_pwd: "required",
                repwd: "required"
            },
            messages:{
                login_name: "<p style='color: #ff4500'>请输入您的名字</p>",
                login_pwd: "<p style='color: #ff4500'>请输入您的旧密码</p>",
                repwd: "<p style='color: #ff4500'>请输入您的新密码</p>"
            }
        })
    });
</script>
</html>