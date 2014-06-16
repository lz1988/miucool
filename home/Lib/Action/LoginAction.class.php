<?php
/**
 *@title 用户登录
 *@author lizhi
 *@create on 2013-05-17
 */
 
class LoginAction extends Action{
	function index(){
		$m		= M("indexmenu");
		$data	= $m->where('isdel=0')->select();
		$this->assign('data',$data);
		$tag_header = $this->fetch('Public:tag_header'); 
		$this->assign('tag_header',$tag_header);
		
		$tag_login	=	$this->fetch('Public:tag_login');
		$this->assign('tag_login',$tag_login);
		
		$tag_register	=	$this->fetch('Public:tag_register');
		$this->assign('tag_register',$tag_register);
		
		$tag_footer = $this->fetch('Public:tag_footer');
		$this->assign('tag_footer', $tag_footer);
		$this->display("index");
	}
	
	//登录验证
	function login(){
		session_start();
		$r = array();
		$m = D("User");
		
		if (!$m->create($_POST,1)){
			$this->error($m->getError());
		}
	
		if($_SESSION['verify'] != md5($_POST['checkcode'])) {
  		  $this->error('对不起，请输入正确的验证码！');
		}
		
		$confition['username'] 	= $_POST['username'];
		$confition['userpwd']	= $_POST['password']; 
		$confition['isdel']		= 0;
		
		$result	= $m->where($confition)->select();
		//echo $m->getLastSql();die();
		if (!$result){
			$this->error("对不起、请输入正确的用户名或密码！");
		}
		
		$expire = '3600';
		setcookie('uid',$result[0]['id'],time()+$expire,'/') or $r[] = 'uid coookies 未写入！';;
		setcookie('uname',$result[0]['username'],time()+$expire,'/') or $r[] = 'uname coookies 未写入！';;
		//setcookie('islogin',$result[0]['isdel'],time()+$expire,'/') or $r[]='islogin cookies 未写入！';
		$_SESSION['sid']=md5($result[0]['id'].$result[0]['username']);
		//die('dddd');
		if (count($r)>0){
			$this->error(implode(',',$r));
		}
		$this->redirect("Index/index");
	}
	
	/*验证码*/
	public function verify(){
		import("ORG.Util.Image");
		import("ORG.Util.String");

		// 混合型验证码,第二项为模式，类型  0字母 1数字，2大写字母,3为小写字母,4其他字符,5混合
		Image::buildImageVerify(4,1,gif,80,30,'verify');
		
		//中文验证码
		//Image::GBVerify();
	}
	
	function loginout(){
		foreach ($_COOKIE as $k=>$v){
    		setcookie($k,null,time()-3600,'/');
    	}
		$this->redirect("Index/index");
    }
	
	/*function _empty(){
		header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
		$this->display("Public:404");
	}*/
	
}
?>