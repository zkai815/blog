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
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>回收站列表</legend>
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
            <th>文章ID</th>
            <th>文章作者</th>
            <th>文章标题</th>
            <th>文章时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($res)): foreach($res as $key=>$v): ?><tr>
                <td><input name="" lay-skin="primary" type="checkbox"></td>
                <td><?php echo ($v["article_id"]); ?></td>
                <td><?php echo ($v["article_author"]); ?></td>
                <td><?php echo ($v["article_name"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$v["article_time"])); ?></td>
                <td>
                    <div class="layui-btn-group">
                        <a class="layui-btn layui-btn-small" href="<?php echo U('Pass/del');?>?id=<?php echo ($v["article_id"]); ?>">还原</a>
                        <a class="layui-btn layui-btn-small" href="<?php echo U('Pass/do_del');?>?id=<?php echo ($v["article_id"]); ?>">删除</a>
                    </div>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="flickr"><?php echo ($pages); ?></div>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery-1.js"></script>
<script>
    $(".check").change(function(){
        alert(1);
    });
    $(document).on('click','#del',function(){
        alert(1);
    })
</script>
</html>