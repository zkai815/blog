<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta http-equiv="Refresh" content =")"/> -->
<link href="/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/mains.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
<span class="action-span1"><a href="index.php?act=main">小青年后台管理中心 </a> </span><span id="search_id" class="action-span1"> - 系统信息  </span>
<div style="clear:both"></div>
</h1>
<div class="list-div">
  <div style="background:#FFF; padding: 20px 50px; margin: 2px;">
    <table align="center" width="400">
      <tr>
        <td width="50" valign="top">
      
        <?php if(isset($message)){ ?>

           <img src="/Public/Admin/images/yes.gif" width="32" height="32" border="0" alt="warning" />

          <?php } else{ ?>

          <img src="/Public/Admin/images/warning.gif" width="32" height="32" border="0" alt="warning" />

          <?php }?>
    
        </td>
        <td style="font-size: 14px; font-weight: bold"><?php echo isset($message) ? $message : $error;?></td>
      </tr>
      <tr>
        <td></td>
        <td id="redirectionMsg">
          <span class='time' id='waitSecond'><?php echo $waitSecond ?></span>秒之后跳转 >> <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <ul style="margin:0; padding:0 10px" class="msg-link">       
            <li><a href=""></a></li>
          </ul>
        </td>
      </tr>
    </table>
  </div>
</div>
<div id="footer">
	版权所有 &copy; 2017-2020
</div>
</div>

</body>
</html>

<script>

setInterval(function(){
  waitSecond=document.getElementById('waitSecond').innerHTML;
  //href=document.getElementById('href').href;

  if(waitSecond>0)
  {
     document.getElementById('waitSecond').innerHTML=--waitSecond;
  }else{
    location.href=document.getElementById('href').href;
  }

},1000);
</script>