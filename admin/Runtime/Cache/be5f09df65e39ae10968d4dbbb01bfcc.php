<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>子菜单管理</title>
<link rel="stylesheet" href="../Public/css/main.css"/>
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
<script language="javascript">
$(document).ready(function(){
	$("#pagename").val('<?php echo ($_REQUEST['pagename']); ?>');
	$("#isdel").val('<?php echo ($_REQUEST['isdel']); ?>');
	
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
			//alert(url);
		showDialog(url,'修改',500,500);
	})
})
</script>
</head>

<body>
<form name="baseform" action="__URL__/index" method="post">
<div id="breadcrumb"><h3><?php echo ($breadcrumb); ?></h3></div>
<div id="search">页面名称：
      <input type="text" name="pagename" id="pagename"/>
      &nbsp;状态：
      <select name="isdel" id="isdel"><option value="-1">请选择</option><option value="1">禁止</option><option value="0">启用</option></select>&nbsp;
    <?php echo ($select); ?>
    <input type="hidden" name="menuname" id="menuname" value="<?php echo ($menuname); ?>" />
     <input type="hidden" name="id" id="id" value="<?php echo ($id); ?>" />
</div>
<table width="740" border="1" cellpadding="6" cellspacing="6">
  <tr>
    <th width="42">编号</th>
    <th width="93">页面名称</th>
    <th width="76">地址</th>
    <th width="46">状态</th>
    <th width="375">操作</th>
  </tr>
  
  <?php if($datalist): if(is_array($datalist)): $i = 0; $__LIST__ = $datalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td><?php echo ($vo["id"]); ?></td>
    <td><?php echo ($vo["pagename"]); ?></td>
    <td><?php echo ($vo["pageurl"]); ?></td>
    <td><?php if($vo["isdel"] == 1): ?>禁止 <?php else: ?>启用<?php endif; ?></td>
	 <td><a href="javascript:void(0)" class="del"><img src="../Public/img/deletebody.gif" border="0"  title="删除"/></a>&nbsp;<a href="javascript:void(0)" class="edit"><img src="../Public/img/editbody.gif" border="0" title="修改" /></a></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    
<tr><td colspan="6"><?php echo ($pagelist); ?></td></tr>
<?php else: ?>
 <tr> <td colspan="6"><span class="datamsg">对不起、查询无数据!</span></td></tr><?php endif; ?>
</table>
</form>
</body>
</html>