<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="../Public/css/main.css" />
<style type="text/css">
body{ background:#E6E6E6;}
#top{text-align:center;}
p{padding-left:30px;}
</style>
<div id="top"><h2>MiuCool--后台管理系统</h2></div>
<div id="topinfo"><p>欢迎你：<?php if(username): echo ($username); ?> &nbsp;&nbsp;<a href="__URL__/LoginOut" target="_parent">注销</a><?php endif; ?>&nbsp;&nbsp;当前时间：<?php echo (date('Y-m-d g:i a',time())); ?></p></div>