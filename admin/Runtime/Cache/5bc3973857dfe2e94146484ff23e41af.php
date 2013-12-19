<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增文章</title>
<link rel="stylesheet" href="../Public/css/main.css" />
<link rel="stylesheet" href="../Public/kindeditor/themes/default/default.css" />
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
<script charset="utf-8" src="../Public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../Public/kindeditor/lang/zh_CN.js"></script>
<script>
//文本编辑器
	var editor;
    KindEditor.ready(function(K) {
  // 定义工具栏
  var _items = ['source','|','undo','redo','|','justifyleft','justifycenter','justifyright','|','fontname','fontsize','forecolor','hilitecolor','bold','italic','underline','link','unlink'];
  var _config = {width:'90%',heigth:'500px',resizeType:1,items:_items};
   editor = K.create('#newcontent',_config);
    });
</script>
</head>

<body>
<form action="__URL__/addnewmod" name="baseform" method="post" enctype="multipart/form-data">
<div id="breadcrumb"><h3><?php echo ($breadcrumb); ?></h3></div>
  <table width="100%" border="1">
    <tr>
      <td>文章名称</td>
      <td><label>
        <input type="text" name="newtitle" id="newtitle" />
      </label></td>
    </tr>
    <tr>
      <td>文章作者</td>
      <td><label>
        <input type="text" name="author"  value="<?php echo ($_COOKIE['uname']); ?>"id="author" /><?php echo ($_COOKIE['uname']); ?>
      </label></td>
    </tr>
    <tr>
      <td>文章类别</td>
      <td><?php echo ($newtype); ?></td>
    </tr>
    <tr>
      <td>文章标签</td>
      <td><label>
        <input type="text" name="newremark" id="newremark" />
      </label></td>
    </tr>
    <tr><td>文章缩略图</td><td> <input type="file"  name="photo" >  
</td></tr>
    <tr>
      <td>文章内容</td>
      <td><label>
        <textarea name="newcontent" id="newcontent" style="width:98%" rows="40"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>状态</td>
      <td><label>
        <select name="isdel" id="isdel">
          <option value="0">启用</option>
          <option value="1">禁止</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?php echo ($add); ?></td>
    </tr>
  </table>
</form>
</body>
</html>