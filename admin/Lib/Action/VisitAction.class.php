<?php
class VisitAction extends Action{
function index(){
		import("ORG.Util.Page");
		$uname 		= $_POST['username'];
		if (!empty($uname)){
			$where['username'] 	=  array("like", "%".$uname."%");
		}
		$isdel	= $_POST['isdel'];
		
		if (isset($isadmin) && $isdel>=0){
			$where['isdel']	= $isdel;
			
		}
		
		
		$m 		= M('user');
		$count 	= $m->where($where)->count();
		//echo 		$m->getLastSql();
		$map['username']	= $_REQUEST['username'];
		$map['isdel']		= $_REQUEST['isdel'];
		
		$page = new Page($count,20);
		foreach ($map as $key=>$val) {
			$page->parameter  .= "$key=".urlencode($val)."&";
		}
		$pagelist = $page->show();
		//echo $page->getLastSql();
		
		$data 	= $m->where($where)->order('ID DESC')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('data', $data);
		$this->assign('c', $condition);
		$this->assign('select','<input type="submit" name="select" value="查询"/>');
		$this->assign('breadcrumb', '<a href="__URL__/index">用户列表</a>');
		$this->assign('pagelist', $pagelist);
		$this->display('visit');
		}
}

?>