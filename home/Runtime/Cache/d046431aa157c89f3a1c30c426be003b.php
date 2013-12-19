<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>米库-miucool最大的个人免费发布社区、发现生活点滴、分享生活乐趣、领悟生活文化、爱生活、爱分享、爱米库</title>
<meta name="keywords"content="米库-miucool：米库音乐、米库电影、米库美食、米库读书、米库运动、米库生活。" />
<meta name="description"content="米库-miucool最大的个人免费发布社区，米库内容丰富多元、涵盖音乐、电影、旅行、美食、运动、读书、等热门主题，真正为用户提供免费分享生活平台。" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="../Public/css/common.css"/>
<link rel="stylesheet" href="../Public/css/tb_article.css"/>
<link rel="stylesheet" href="../Public/artDialog/skins/green.css"/>
<script language="javascript" src="../Public/js/jquery.js?v=1"></script>
<script language="javascript" src="../Public/js/default.js"></script>
<script language="javascript" src="../Public/artDialog/artDialog.js"></script>
<script type="text/javascript" src="../Public/js/jquery.waterfall.js"></script>
</head>
<body>
<!--加载头部导航-->
<div id="tag_banner">
<?php echo ($tag_header); ?>
</div>

<div id ="tag_content_wrap">
<div id="tag_content">
<!--加载文章内容-->
<?php echo ($main); ?>

</div>
</div>

<!--加载底部导航-->
<div id="tag_footer"><?php echo ($tag_footer); ?></div>
</body>
</html>