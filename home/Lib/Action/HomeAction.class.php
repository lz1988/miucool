<?php

class HomeAction extends Action{
	public function index(){
		die("dddddddddddd');
		session_start();
		$r = array();
		$m = M("user");
		print_r($_POST);DIE();
		$confition['username'] 	= $_POST['username'];
		$confition['userpwd']	= $_POST['password']; 
		$result	= $m->where($confition)->select();
		if (!$result){
			$this->error("对不起、用户名或密码错误！");
		}
		$expire = '3600';
		setcookie('uid',$result[0]['id'],time()+$expire,'/') or $r[] = 'uid coookies 未写入！';;
		setcookie('uname',$result[0]['username'],time()+$expire,'/') or $r[] = 'uname coookies 未写入！';;
		setcookie('islogin',$result[0]['isdel'],time()+$expire,'/') or $r[]='islogin cookies 未写入！';
		$_SESSION['sid']=md5($result[0]['id'].$result[0]['username'].$result[0]['isdel']);
		die('dddd');
		if (count($r)>0){
			$this->error(implode(',',$r));
		}
		$this->redirect("Index/index");
	}	
}
?>