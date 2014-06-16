<?php
class PageAction extends Action{

	function index(){
		import("ORG.Util.Page");
		
		$id = $_REQUEST['id'];
		if (!empty($id))
			$condition['type']	= $id;
			
		$pagename	= $_POST['pagename'];
		if (!empty($pagename))
			$condition['pagename']	= array("like","%".$pagename."%");
			
		$isdel		= $_POST['isdel'];
		if (isset($isdel) && $isdel>=0)
			$condition['pagemenu.isdel']	= $isdel;
			
		$m = M('pagemenu');
		$count 	= $m->where($condition)->join("join menu on pagemenu.type=menu.id")->count();
		//$datalist = $m->where($id)->where($condition)->select();
		//echo $m->getLastSql();
		$map['id']			= $_REQUEST['id'];
		$map['pagename']	= $_REQUEST['pagename'];
		$map['isdel']		= $_REQUEST['isdel'];
		//分页
		$page = new Page($count,3);
		foreach ($map as $key=>$val) {
			if ($val)
				$page->parameter  .= "$key=".urlencode($val)."&";
		}
		//echo $page->parameter;
		$pagelist = $page->show();
		//echo $page->getLastSql();
		
		$datalist 	= $m->where($condition)->join("join menu on menu.id=pagemenu.type")->field("pagemenu.id,pagemenu.pagename,pagemenu.pageurl,pagemenu.isdel")->order('id DESC')->limit($page->firstRow.','.$page->listRows)->select();
		//echo $m->getLastSql();
		
		$this->assign('datalist', $datalist);
		$this->assign('menuname', $_REQUEST['menuname']);
		$this->assign('id', $_REQUEST['id']);
		$this->assign('pagelist', $pagelist);
		$this->assign('select','<input type="submit" name="select" value="查询"/>');
		$this->assign('breadcrumb', '<a href="__APP__/Menu">页面菜单</a>>>'.$_REQUEST['menuname'].'');
		$this->display('pagemenu');
	}
	
	//删除菜单
	function del(){
		$m = M("pagemenu");
		$where['id'] = $_POST['id'];
		echo $m->where($where)->delete();
	}
	
	//页面修改
	public function edit(){
		$m = M("pagemenu");
		$condition['id'] = $_GET['id'];
		$datalist = $m->where($condition)->find();
		$this->assign('breadcrumb', '<a href="__URL__/index">页面修改</a>');
		$this->assign('edit','<input type="submit" name="select" value="修改"/>');
		$this->assign('data', $datalist);
		$this->display('pagemenuedit');
	}
	
	//页面户修改实现
	public function editmod(){
		$m = M("pagemenu");
		$m->id			= $_POST['id'];
		$m->pagename 	= $_POST['pagename'];
		$m->pageurl  	= $_POST['pageurl'];
		$m->isdel		= $_POST['isdel'];	
		$result = $m->save();

		if ($result !== false)
			$this->success("操作成功！");
		else
			$this->error("操作失败！");
	}
	
	//新增文章类别
	public function addnewtype(){
		$this->display("addnewtype");
	}
}

?>