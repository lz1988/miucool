<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>商户信息管理</title><link rel="stylesheet" href="../Public/assets/css/bootstrap.css"/><link rel="stylesheet" href="../Public/css/main.css" type="text/css"/><script language="javascript" src="../Public/js/jquery.js"></script><script language="javascript" src="../Public/js/main.js"></script><script language="javascript">$(document).ready(function(){
	$("#newstitle").val('<?php echo ($_REQUEST['newstitle']); ?>');
	$("#isdel").val('<?php echo ($_REQUEST['isdel']); ?>');
	
	//删除用户
	$("#del").click(function(){
	if (confirm("确定执行操作？")){
		var id = $(this).parent().parent().find("td").eq(0).html();
		var url = '__URL__/newdelmod';
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
	$("#edit").click(function(){
		var id 	= $(this).parent("td").parent("tr").find("td").eq(0).html();
		var	url = '__URL__/newedit';
			url += '?id='+id;
		showDialog(url,'修改',550,800);
	})
})

	
</script></head><body><ul class="breadcrumb"><li>文章管理<span class="divider">/</span></li><li class="active">文章列表</li></ul><!-- #breadcrum--><div class="nav-search" id="nav-search"><form action="__URL__/newlist" name="baseform" class="form-inline well" method="post">文章名称：
  <input type="text" class="input-default" name="newstitle" id="newstitle"/>  &nbsp;状态：
  <select name="isdel" id="isdel"><option value="-1">请选择</option><option value="1">禁止</option><option value="0">显示</option></select>&nbsp;
  <button class="btn btn-success "id="" type="submit">搜索</button></form></div><div id="datalist"><table class="table table-bordered table-hover table-striped"><tr align="center"><th>编号</th><th>标题</th><th>类别</th><th>作者</th><!--<th width="109">文章标签</th>--><th>内容</th><th>创建时间</th><th>状态</th><th>操作</th></tr><?php if($datalist): if(is_array($datalist)): $i = 0; $__LIST__ = $datalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="left"><td><?php echo ($vo["id"]); ?></td><td><a href="__URL__/newedit?id=<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["newtitle"]); ?></a></td><td><?php echo ($vo["typename"]); ?></td><td><?php echo ($vo["author"]); ?></td><!--<td><?php echo ($vo["newremark"]); ?></td>--><td><?php echo (msubstr(delhtmltags($vo["newcontent"]),0,30)); ?></td><td><?php echo ($vo["fstcreate"]); ?></td><td><?php if($vo["isdel"] == 1): ?>删除
      <?php else: ?>       启用<?php endif; ?></td><td><button class="btn btn-info" id="del" type="button">删除</button><button class="btn btn-primary" id="edit" type="button">修改</button></td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="10"><?php echo ($pagelist); ?></td></tr><?php else: ?><tr><td colspan="10"><span class="datamsg">对不起、查询无数据!</span></td></tr><?php endif; ?></table></div></body></html>