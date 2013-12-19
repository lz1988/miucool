<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户管理管理</title>
<link rel="stylesheet" href="../Public/css/main.css"  type="text/css"/>
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
<script language="javascript">
$(document).ready(function(){
	$("#username").val('<?php echo ($_REQUEST['username']); ?>');
	$("#isadmin").val('<?php echo ($_REQUEST['isadmin']); ?>');
	
	//删除用户
	$(".del").click(function(){
	if (confirm("确定执行操作？")){
		var id = $(this).parent().parent().find("td").eq(0).html();
		var url = '__URL__/del';
			$.post(url,{"id":id},function(data){
			if(data == 1){
				location.reload();
			}else{
				alert("操作失败");
				return;
			}
			})
	}
	})
	
	//修改用户
	$(".edit").click(function(){
		var id 	= $(this).parent("td").parent("tr").find("td").eq(0).html();
		var	url = '__URL__/edit';
			url += '?id='+id;
		showDialog(url,'修改',500,500);
	})
})
</script>
</head>

<body>
<form action="__URL__/index" name="baseform" method="post">
<div id="breadcrumb"><h3><?php echo ($breadcrumb); ?></h3></div>
<div id="search">
    用户名：<input type="text" name="username" id="username"/>
    &nbsp;状态：
    <select name="isadmin" id="isadmin"><option value="-1">请选择</option><option value="1">失效</option><option value="0">启用</option></select>&nbsp;
    <?php echo ($select); ?>
</div>
<div id="datalist">
<table width="100%" border="1" cellpadding="6" cellspacing="6" id="tablelist">
  <tr align="center">
    <th width="71">编号</th>
    <th width="123">用户名</th>
    <th width="109">密码</th>
    <th width="139">创建时间</th>
    <th width="95">是否启用</th> 
    <th width="131">邮箱</th>
     <th width="174">操作</th>
  </tr>
  <?php if($data): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">
    <td><?php echo ($vo["id"]); ?></td>
    <td><a href="__URL__/showpagemenu"><?php echo ($vo["username"]); ?></a></td>
    <td><?php echo ($vo["userpwd"]); ?></td>
    <td><?php echo ($vo["fstcreate"]); ?></td>
    <td><?php if($vo["isdel"] == 1): ?>删除
      <?php else: ?>
       启用<?php endif; ?></td>
  <td><?php echo ($vo["email"]); ?></td>
    <td><a href="javascript:void(0)" class="del"><img src="../Public/img/deletebody.gif" border="0"  title="删除"/></a>&nbsp;<a href="javascript:void(0)" class="edit"><img src="../Public/img/editbody.gif" border="0" title="修改" /></a></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  
  
<tr><td colspan="7"><?php echo ($pagelist); ?></td></tr>
 <?php else: ?>
 <tr> <td colspan="7"><span class="datamsg">对不起、查询无数据!</span></td></tr><?php endif; ?>

</table>
</div>
</form>
</body>
</html>