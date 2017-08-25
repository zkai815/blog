<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<style>
	.error{
    margin-top: 10px;
		color: red,
		background: yellow;
	}
</style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin index Examples</title>




  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->
  <link rel="apple-touch-icon-precomposed" href="/Public/home/images/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/home/css/amazeui.min.css" />
  <link rel="stylesheet" href="/Public/home/css/admin.css">
  <link rel="stylesheet" href="/Public/home/css/app.css">
</head>
<style>
	.yzm{
		font-size: 20px;
	}
</style>
<body data-type="login">

  <div class="am-g myapp-login">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                Register Admin<span> Login</span> <i class="am-icon-skyatlas"></i>
                
            </div>
        </div>

        <div class="login-font">
            <i><a href="<?php echo U('Index/index');?>">Log In</a></i> or <span>Sign Up</span>
        </div>
        <div class="am-u-sm-10 login-am-center">
            <form class="am-form" action="<?php echo U('Login/signUp');?>" method="post" id="checkForm">
                <fieldset>
                    <div class="am-form-group">
                        <input type="text" class="login_name" name="login_name" id="doc-ipt-email-1 " placeholder="输入账号">
                    </div>
                    <div class="am-form-group">
                        <input type="text" class="login_pwd" name="login_pwd" id="doc-ipt-email-1" placeholder="设置密码"  >
                    </div>
                    <div class="am-form-group">
                        <input type="password" name="readmin_pwd" class="readmin_pwd"  id="doc-ipt-pwd-1" placeholder="确认密码" >
                    </div>
                     <div>
                      <img src="<?php echo U('Login/verify');?>" alt="" class="img"><span  style='color:red;padding-left:80px' id='span'>看不清换一张</span>
                    </div>
                     <div class="am-form-group">
                        <input type="text" name="verify" class="verify"  id="doc-ipt-pwd-1" placeholder="请输入验证码" >
                    </div>
                    <div class="am-form-group">
                        <input type="tel" name="telephone" class="telephone" id="doc-ipt-pwd-1" placeholder="手机号" >

                        <button class="but" type="button">获取验证码</button>
                        <input type="hidden" name="code" class="code" id="doc-ipt-pwd-1" placeholder="验证码" >
                    </div>
                   <!--  <div class="am-form-group">
                        <input type="password" name="readmin_pwd" class="yzm" id="doc-ipt-pwd-1" placeholder="短信验证码" id="readmin_pwd">
                        <button>获取验证码</button>
                    </div> -->
                    <p><button  class="am-btn am-btn-default">立即注册</button></p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script src="/Public/admin/js/jquery-1.js"></script>
<script src="/Public/admin/js/jquery.validate.min.js"></script>
<script src="/Public/admin/js/messages_zh.js"></script>
<script src="/Public/admin/plugin/layer/layer.js"></script>
<script>
$(function(){
	$('#checkForm').validate({
		rules:{
			login_name:   {
        required: true, 
        minlength: 2,
        remote: {
        url: "<?php echo U('Login/show');?>",     //后台处理程序
        type: "post",               //数据发送方式
        dataType: "json",           //接受数据格式   
        data: {                     //要传递的数据
            login_name: function() {
                return $(".login_name").val();
            }
         }
      }
      },
        	login_pwd:    {required: true, minlength: 6},
        	readmin_pwd:  {equalTo: ".login_pwd"},
          verify:       {required:true},
          telephone:   {required: true}
		},
		messages:{

			     login_name:{
	          required:   "<p style='color:yellow;'>请输入账号名称</p>",
	          minlength:  "<p style='color:yellow;'>名称必须由两个字母组成</p>",
             remote:   "<p style='color:yellow;'>账号已经存在</p>"
	        },
	        login_pwd:{
	          required:   "<p style='color:yellow;'>请输入密码</p>",
	          minlength:  "<p style='color:yellow;'>密码长度不能小于 6 个字母</p>"
	        },
          verify:{
            required:   "<p style='color:yellow;'>请输入验证码</p>",
          },
	        readmin_pwd:{
	          equalTo:    "<p style='color:yellow;'>两次输入密码不一致</p>"
		    	},
          telephone:{
             required:  "<p style='color:yellow;'>请输入手机号</p>"
          }
		},
       showErrors : function(errorMap, errorList) {
        var msg = "";
        $.each(errorList, function(i, v) {
            msg += (v.message + "\r\n");
        });
        if (msg != "")
        {
            layer.msg(msg);
        }
          /* 失去焦点时不验证 */
        onfocusout : false;

    },
   
	});


  $("#span").click(function(){

    var url="http://tplog.com/index.php/Home/Login/verify?id="+Math.random(11111,99999);
   $(this).prev().prop('src',url);
  })

  $('.but').click(function(){
    $(this).next().prop('type','tel');
    var telephone = $(this).prev().val();
    var verify=$('.verify').val();
    alert(verify);
      $.get("http://tplog.com/index.php/Home/Login/verification",
        {telephone:telephone,verify:verify}, 
        function(data){
          if(data==1)
          {
            alert('验证码错误');
          }
          if(data==-1){
            alert('手机号为空');
          }
     
      });

  })


});

</script>