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
<a class="layui-btn layui-btn-normal" href="<?php echo U('Sort/show');?>">分类列表</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>分类修改</legend>
</fieldset>
<form class="layui-form" action="<?php echo U('Sort/update');?>" method="post" id="ff">
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input name="type_name" value="<?php echo ($res["type_name"]); ?>" id="type_name" lay-verify="title" autocomplete="off" placeholder="请输入分类名称" class="layui-input" type="text">
        </div>
    </div>
    <label class="layui-form-label"></label>
    <div class="layui-form-item">
        <input type="hidden" value="<?php echo ($res["type_id"]); ?>" name="type_id"/>
        <input type="submit" value="提交" class="layui-btn" lay-submit="" lay-filter="demo1"/>
    </div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery-1.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/messages_zh.js"></script>
<script type="text/javascript" src="/Public/Admin/layer-v3.0.3/layer/layer.js"></script>
<script>
    $(function(){
        $("#ff").validate({
            rules:{
                type_name:{
                    required:true,
                    remote:{
                        url: "<?php echo U('Admin/Sort/do_add');?>",     //后台处理程序
                        type: "post",               //数据发送
                        dataType: "json",           //接受数据格式
                        data:{                     //要传递的数据
                            type_name: function(){
                                return $("#type_name").val();
                            }
                        }
                    }
                }
            },
            messages:{
                type_name:{
                    required:"分类名必须填",
                    remote:"分类名已经存在"
                }
            },
            //重写错误信心，提示
            showErrors:function(errorMap,errorList){
                console.log(errorMap,errorList);
                var msg = '';
                $.each(errorList,function(k,v){
                    msg += (v.message +"\r\n");
                })
                if(msg != ''){
                    layer.msg(msg);
                } //失去焦点
                onfocusout:false;
            }
        })
    })



</script>
</html>