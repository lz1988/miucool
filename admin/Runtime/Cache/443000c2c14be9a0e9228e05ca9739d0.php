<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>文章类别修改页面</title><link rel="stylesheet" href="../Public/css/main.css" /><link rel="stylesheet" href="../Public/kindeditor/themes/default/default.css" /><script language="javascript" src="../Public/js/jquery.js"></script><script language="javascript" src="../Public/js/main.js"></script><script charset="utf-8" src="../Public/kindeditor/kindeditor.js"></script><script charset="utf-8" src="../Public/kindeditor/lang/zh_CN.js"></script><script>$(document).ready(function(){
	$("#newtype").val(<?php echo ($data["newtype"]); ?>);
})
//文本编辑器
	var editor;
    KindEditor.ready(function(K) {
  // 定义工具栏
  var _items = ['source','|','undo','redo','|','justifyleft','justifycenter','justifyright','|','fontname','fontsize','forecolor','hilitecolor','bold','italic','underline','link','unlink'];
  var _config = {width:'100%',heigth:'500px',resizeType:1,items:_items};
   editor = K.create('#newcontent',_config);
    });
</script></head><body><form action="__URL__/neweditmod" name="baseform" method="post" enctype="multipart/form-data"><div id="breadcrumb"><p><?php echo ($breadcrumb); ?></p></div><div id="datalist"><?php if(vo.id): ?><table width="100%" border="1"><tr><td width="150">文章名称</td><td width="874"><label><input type="text" name="newtitle"  value="<?php echo ($data["newtitle"]); ?>"id="newtitle" /><input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" id="id" /></label></td></tr><tr><td>文章作者</td><td><label><input type="text" name="author" id="author" value="<?php echo ($data["author"]); ?>" /></label></td></tr><tr><td>文章类别</td><td><?php echo ($newtype); ?></td></tr><tr><td>文章标签</td><td><label><input type="text" name="newremark"  value="<?php echo ($data["newremark"]); ?>"id="newremark" /></label></td></tr><tr><td>图片</td><td><input type="file"  name="photo" ></td></tr><tr><td>文章内容</td><td><textarea name="newcontent" id="newcontent" style="width:98%" rows="45"><?php echo ($data["newcontent"]); ?></textarea></td></tr><tr><td>状态</td><td><select name="isdel" id="isdel"><option value="0">启用</option><option value="1" 
    <?php if($data["isdel"] == 1): ?>selected<?php endif; ?>    >禁止
    </option></select></td></tr><tr><td colspan="2" align="center"><?php echo ($edit); ?></td></tr></table><?php endif; ?></div></form></body></html>