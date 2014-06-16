<?php

class MenuAction extends Action{
	function index(){
		import("ORG.Util.Page");
		$menuname	= $_POST['menuname'];
		if (!empty($menuname))
			$condition['menuname']	= array("like","%".$menuname."%");
		$isdel		= $_POST['isdel'];
		if (isset($isdel) && $isdel>=0)
			$condition['IsDel']	= $isdel;
		
		$m 		= M('menu');
		$count 	= $m->where($condition)->count();
		
		$page = new Page($count,8);
		$map['menuname']	= $_REQUEST['menuname'];
		$map['isdel']		= $_REQUEST['isdel'];
		
		foreach($map as $key=>$val){
			if ($val)
				$page->parameter .= "$key=".urlencode($val)."&";
		}
		$pagelist = $page->show();
		$data 	= $m->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
		//echo $m->getLastSql();
		//dump($data);
		$this->assign('breadcrumb', '<a href="__URL__/index">菜单显示</a>');
		$this->assign('pagelist', $pagelist);
		$this->assign('select','<input type="submit" name="select" value="查询"/>');
		$this->assign('add','<input type="button"  id="addmenu" value="添加菜单"/>');
		$this->assign('data', $data);
		$this->display('menu');
	}
	
	//新增菜单
	function addmenu(){
		$this->assign('addmod','<input type="submit"  name="add" value="添加"/>');
		$this->display('addmenu');
	}
	
	//新增菜单操作
	function addmenumod(){
		$m = M("menu");
		$c['menuname'] = $_POST['menuname'];
		$result = $m->add($c);
		//echo $m->getLastSql();
		if(!$result)
			$this->error("操作失败！");
		else
			$this->success("操作成功！");	
	}

}

?>
