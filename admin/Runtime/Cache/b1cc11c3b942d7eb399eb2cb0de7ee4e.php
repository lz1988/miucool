<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>菜单管理</title>
<link rel="stylesheet" href="../Public/css/main.css" />
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
<style>
#menuname{width:100px;}
</style>
<script>
$(document).ready(function(){
	$("#menuname").val('<?php echo ($_REQUEST['menuname']); ?>');
	$("#isdel").val('<?php echo ($_REQUEST['isdel']); ?>');
	
	$("#addmenu").click(function(){
		var url = '__URL__/addmenu';
		showDialog(url,'添加菜单',350,400);
	})
})

</script>
</head>

<body>
<form action="__URL__/index" name="baseform" method="post">
<div id="breadcrumb"><h3><?php echo ($breadcrumb); ?></h3></div>
<div id="search">
    菜单名称：<input type="text" name="menuname" id="menuname"/>
    &nbsp;
    状态：
    <select name="isdel" id="isdel"><option value="-1">请选择</option><option value="1">禁止</option><option value="0">启用</option></select>&nbsp;
    <?php echo ($select); ?>
<?php echo ($add); ?></div>


<table width="499" border="1" cellpadding="6" cellspacing="6">
  <tr>
    <th width="42">编号</th>
    <th width="95">菜单名称</th>
    <th width="294">状态</th>
    
  </tr>
  <?php if($data): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td><?php echo ($vo["id"]); ?></td>
    <td><a href="__APP__/Page/index?id=<?php echo ($vo["id"]); ?>&menuname=<?php echo ($vo["menuname"]); ?>"><?php echo ($vo["menuname"]); ?></a></td>
    <td><?php if($vo["IsDel"] == 0): ?>启用 <?php else: ?>禁止<?php endif; ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <tr><td colspan="3"><?php echo ($pagelist); ?></td></tr>
  <?php else: ?>
  <tr><td colspan="3"><font color="red">查询无数据！</font></td></tr><?php endif; ?>
</table>
</form>
</body>
</html>