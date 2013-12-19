<?php if (!defined('THINK_PATH')) exit();?><style>
h1 {
	display: block;
	font-size: 2em;
	-webkit-margin-before: 0.67em;
	-webkit-margin-after: 0.67em;
	-webkit-margin-start: 0px;
	-webkit-margin-end: 0px;
	font-weight: bold;
}
img{ cursor:pointer;vertical-align:middle;margin-left:5px; }
.login{
	margin-top: 13px;
	margin-left: 75px;
	position: relative;
	margin-bottom:30px;
	width: 620px;
	height:350px;
	padding:10px;
}
.login_user span{
	font-size: 14px;
	float: left;
	margin-top: 2px;
	line-height: 29px;
	color: #333;
}
.login_pass span{
	font-size: 14px;
	float: left;
	margin-top: 2px;
	line-height: 29px;
	color: #333;
}
.login_code span{
	font-size: 14px;
	float: left;
	margin-top: 2px;
	line-height: 29px;
	color: #333;
}
.login_email span{
	font-size: 14px;
	float: left;
	margin-top: 2px;
	line-height: 29px;
	color: #333;
}
.login_user .text{
	width: 226px;
	height: 30px;
	line-height: 30px;
	border: 1px #CFCFCF solid;
	padding-left: 8px;
	color: #999;
	margin-left: 8px;
}
.login_pass .text{
	width: 226px;
	height: 30px;
	line-height: 30px;
	border: 1px #CFCFCF solid;
	padding-left: 8px;
	margin-left: 8px;
}
.login_code .text{
	width: 226px;
	height: 30px;
	line-height: 30px;
	border: 1px #CFCFCF solid;
	padding-left: 8px;
	margin-left: 8px;
}
.login_email .text{
	width: 226px;
	height: 30px;
	line-height: 30px;
	border: 1px #CFCFCF solid;
	padding-left: 8px;
	margin-left: 8px;
}
.login_sub .text{
	width:55px;
	height:30px;
	margin-left:70px;
	font-size:14px;
}
.login_sub .for{margin-left:18px;}
input, textarea {
	margin: 0;
	padding: 0;
	outline: none;
	font-size: 100%;
	vertical-align: baseline;
}
.login_user, .login_pass, .login_code, .login_sub,.login_email{
	margin-top:20px;
}

</style>
<form name="form1" method="post" onSubmit="return checkregister()" action="__URL__/register">
<div class="login">
<div  class="login_tip">
  <h1>用户注册</h1>
</div>
<div class="login_user"><span>用&nbsp;&nbsp户&nbsp;&nbsp名</span> 
   <input type="text" name="username"  id="username"class="text" /></div>
<div class="login_pass"><span>密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;码</span>
  <input type="password" id="password"class="text" name="password"/></div>
<div class="login_pass"><span>确认密码</span><input type="password" id="supassword"class="text" name="supassword"/></div>
<div class="login_email"><span>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 箱</span><input type="text" id="email"class="text" name="email"/></div>
<div class="login_sub"><input type="submit" value="注册"  class="text" name="submit"/></div>
</div>
</form>