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
<form class="layui-form" action="<?php echo U('Article/add');?>" method="post" enctype="multipart/form-data" id="ff">
    <div class="layui-form-item">
        <label class="layui-form-label">文章标题</label>
        <div class="layui-input-block">
            <input type="text" name="article_name" id="article_name" required  lay-verify="required" placeholder="请输入文章标题" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章作者</label>
        <div class="layui-input-inline">
            <input type="text" name="article_author" required lay-verify="required" placeholder="请输入文章作者" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">笔名也可以哦</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章图片</label>
        <div class="layui-input-block">
            <input type="file" name="img" class="layui-upload-file" id="img">
            <input type="hidden" class="tupian" name="img_path" value="">
            <img src="" alt="" width="40px" height="40px" id='img_show'>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章分类</label>
        <div class="layui-input-block">
            <select name="type_id" lay-verify="required">
                <?php if(is_array($res)): foreach($res as $key=>$v): ?><option value="<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
            </select>

        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章标签</label>
        <div class="layui-input-block">
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><!--<input type="checkbox" name="like[write]" title="写作">-->
            <input type="checkbox" name="my_tally_id[]" value="<?php echo ($v["tally_id"]); ?>" checked><?php echo ($v["tally_name"]); ?>
            <!--<input type="checkbox" name="like[dai]" title="发呆">--><?php endforeach; endif; ?>
        </div>
    </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否展示</label>
        <div class="layui-input-block">
            <input type="radio" name="article_status" value="1" title="展示" checked>
            <input type="radio" name="article_status" value="0" title="不展示" >
        </div>
    </div>

    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">文本域</label>
    </div>
    <!--编辑器-->
    <div id="test-editormd">
        <textarea style="display:none;" id="ts" name="article_message"></textarea>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="submit" value="立即提交" class="layui-btn" lay-submit lay-filter="formDemo"/>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="/Public/Admin/js/jquery-1.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/messages_zh.js"></script>
<script type="text/javascript" src="/Public/Admin/layer-v3.0.3/layer/layer.js"></script>
<script src="/Public/Admin/plugin/layui/layui.js"></script>
<script>
    //文件上传
    layui.use('upload', function(){
        layui.upload({
            elem:'#img'
            ,url: '/Admin.php/Article/getUpload'
            ,method: 'post' //上传接口的http类型
            ,before: function(input){
                //返回的参数item，即为当前的input DOM对象
                console.log('文件上传中');
            }
            ,success: function(res){


                if(res.code==1){
                    var imgpath=res.data.src;
                    $(".tupian").val(imgpath);
                    $("#img_show").attr('src',imgpath.substr(1));
                }else{
                    layer.msg(res.msg);
                }
            }
        });
    });

</script>
<script>
//    $(function(){
//        $("#ff").validate({
//            rules:{
//                article_name:{
//                    required:true,
//                    remote:{
//                        url: "<?php echo U('Admin/Article/do_add');?>",     //后台处理程序
//                        type: "post",               //数据发送
//                        dataType: "json",           //接受数据格式
//                        data:{                      //要传递的数据
//                            article_name: function(){
//                                return $("#article_name").val();
//                            }
//                        }
//                    }
//                }
//            },
//            messages:{
//                article_name:{
//                    required:"标题必须填",
//                    remote:"标题已经存在"
//                }
//            },
//            //重写错误信心，提示
//            showErrors:function(errorMap,errorList){
//                console.log(errorMap,errorList);
//                var msg = '';
//                $.each(errorList,function(k,v){
//                    msg += (v.message +"\r\n");
//                })
//                if(msg != ''){
//                    layer.msg(msg);
//                } //失去焦点
//                onfocusout:false;
//            }
//        })
//    })

    //Demo
    layui.use('form', function(){
        var form = layui.form();
        var url = U('Article/add');

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
            width   : "1500",
            height  : 540,
            syncScrolling : "single",
            path    : "/Public/Admin/markdown/lib/"
        });
    });
</script>