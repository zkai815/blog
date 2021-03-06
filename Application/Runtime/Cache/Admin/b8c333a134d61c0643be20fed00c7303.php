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
<a class="layui-btn layui-btn-normal" href="<?php echo U('Links/show');?>">友链列表</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>友情链接添加</legend>
</fieldset>
<form class="layui-form" action="<?php echo U('Links/add');?>" method="post" id="ff">
    <div class="layui-form-item">
        <label class="layui-form-label">友链名称</label>
        <div class="layui-input-block">
            <input name="links_name" lay-verify="title" autocomplete="off" placeholder="请输入友链名称" class="layui-input" type="text">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">友链地址</label>
        <div class="layui-input-block">
            <input name="links_url" id="login_url" lay-verify="title" autocomplete="off" placeholder="请输入友链地址" class="layui-input" type="text">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">友链排序</label>
        <div class="layui-input-block">
            <input name="links_sort"  placeholder="请输入友链序号" class="layui-input" type="text">
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
                links_name: "required",
                links_url: "required",
                links_sort: "required"
            },
            messages:{
                links_name: "<p style='color: #ff4500'>请输入您的友链名称</p>",
                links_url: "<p style='color: #ff4500'>请输入您的友链地址</p>",
                links_sort: "<p style='color: #ff4500'>请输入您的友链顺序</p>"
            }
        })
    });
</script>
</html>