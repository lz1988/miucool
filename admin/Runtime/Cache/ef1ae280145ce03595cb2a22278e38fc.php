<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户管理管理</title>
<link rel="stylesheet" href="../Public/css/main.css" />
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/main.js"></script>
</head>

<body>
<form action="__URL__/editmod" name="baseform" method="post">
<div id="breadcrumb"><h3><?php echo ($breadcrumb); ?></h3></div>
<div id="datalist">

<?php if(vo.ID): ?><table width="400px" border="1">
<tr>
  <td width="224">用户名</td>
  <td width="460"><label>
    <input type="text" name="username"  value="<?php echo ($data["UserName"]); ?>"id="username" />
    <input type="hidden" name="id" value="<?php echo ($data["ID"]); ?>" id="id" />
  </label></td>
</tr>
<tr>
  <td>密码</td>
  <td><label>
    <input type="text" name="userpwd" value="<?php echo ($data["UserPwd"]); ?>" id="userpwd" />
  </label></td>
</tr>
<tr>
  <td>是否是管理员</td>
  <td><label>
    <select name="isadmin" id="isadmin">
    <option value="0">用户</option>
     <option value="1" <?php if($data["IsAdmin"] == 1): ?>selected<?php endif; ?> >管理员</option>
    </select>
  </label></td>
</tr>
<tr>
  <td>状态</td>
  <td><label>
    <select name="isdel" id="isdel">
    <option value="0">启用</option>
     <option value="1" <?php if($data["IsDel"] == 1): ?>selected<?php endif; ?>>禁止</option>
    </select>
  </label></td>
</tr>
<tr><td colspan="2" align="center"><?php echo ($edit); ?></td></tr>
</table><?php endif; ?>


</div>
</form>
</body>
</html>