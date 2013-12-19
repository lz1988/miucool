<?php
class CheckCommentAction extends Action {
	function index(){
		import("ORG.Util.Page");
		
		//$data = checkcomment();
		
		$uname 		= $_POST['username'];
		if (!empty($uname)){
			$where['UserName'] 	=  array("like", "%".$uname."%");
		}
		$isadmin	= $_POST['isadmin'];
		
		if (isset($isadmin) && $isadmin>=0){
			$where['IsAdmin']	= $isadmin;
			
		}
		$where['comment.IsDel'] = 1;
		
		$m 		= M('comment');
		$count 	= $m->join("join news on news.id=comment.type ")->where($where)->count();
		//echo 		$m->getLastSql();
		$map['username']	= $_REQUEST['username'];
		$map['isadmin']		= $_REQUEST['isadmin'];
		
		$page = new Page($count,20);
		foreach ($map as $key=>$val) {
			$page->parameter  .= "$key=".urlencode($val)."&";
		}
		$pagelist = $page->show();
		//echo $page->getLastSql();
		
		
		$data 	= $m->where($where)->join(" join news on news.id=comment.type")->order('id DESC')->field('comment.id,news.newtitle,comment.fstcreate,user,email,comment')->limit($page->firstRow.','.$page->listRows)->select();
		$m->getLastSql();
		$this->assign('data', $data);
		$this->assign('c', $condition);
		$this->assign('select','<input type="submit" name="select" value="查询"/>');
		$this->assign('breadcrumb', '<a href="__URL__/index">用户列表</a>');
		$this->assign('pagelist', $pagelist);
		$this->display();
	}
		
	
}

?>