<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>用户管理管理</title><link rel="stylesheet" href="../Public/assets/css/bootstrap.min.css" type="text/css"/><link rel="stylesheet" href="../Public/css/main.css"  type="text/css"/><script language="javascript" src="../Public/js/jquery.js"></script><script language="javascript" src="../Public/js/main.js"></script><script language="javascript">$(document).ready(function(){
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
</script></head><body><form action="__URL__/index" name="baseform" method="post"><div id="breadcrumb"><h3><?php echo ($breadcrumb); ?></h3></div><div id="search">    用户名：<input type="text" name="username" id="username"/>    &nbsp;
    管理员：
    <select name="isadmin" id="isadmin"><option value="-1">请选择</option><option value="1">是</option><option value="0">否</option></select>&nbsp;
    <?php echo ($select); ?></div><div id="datalist"><table class="table table-bordered table-hover definewidth m10"><tr align="center"><th>编号</th><th>用户名</th><th>密码</th><th>创建时间</th><th>是否启用</th><th>是否是管理员</th><th>操作</th></tr><?php if($data): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center"><td><?php echo ($vo["ID"]); ?></td><td><a href="__URL__/showpagemenu"><?php echo ($vo["UserName"]); ?></a></td><td><?php echo ($vo["UserPwd"]); ?></td><td><?php echo ($vo["FstCreate"]); ?></td><td><?php if($vo["IsDel"] == 1): ?>删除
      <?php else: ?>       启用<?php endif; ?></td><td><?php if($vo["IsAdmin"] == 1 ): ?>管理员<?php else: ?> 用户<?php endif; ?></td><td><a href="javascript:void(0)" class="del"><img src="../Public/img/deletebody.gif" border="0"  title="删除"/></a>&nbsp;<a href="javascript:void(0)" class="edit"><img src="../Public/img/editbody.gif" border="0" title="修改" /></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="7"><?php echo ($pagelist); ?></td></tr><?php else: ?><tr><td colspan="7"><span class="datamsg">对不起、查询无数据!</span></td></tr><?php endif; ?></table></div></form></body></html>