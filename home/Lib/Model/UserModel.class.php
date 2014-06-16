<?php
class UserModel extends Model{

	protected  $_validate = array(
		array('username','require','用户不可为空！'),
		array('password','require','密码不可为空！'),
		array('checkcode','require','验证码不可为空！'),
	);
}
?>