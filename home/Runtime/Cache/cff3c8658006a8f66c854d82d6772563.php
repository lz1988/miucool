<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>米库-个人生活分享平台-登录</title>
<meta name="keywords"content="米库(miucool)个人生活分享平台：米库音乐、米库电影、米库美食、米库读书、米库运动、米库生活、发现生活点滴、分享生活乐趣、领悟生活文化。" />
<meta name="description"content="米库(miucool)个人生活分享平台，米库涵盖生活中的音乐、电影、旅行、美食、运动、读书，真正为个人提供生活分享平台。" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="__ROOT__/static/home/css/common.css"/>
<link rel="stylesheet" href="__ROOT__/static/home/artDialog/skins/green.css"/>
<script language="javascript" src="__ROOT__/static/home/js/jquery.js?v=1"></script>
<script language="javascript" src="__ROOT__/static/home/js/default.js?v=2"></script>
<script language="javascript" src="__ROOT__/static/home/artDialog/artDialog.js"></script>
<script language="javascript">
var freshverify=function(){
	document.getElementById('verifyImg').src='__URL__/verify/'+Math.random();  
}
</script>

</head>
<body>
<!--加载头部导航-->
<div id="tag_banner">
<?php echo ($tag_header); ?>
</div>

<div id ="tag_content_wrap">
<div id="tag_content">

<!--加载文章内容-->
<div class="tag_main"><?php echo ($tag_login); ?></div>

<!--加载文章类别-->
<div class="tag_type"><?php echo ($tag_register); ?></div>
</div>
</div>


<!--加载底部导航-->
<div id="tag_footer"><?php echo ($tag_footer); ?></div>


</body>
</html>