<?php
class UserAction extends Action{
	function index(){
		import("ORG.Util.Page");
		$uname 		= $_POST['username'];
		if (!empty($uname)){
			$where['UserName'] 	=  array("like", "%".$uname."%");
		}
		$isadmin	= $_POST['isadmin'];
		
		if (isset($isadmin) && $isadmin>=0){
			$where['IsAdmin']	= $isadmin;
			
		}
		
		$m 		= M('admin');
		$count 	= $m->where($where)->count();
		//echo 		$m->getLastSql();
		$map['username']	= $_REQUEST['username'];
		$map['isadmin']		= $_REQUEST['isadmin'];
		
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
		$this->display('user');
	}
	
	//用户删除
	public function del(){
		$m = M("admin");
		$result = $m->where('ID='.$_POST['id'])->delete();
		echo  $result;
	}
	
	//用户修改
	public function edit(){
		$m = M("admin");
		$condition['ID'] = $_GET['id'];
		$datalist = $m->where($condition)->find();
		$this->assign('breadcrumb', '<a href="__URL__/index">用户修改</a>');
		$this->assign('edit','<input type="submit" name="select" value="修改"/>');
		$this->assign('data', $datalist);
		$this->display('useredit');
	}
	
	//用户修改实现
	public function editmod(){
		$m = M("admin");
		$m->UserName 	= $_POST['username'];
		$m->UserPwd  	= $_POST['userpwd'];
		$m->IsAdmin  	= $_POST['isadmin'];
		$m->IsDel		= $_POST['isdel'];	
		$m->ID			= $_POST['id'];
		$result = $m->save();
		if ($result !== false)
			$this->success("操作成功！");
		else
			$this->error("操作失败！");
	}
	
}
?>