<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="/Public/Admin/css/fakeloader.css">
    </head>
    <body>  
    <div class="fakeLoader">
   
    </div>
    <div class="fl" style="position: absolute;left: 350px;top: 360px;color: #fff;font-size: 17px;z-index: 999;margin-top: 50px;margin-left: -60px;">
        <center>
        <b>
            <?php if(isset($message)){?>
              <!-- <img src="/Public/images/yes.gif" width="70" height="70" border="0"  /> -->
            <?php }else{ ?>
              <!-- <img src="/Public/images/warning.gif" width="70" height="70" border="0"  /> -->
            <?php }?>

            <?php echo isset($message) ? $message : $error;?> <br>
          </b>      
            <span id="waitsecond"><?php echo $waitSecond;?></span> 秒之后跳转>> <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a>
        </center>                                
                                          
    </div> 


<script src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
<script src="/Public/Admin/js/jquery.validate.js"></script>
<script src="/Public/Admin/js/messages_zh.js"></script>
        <script>
            setInterval(function(){
                var waitsecond = document.getElementById('waitsecond').innerHTML;
                if(waitsecond > 0){
                    document.getElementById('waitsecond').innerHTML = -- waitsecond;
                }else{
                    location.href=document.getElementById('href').href;
                }
            },1000);
            
        </script>
        <script src="/Public/Admin/js/fakeloader.min.js"></script>
        <script type="text/javascript">
            // $(".fakeLoader").fakeLoader();

            $(".fakeLoader").fakeLoader({
                timeToHide:1200000, //加载效果的持续时间
                zIndex:"999",//
                spinner:"spinner3",//可选值 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7' 对应有7种效果
                bgColor:"#2ecc91", //加载时的背景颜色
                // imagePath:"/Public/images/yes.gif" //自定义的加载图片，见demo8.html
            });
        </script>
    </body>
</html>