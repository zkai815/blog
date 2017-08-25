<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login</title>
<link rel="stylesheet" type="text/css" href="/Public/Home/normalize.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/Public/Home/component.css" />
<!--[if IE]>
<script src="/Public/Home/js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>小青年欢迎你</h3>
						<form action="<?php echo U('User/Login');?>"  method="post">
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="name" id="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="pwd" id="pwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="mb2"><a class="act-but submit" href="javascript:;" style="color: #FFFFFF">登录</a></div>
                            <p align="center"><a href="<?php echo U('Email/index');?>" style="color: #000000">找回密码</a></p>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</body>
<script src="/Public/Home/js/jquery-1.js"></script>
<script src="/Public/Home/js/TweenLite.min.js"></script>
<script src="/Public/Home/js/EasePack.min.js"></script>
<script src="/Public/Home/js/rAF.js"></script>
<script src="/Public/Home/js/demo-1.js"></script>
<script>
    $(function(){
        $(".submit").click(function(){
            var name=$("#name").val();
            var pwd=$("#pwd").val();
            $.ajax({
                url:"<?php echo U('User/login');?>",
                data:{name:name,pwd:pwd},
                type:"post",
                success:function(res)
                {
                    if(res==1)
                    {
                        alert("账号或者密码有误");
                    }
                    else
                    {
                        location.href="<?php echo U('Index/index');?>";
                    }
                }
            })
        })

    });
</script>
</html>