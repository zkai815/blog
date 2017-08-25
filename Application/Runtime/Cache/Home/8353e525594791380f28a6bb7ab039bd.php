<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; Charset=gb2312">
    <meta http-equiv="Content-Language" content="zh-CN">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>小青年</title>
    <link rel="shortcut icon" href="/Public/Home/images/Logo_40.png" type="image/x-icon">
    <!--Layui-->
    <link href="/Public/Home/plug/layui/css/layui.css" rel="stylesheet" />
    <!--font-awesome-->
    <link href="/Public/Home/plug/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!--全局样式表-->
    <link href="/Public/Home/css/global.css" rel="stylesheet" />
    <!-- 首页样式表 -->
    <link href="/Public/Home/css/home.css" rel="stylesheet" />
    <!--文章样式表-->
    <link href="/Public/Home/css/article.css" rel="stylesheet" />
    <!-- 详情样式表 -->
    <link href="/Public/Home/css/detail.css" rel="stylesheet" />
    <!-- 资源样式表 -->
    <link href="/Public/Home/css/resource.css" rel="stylesheet" />
    <!-- 时间样式表 -->
    <link href="/Public/Home/css/timeline.css" rel="stylesheet" />
    <!-- 本站样式表 -->
    <link href="/Public/Home/css/about.css" rel="stylesheet" />
    <?php echo ($config["TONGJI"]); ?>
</head>
<body>
<!-- 导航 -->
<nav class="blog-nav layui-header">
    <div class="blog-container">
        <div class="blog-container">
            <!-- QQ互联登陆 -->
            <a href="javascript:;" class="blog-user">
                <i class="fa fa-qq"></i>
            </a>
            <a href="javascript:;" class="blog-user layui-hide">
                <img src="/Public/Home/images/Absolutely.jpg" alt="ZhangKai" title="ZhangKai" />
            </a>

        <a class="blog-logo" href="<?php echo U('Home/index/index');?>">小青年</a>
        <!-- 导航菜单 -->
        <ul class="layui-nav" lay-filter="nav">
            <li class="layui-nav-item layui-this">
                <a href="<?php echo U('Home/index/index');?>"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Home/Article/article');?>"><i class="fa fa-file-text fa-fw"></i>&nbsp;文章专栏</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Home/Resource/resource');?>"><i class="fa fa-tags fa-fw"></i>&nbsp;资源分享</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Home/Timeline/timeline');?>"><i class="fa fa-hourglass-half fa-fw"></i>&nbsp;点点滴滴</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Home/About/about');?>"><i class="fa fa-info fa-fw"></i>&nbsp;关于本站</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Home/User/Index');?>">&nbsp;登录</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo U('Home/Login/index');?>">&nbsp;注册</a>
            </li>

        </ul>
        <!-- 手机和平板的导航开关 -->
        <a class="blog-navicon" href="javascript:;">
            <i class="fa fa-navicon"></i>
        </a>
    </div>
</nav>
    <!-- 主体（一般只改变这里的内容） -->
