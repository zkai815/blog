<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" ng-app="MyApp">
<head>
    <meta charset="UTF-8">
    <title>Welcome Mywork</title>
    <link rel="stylesheet" href="_PUBLIC__/Admin/css2/boot.css">
    <link rel="stylesheet" href="_PUBLIC__/Admin/css2/lay.css">
    <link rel="stylesheet" href="_PUBLIC__/Admin/css2/log.css">
</head>
<script>
    function myBrowser(){
        var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
        var isOpera = userAgent.indexOf("Opera") > -1;
        if (isOpera) {
            return "Opera"
        }; //判断是否Opera浏览器
        if (userAgent.indexOf("Firefox") > -1) {
            return "FF";
        } //判断是否Firefox浏览器
        if (userAgent.indexOf("Chrome") > -1){
            return "Chrome";
        }
        if (userAgent.indexOf("Safari") > -1) {
            return "Safari";
        } //判断是否Safari浏览器
        if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {
            return "IE";
        }; //判断是否IE浏览器
    }
    var mb = myBrowser();
    if ("IE" == mb) {
        window.location.href="browser.html";
    }
</script>
<body>
<div class="logo"></div>
<div class="login"  ng-controller="loginController">
    <div class="denglu">
        <form role="form" class="form1">
            <div class="form-group">
                <label for="exampleInputEmail1">User name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" ng-model="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">User Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" ng-model="userpas">
            </div>
            <button type="button" class="btn btn-default" ng-click="subUser()">Submit</button>
            <button type="button" class="btn btn-default btn-info" ng-click="zhuce()">No user?</button>
        </form>
    </div>
    <div class="message">
        <ul ng-repeat="datas in logindata">
            <li><span class="glyphicon glyphicon-envelope"></span> {{datas.email}}</li>
            <li><span class="glyphicon glyphicon-phone"></span> {{datas.phone}}</li>
            <li><span class="glyphicon glyphicon-phone-alt"> </span> {{datas.fixedphone}}</li>
            <li><span class="glyphicon glyphicon-home"></span> {{datas.site}}</li>
        </ul>
    </div>
</div>

<script src="_PUBLIC__/Admin/js2/ang.js"></script>
<script src="_PUBLIC__/Admin/js2/angular.js"></script>
<script src="_PUBLIC__/Admin/js2/lay.js"></script>
</body>
</html>