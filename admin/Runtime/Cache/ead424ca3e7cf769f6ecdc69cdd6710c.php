<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增菜单</title>
<link rel="stylesheet" href="../Public/css/main.css" />
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
</head>

<body>
<form action="__URL__/addmenumod" name="baseform" method="post">
<div id="breadcrumb"><?php echo ($breadcrumb); ?></div>
  <table width="300" border="1">
    <tr>
      <td width="62">菜单名称</td>
      <td width="222"><label>
        <input type="text" name="menuname" id="menuname" />
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
      <td><?php echo ($addmod); ?></td>
    </tr>
  </table>
</form>
</body>
</html>