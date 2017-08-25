<?php if (!defined('THINK_PATH')) exit();?><link rel="shortcut icon" href="/hongbo/BuLuoGe/Public/Admin/images/Logo_40.png" type="image/x-icon">
<!-- layui.css -->
<link href="/hongbo/BuLuoGe/Public/Admin/plugin/layui/css/layui.css" rel="stylesheet" />
<!-- font-awesome.css -->
<link href="/hongbo/BuLuoGe/Public/Admin/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!-- animate.css -->
<link href="/hongbo/BuLuoGe/Public/Admin/css/animate.min.css" rel="stylesheet" />
<!-- 本页样式 -->
<link href="/hongbo/BuLuoGe/Public/Admin/css/main.css" rel="stylesheet" />
<style>
</style>
<script src="/hongbo/BuLuoGe/Public/Admin/js/jq.js"></script>
<link rel="stylesheet" href="/hongbo/BuLuoGe/Public/Admin/markdown/css/editormd.css"/>
<script src="/hongbo/BuLuoGe/Public/Admin/markdown/editormd.js"></script>
<form class="layui-form" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">文章标题</label>
        <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" placeholder="请输入文章标题" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章作者</label>
        <div class="layui-input-inline">
            <input type="text" name="text" required lay-verify="required" placeholder="请输入文章作者" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">辅助文字</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章分类</label>
        <div class="layui-input-block">
            <select name="city" lay-verify="required">
                <option value="0">请选择</option>
                <?php if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
            </select>

        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章标签</label>
        <div class="layui-input-block">
            <input type="checkbox" name="like[write]" title="写作">
            <input type="checkbox" name="like[read]" title="阅读" checked>
            <input type="checkbox" name="like[dai]" title="发呆">
        </div>
    </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否展示</label>
        <div class="layui-input-block">
            <input type="radio" name="sex" value="0" title="展示" checked>
            <input type="radio" name="sex" value="1" title="不展示" >
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">文本域</label>
        <!--编辑器-->
        <div id="test-editormd">
            <textarea style="display:none; width: 500px" id="ts"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script src="/hongbo/BuLuoGe/Public/Admin/plugin/layui/layui.js"></script>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form();

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
            path    : "/hongbo/BuLuoGe/Public/Admin/markdown/lib/"
        });
    });
</script>