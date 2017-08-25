<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="//res.layui.com/layui/build/css/layui.css"  media="all">
</head>
<body>
<a class="layui-btn layui-btn-normal" href="<?php echo U('Login/add');?>">管理员添加</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>管理员列表</legend>
</fieldset>

<div class="layui-form">
    <table class="layui-table">
        <colgroup>
            <col width="50">
            <col width="150">
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th><input name="" lay-skin="primary" lay-filter="allChoose" type="checkbox"></th>
            <th>管理员名称</th>
            <th>管理员密码</th>
            <th>登录时间</th>
            <th>登录IP</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($res)): foreach($res as $key=>$v): ?><tr>
            <td><input name="" lay-skin="primary" type="checkbox"></td>
            <td><?php echo ($v["login_name"]); ?></td>
            <td><?php echo ($v["login_pwd"]); ?></td>
            <td><?php echo ($v["login_time"]); ?></td>
            <td><?php echo ($v["login_ip"]); ?></td>
            <td>
                <div class="layui-btn-group">
                    <a class="layui-btn layui-btn-small"><i class="layui-icon"></i></a>
                    <a class="layui-btn layui-btn-small" href="<?php echo U('Login/del');?>?id=<?php echo ($v["login_id"]); ?>"><i class="layui-icon"></i></a>
                </div>
            </td>
        </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>