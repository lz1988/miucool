<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MiuCool登陆</title>
<link href="../Public/css/login.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function freshverify(){
	document.getElementById('verifyImg').src='__URL__/verify/'+Math.random();  
}
</script>
</head>

<body>

<div class="login">
	<div class="menus">
    	<div class="public"><a href="http://miucool.com" title="米库" target="_blank">MiuCool</a></div>
    </div>
    <div class="box png">
        <form action="__URL__/checklogin" method="post" name="baseform">
        <div class="header">
            <!--<h2 class="logo png"><a href="http://julying.com" target="_blank"></a></h2>-->
            <span class="alt">管理员登录</span>
        </div>
        <ul>
            <li><label>用户名</label><input name="username" type="text" class="text" /></li>
            <li><label>密　码</label><input name="userpwd" type="password" class="text"/></li> 
            <li><label>验证码</label><input name="gbcode" type="text" class="code"/>
            <img src="__URL__/verify/"  id="verifyImg" class="imgcode" title="换一个" onclick="freshverify()"/></li> 
            <li class="submits"><input class="submit" type="submit" value="登录" /></li>
        </ul>
        <div class="copyright">&copy;  2013 | <a href="http://miucool.com" target="_blank" title="MiuCool米库">lizhi.</a> |
            <a title="李志的腾讯微博" href="http://t.qq.com/z205817y" target="_blank" class="weibo tencent"></a>
        </div>
        </form>
    </div>
    <div class="air-balloon ab-1 png"></div><div class="air-balloon ab-2 png"></div>
    <div class="footer"></div>
</div>
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/fun.base.js"></script>
<script language="javascript" src="../Public/js/login.js"></script>

<!--[if lt IE 8]>
<script src="jslib/PIE.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    if (window.PIE && ( $.browser.version >= 6 && $.browser.version < 10 )){
        $('input.text,input.submit').each(function(){
            PIE.attach(this);
        });
    }
});
</script>
<![endif]-->

<!--[if IE 6]>
<script src="jslib/DD_belatedPNG.js" type="text/javascript"></script>
<script>DD_belatedPNG.fix('.png')</script>
<![endif]-->

</body>
</html>