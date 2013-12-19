<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>页面管理</title>
<link rel="stylesheet" href="../Public/css/main.css" />
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
</head>

<body>
<form action="__URL__/editmod" name="baseform" method="post">
<div id="breadcrumb"><p><?php echo ($breadcrumb); ?></p></div>
<div id="datalist">

<?php if(vo.id): ?><table width="400px" border="1">
<tr>
  <td width="224">页面名称</td>
  <td width="460"><label>
    <input type="text" name="pagename"  value="<?php echo ($data["pagename"]); ?>"id="pagename" />
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" id="id" />
  </label></td>
</tr>
<tr>
  <td>地址</td>
  <td><label>
    <input type="text" name="pageurl" value="<?php echo ($data["pageurl"]); ?>" id="pageurl" />
  </label></td>
</tr>

<tr>
  <td>状态</td>
  <td><label>
    <select name="isdel" id="isdel">
    <option value="0">启用</option>
     <option value="1" <?php if($data["isdel"] == 1): ?>selected<?php endif; ?>>禁止</option>
    </select>
  </label></td>
</tr>
<tr><td colspan="2" align="center"><?php echo ($edit); ?></td></tr>
</table><?php endif; ?>


</div>
</form>
</body>
</html>