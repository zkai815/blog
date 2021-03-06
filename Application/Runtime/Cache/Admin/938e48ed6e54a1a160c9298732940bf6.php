<?php if (!defined('THINK_PATH')) exit();?><link rel="shortcut icon" href="/Public/Admin/images/Logo_40.png" type="image/x-icon">
<!-- layui.css -->
<link href="/Public/Admin/plugin/layui/css/layui.css" rel="stylesheet" />
<!-- font-awesome.css -->
<link href="/Public/Admin/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!-- animate.css -->
<link href="/Public/Admin/css/animate.min.css" rel="stylesheet" />
<!-- 本页样式 -->
<link href="/Public/Admin/css/main.css" rel="stylesheet" />
<style>
</style>
<script src="/Public/Admin/js/jq.js"></script>
<link rel="stylesheet" href="/Public/Admin/markdown/css/editormd.css"/>
<script src="/Public/Admin/markdown/editormd.js"></script>
<form class="layui-form" action="<?php echo U('Set/add');?>" method="post" enctype="multipart/form-data">
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-block">
            <input type="text" name="set_name" value="<?php echo ($result["set_name"]); ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">网站地址</label>
        <div class="layui-input-inline">
            <input type="text" name="set_url" value="<?php echo ($result["set_url"]); ?>" required  lay-verify="required" placeholder="请输入网站地址" autocomplete="off" class="layui-input">
        </div>

    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">分页数</label>
        <div class="layui-input-inline">
            <input type="text" name="set_page" value="<?php echo ($result["set_page"]); ?>" required  lay-verify="required" placeholder="请输入网站分页数" autocomplete="off" class="layui-input">
        </div>

    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否展示</label>
        <div class="layui-input-block">
            <input type="radio" name="set_show" value="1" title="展示" <?php if($result['set_show'] == 1): ?>checked="true"<?php endif; ?>>
            <input type="radio" name="set_show" value="0" title="不展示"  <?php if($result['set_show'] == 0): ?>checked="true"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="submit" value="立即提交" class="layui-btn" lay-submit lay-filter="formDemo"/>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script src="/Public/Admin/plugin/layui/layui.js"></script>
<script>
    //Demo
    layui.use('form', function(){
        var form = U('Set/add');



        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
    //    调用编辑器
    var testEditor;
    $(function(){
        testEditor = editormd("test-editormd", {
            width   : "600px",
            height  : 540,
            syncScrolling : "single",
            path    : "/Public/Admin/markdown/lib/"
        });
    });
</script>