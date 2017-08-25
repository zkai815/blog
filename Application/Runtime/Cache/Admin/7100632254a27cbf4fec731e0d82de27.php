<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/page.css" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/Public/Admin/css/layuis.css"  media="all">
</head>
<body>
<!--<a class="layui-btn layui-btn-normal" href="<?php echo U('Admin/add');?>">管理员添加</a>-->
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>操作日志列表</legend>
</fieldset>
<div class="layui-form-item">
    <form action="<?php echo U('log/del');?>" method="post">
    <div class="layui-input-block">
        <select name="time" lay-verify="required">
            <option value="0">请选择</option>
            <option value="1">删除一个月前</option>
            <option value="2">删除三个月前</option>
        </select>
        <input type="submit" value="删除" class="layui-btn layui-btn-small"/>
    </div>
    </form>
</div>
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
            <th>操作时间</th>
            <th>操作内容</th>
            <th>管理员IP</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($res)): foreach($res as $key=>$v): ?><tr>
                <td><input name="" lay-skin="primary" type="checkbox"></td>
                <td><?php echo ($v["log_name"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$v["log_time"])); ?></td>
                <td><?php echo ($v["log_message"]); ?></td>
                <td><?php echo ($v["log_ip"]); ?></td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="flickr"><?php echo ($pages); ?></div>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery-1.js"></script>
<script>

</script>
</html>