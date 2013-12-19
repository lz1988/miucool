<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增文章类别</title>
<link rel="stylesheet" href="../Public/css/main.css" />
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
</head>

<body>
<form action="__URL__/addnewtypemod" name="baseform" method="post">
<div id="breadcrumb"><h3><?php echo ($breadcrumb); ?></h3></div>
  <table width="300" border="1">
    <tr>
      <td>文章类别名称</td>
      <td><label>
        <input type="text" name="typename" id="typename" />
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