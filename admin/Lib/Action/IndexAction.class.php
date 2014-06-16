<?php
class IndexAction extends Action {
    public function index(){
        $this->display('login');
    }
	
	//生成数字和英文混合型的验证码
	public function verify(){
		import("ORG.Util.Image");
		import("ORG.Util.String");

		// 混合型验证码,第二项为模式，类型  0字母 1数字，2大写字母,3为小写字母,4其他字符,5混合
		Image::buildImageVerify(4,1,gif,85,28,'verify');
		
		//中文验证码
		//Image::GBVerify();
	}
	
	/*登录验证*/
	public function checklogin(){
    	$username 	= $_POST['username'];
		$userpwd 	= $_POST['userpwd'];
		
		$m = M("admin");
		$data['UserName'] = $username;
		$data['IsAdmin']  = 1;
		$result = $m->where($data)->select();
		
		$log = M("visit_log");
	
		//用户名
		if (!$result){
			$this->error('登录错误、该用户不存在！');
		}
		//密码
		if ($userpwd !== $result[0]['UserPwd']){
			$this->error('登录错误、密码不正确！');
		}
		//验证码
		//echo $_SESSION['verify']."<br>".md5($_POST['gbcode']);
		/*if($_SESSION['verify'] != md5($_POST['gbcode'])) {
  		  $this->error('验证码错误！');
		}*/
		
		if ($username == $result[0]['UserName'] && $userpwd == $result[0]['UserPwd']){
			$expire = time() + 24*3600;
			$errorinfo = array();
			setcookie('uid',$result[0]['ID'],$expire);
			setcookie('uname',$result[0]['UserName'],$expire);
			//记录访问者ip
			$add['uid'] = $result[0]['ID'];
			$add['ip_address'] = get_onlineip();
			if (!$log->add($add)){$this->error("写入日志失败！");}
			
			$this->WebSite();
			
		}
	}
	
	//头部文件
	public function top(){
		$this->assign('username',$_COOKIE['uname']);
		$this->display('top');
	}
	
	//菜单管理
	public function left(){
		$m 			= M('menu');
		$pagedata 	= $m->join('left join pagemenu on pagemenu.type = menu.id')->field('pagemenu.id,menu.menuname,pagemenu.pagename,pagemenu.type,pagemenu.pageurl')->select();
		$res=array();
		foreach($pagedata as $val){
				$id=$val['menuname'];
				$res[$id][]=$val;
		}

		$this->assign('res', $res);
		$this->display('left');
	}
	
	//整体框架
	public function WebSite(){
		$this->display('website');
	}
	
	//注销
	public function LoginOut(){
		cookie(null);
		$this->redirect("index");
		//echo '<script  type="text/javascript" charset="UTF-8">alert("成功退出");window.parent.location.href="'.__URL__.'/index"</script>';
		//exit;
	}
}
?>