<?php 
class RegisterAction extends Action{	
	public function index(){
		$m		= M("indexmenu");
		$data	= $m->where('isdel=0')->select();
		$this->assign('data',$data);
		$tag_header = $this->fetch('Public:tag_header'); 
		$this->assign('tag_header',$tag_header);
		
		$register	=	$this->fetch('Register:register');
		$this->assign('register',$register);
		
		$login	=	$this->fetch('Register:login');
		$this->assign('login',$login);
		
		/*$tag_register	=	$this->fetch('Public:tag_register');
		$this->assign('tag_register',$tag_register);*/
		
		$tag_footer = $this->fetch('Public:tag_footer');
		$this->assign('tag_footer', $tag_footer);
		$this->display();	
	}

	public function register(){
		$m = M("user");
		$vo['username'] 	= $_POST['username'];
		$vo['userpwd']  	= $_POST['password'];
		$vo['email'] 		= $_POST['email'];
		$vo['isdel']		= 0 ;	
		//var_dump($m->add($vo));die();
		if ($rid = $m->add($vo)){
			$expire = '3600';
			setcookie('uid',$rid,time()+$expire,'/') or $r[] = 'uid coookies 未写入！';;
			setcookie('uname',$_POST['username'],time()+$expire,'/') or $r[] = 'uname coookies 未写入！';;
			$_SESSION['sid']=md5($rid.$_POST['password']);
			if (count($r)>0){
				$this->error(implode(',',$r));
			}
			$this->success("恭喜你、注册成功！");
		}else {
			$this->error("注册失败！");
		}
	}
}
?>