<script src="/Public/Admin/js/jq.js"></script>
<link rel="stylesheet" href="/Public/Admin/markdown/css/editormd.css"/>
<script src="/Public/Admin/markdown/editormd.js"></script>
<style>
    p.start-gradient {
        font-weight: bold;
        font-family: helvetica;
        text-align:center;
        background: -webkit-linear-gradient(left, #4f185d , #fe5d4b);     /* 背景色渐变 */
        -webkit-background-clip: text;         /* 规定背景的划分区域 */
        -webkit-text-fill-color: transparent;  /* 防止字体颜色覆盖 */

        font-family:Arial,Helvetica,sans-serif;
        font-size:1.4em;
        vertical-align:middle;
        font-weight:normal
    }
</style>
    <div class="blog-body">
        <div class="blog-container">
            <blockquote class="layui-elem-quote sitemap layui-breadcrumb shadow">
                <a href="<?php echo U('Home/index/index');?>" title="网站首页">网站首页</a>
                <a href="<?php echo U('Home/Article/article');?>" title="文章专栏">文章专栏</a>
                <a><cite>基于layui的laypage扩展模块！</cite></a>
            </blockquote>
            <div class="blog-main">
                <div class="blog-main-left">
                    <!-- 文章内容（使用Kingeditor富文本编辑器发表的） -->
                    <div class="article-detail shadow">
                        <div class="article-detail-title">
                            <?php echo ($res["article_name"]); ?>
                        </div>
                        <div class="article-detail-info">
                            <span>编辑时间：<?php echo (date('Y-m-d H:i:s',$res["article_time"])); ?></span>
                            <span>作者：<?php echo ($res["article_author"]); ?></span>
                            <span id="<?php echo ($res["article_id"]); ?>">浏览量：<?php echo ($res["count"]); ?></span>
                            <input type="hidden" name="" class="id" value="<?php echo ($res["article_id"]); ?>"/>
                        </div>
                        <div class="article-detail-content">
                            <p style="text-align:center;">
                                <strong><span style="font-size:18px;">小赌为快</span></strong>
                            </p>
                            <p style="text-align:center;">
                                <strong>
                                    <span style="font-size:18px;">
                                        <br />
                                    </span>
                                </strong>
                            </p>
                            <p style="text-align:center;">
                                <img src="/<?php echo ($res["article_path"]); ?>" width="100%" height="auto" title="pagesize演示" alt="pagesize演示" />
                            </p>
                            <p style="text-align:left;">
                                <br />
                            </p>
                            <hr />
                            <p>
                                <br />
                            </p>
                            <div style="text-align:center;">
                                &nbsp; &nbsp; <span style="color:#EE33EE;">前言</span>：此文章为测试文章，不喜欢那么请忽略这篇文章！
                            </div>
                            <hr />
                            <p>
                                <br />
                            </p>
                            <p class="start-gradient">
                                <!--<pre class="brush: xml"></pre>-->
                                <?php echo ($res["article_message"]); ?>

                            </p>
                            <hr />
                            &nbsp; &nbsp; 出自：小青年
                            <p>
                                &nbsp; &nbsp; 地址：<a href="http://www.vipkai.cn" target="_blank">www.vipkai.cn</a>
                            </p>
                            <p>
                                &nbsp; &nbsp; 转载请注明出处！<img src="http://www.lyblogs.cn/kindeditor/plugins/emoticons/images/0.gif" border="0" alt="" />
                            </p>
                            <p>
                                <br />
                            </p>
                        </div>
                    </div>
                    <!-- 评论区域 -->
                    <div class="blog-module shadow" style="box-shadow: 0 1px 8px #a6a6a6;">
                        <!--<fieldset class="layui-elem-field layui-field-title" style="margin-bottom:0">-->
                            <!--<legend>来说两句吧</legend>-->
                            <!--<div class="layui-field-box">-->
                                <!--<form class="layui-form blog-editor" action="">-->
                                    <!--<div class="layui-form-item">-->
                                        <!--<textarea name="editorContent" lay-verify="content" id="remarkEditor" placeholder="请输入内容" class="layui-textarea layui-hide"></textarea>-->
                                    <!--</div>-->
                                    <!--<div class="layui-form-item">-->
                                        <!--<button class="layui-btn" lay-submit="formRemark" lay-filter="formRemark">提交评论</button>-->
                                    <!--</div>-->
                                <!--</form>-->
                            <!--</div>-->
                        <!--</fieldset>-->
                        <!--<div class="blog-module-title">最新评论</div>-->
                        <!--<ul class="blog-comment">-->
                            <!--<li>-->
                                <!--<div class="comment-parent">-->
                                    <!--<img src="images/Absolutely.jpg" alt="absolutely" />-->
                                    <!--<div class="info">-->
                                        <!--<span class="username">Absolutely</span>-->
                                        <!--<span class="time">2017-03-18 18:46:06</span>-->
                                    <!--</div>-->
                                    <!--<div class="content">-->
                                        <!--我为大家做了模拟评论功能！还有，这个评论功能也可以改成和留言一样，但是目前没改，有兴趣可以自己改-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</li>-->
                        <!--</ul>-->

                        <!--畅言-->
                        <div id="SOHUCS" sid="<?php echo ($res["article_id"]); ?>" ></div>
                        <script type="text/javascript">
                            (function(){
                                var appid = 'cytb1frk0';
                                var conf = 'prod_0fd6d6574fe08729a0e473edc0e05aff';
                                var width = window.innerWidth || document.documentElement.clientWidth;
                                if (width < 960) {
                                    window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>
                    </div>




                </div>
                <div class="blog-main-right">
                    <!--右边悬浮 平板或手机设备显示-->
                    <div class="category-toggle"><i class="fa fa-chevron-left"></i></div><!--这个div位置不能改，否则需要添加一个div来代替它或者修改样式表-->
                    <div class="article-category shadow">
                        <div class="article-category-title">分类导航</div>
                        <!-- 点击分类后的页面和artile.html页面一样，只是数据是某一类别的 -->
                        <?php if(is_array($reg)): foreach($reg as $key=>$v): ?><a href="<?php echo U('Article/article');?>?id=<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); ?></a><?php endforeach; endif; ?>
                        <div class="clear"></div>
                    </div>
                    <div class="blog-module shadow">
                        <div class="blog-module-title">相似文章</div>
                        <ul class="fa-ul blog-module-ul">
                            <?php if(is_array($data)): foreach($data as $key=>$v): ?><li><i class="fa-li fa fa-hand-o-right"></i><a href="<?php echo U('Home/Detail/detail');?>?id=<?php echo ($v["article_id"]); ?>"><?php echo ($v["article_name"]); ?></a></li><?php endforeach; endif; ?>

                        </ul>
                    </div>
                    <div class="blog-module shadow">
                        <div class="blog-module-title">随便看看</div>
                        <ul class="fa-ul blog-module-ul">
                            <?php if(is_array($result)): foreach($result as $key=>$v): ?><li><i class="fa-li fa fa-hand-o-right"></i><a href="<?php echo U('Home/Detail/detail');?>?id=<?php echo ($v["article_id"]); ?>"><?php echo ($v["article_name"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- 底部 -->

</body>
<script src="/Public/Home/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        var id = $('.id').val();
        $.get('/index.php/Home/Article/setIc',{"id":id},function(res){
            console.log(res);
        })
    })
</script>
</html>