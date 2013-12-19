<?php
class NewAction extends Action{
	public function index(){
		import("ORG.Util.Page");
		$m = M("newtype");
		if (!empty($_POST['typename'])){
			$where['typename'] = array("like","%".$_POST['typename']."%");
		}
		if (isset($_POST['isdel']) && $_POST['isdel']>=0){
			$where['isdel']    = $_POST['isdel'];
		}
		$count = $m->where($where)->count();
		//echo 		$m->getLastSql();
		$page = new Page($count,8);
		$pagelist = $page->show();
		
		$datalist = $m->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc ')->select();
		//echo $m->getLastSql();
		$this->assign('datalist', $datalist);
		$this->assign('pagelist', $pagelist);
		$this->assign('breadcrumb','<a href="__URL__/newlist">类别管理</a>');
		$this->assign('select','<input type="submit" name="select" value="查询"');
		$this->display('index');
	}
	
	//新增文章显示
	public function addnewtype(){
		$this->assign('breadcrumb','<a href="__URL__/Addnewtype">新增文章类别</a>');
		$this->assign('add','<input type="submit" value="新增" name="submit"');
		$this->display("addnewtype");
	}
	
	
	//新增文章类别操作
	public function addnewtypemod(){
		$m = M("newtype");
		$m->typename = $_POST['typename'];
		$m->isdel	 = $_POST['isdel'];
		$result = $m->add();
		//echo 		$m->getLastSql();
		if($result){
			$this->success("保存成功！","__URL__/index");
		}else{
			$this->error("保存失败！");
		}	
	}
	//新增文章页面
	public function addnew(){

		$this->assign('newtype', getnewtype());
		$this->assign('breadcrumb','<a href="__URL__/Addnew">新增文章</a>');
		$this->assign('add','<input type="submit" value="新增" name="submit"');
		$this->display('addnew');
	}
	 public function _upload(){
		import("ORG.Net.UploadFile");
		$upload    = new UploadFile();
		//设置上传文件大小
		$upload->maxsize = 3145728;
		//设置上传文件类型
		$upload->allowExts = explode(',',"jpg,gif,jpeg,png");
		//设置附近上传目录
		$upload->savePath = "./Tpl/Public/pic/"; //注意 目录为入口文件的相对路径
		$thumbPath ='./Tpl/Public/thumbpath/';//缩略图的路径
		$upload->thumbPath = $thumbPath;
		//设置需要生成缩略图他，仅对图片文件有效
		$upload->thumb = true;
		if(!mk_dir($thumbPath)) $this->error("缩略图目录创建失败");
		//设置引用图片类库包路径
		$upload->imageClassPath = 'ORG.Net.Image';
		//设置需要生成缩略图他的文件后缀
		$upload->thumbPrefix ='m_,s_'; //生成2张缩略图
		//设置缩略图最大宽度
		$upload->thumbMaxWidth = '400,145';
		//设置缩略图最大高度
		$upload->thumbMaxHeight = '400,105';
		//设置上传文件规则
		$upload->saveRule = uniqid;
		//删除原图
		$upload->thumbRemoveOrigin = true;
		if(!$upload->upload()){
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		}else{
			//取得成功上传文件信息
			$info   = $upload->getUploadFileInfo();
			return $info;
			//print_r($info);
		}
	  
	 }
	//新增文章操作
	public function addnewmod(){
		if(!empty($_FILES)){
			$info = $this->_upload();
		}
		$m = M("news");
		$where['newtitle'] 		= $_POST['newtitle'];
		$where['newcontent']	= $_POST['newcontent'];
		$where['newremark'] 	= $_POST['newremark'];
		$where['newtype']		= $_POST['newtype'];
		$where['author']		= $_POST['author'];
		$where['newimg']		= $info[0]['savename'];

		$result = $m->add($where);
		//echo $m->getLastSql();
		if ($result !== false)
			$this->success("操作成功！");
		else
			$this->error("操作失败！");
	}
	
	//文章修改显示
	public function edit(){
		$m = M("newtype");
		$condition['id'] = $_GET['id'];
		$datalist = $m->where($condition)->find();
		$this->assign('breadcrumb', '<a href="__URL__/index">页面修改</a>');
		$this->assign('edit','<input type="submit" name="select" value="修改"/>');
		$this->assign('data', $datalist);
		$this->display('newtypeedit');
	}
	
	//页面户修改实现
	public function editmod(){
		$m = M("newtype");
		$m->id			= $_POST['id'];
		$m->typename 	= $_POST['typename'];
		$m->isdel		= $_POST['isdel'];	
		$result = $m->save();
		//echo $m->getLastSql();
		if ($result !== false)
			$this->success("操作成功！");
		else
			$this->error("操作失败！");
	}
	
	//删除文章类别
	function del(){
		$m = M("newtype");
		$where['id'] = $_POST['id'];
		echo $m->where($where)->delete();
	}
	
	//文章管理列表
	function newlist(){
		import("ORG.Util.Page");
		Load('extend');
		
		if (!empty($_POST['newstitle']))
			$condition['newtitle'] = array("like","%".$_POST['newstitle']."%");
		if (isset($_POST['isdel']) && $_POST['isdel'] >=0)
			$condition['news.isdel'] = $_POST['isdel'];	
			
		$m = M("news");
		$count = $m->where($condition)->join("join newtype on newtype.id=news.newtype")->count();
		
		$page = new Page($count,20);
		foreach ($condition as $key=>$val) {
			if ($val)
				$page->parameter  .= "$key=".urlencode($val)."&";
		}
		$pagelist = $page->show();
				
		$datalist = $m->where($condition)->field('news.id,news.newtitle,news.author,news.newcontent,news.newremark,news.fstcreate,news.isdel,newtype.typename')->join("join newtype on newtype.id=news.newtype")->limit($page->firstRow.','.$page->listRows)->order('id desc ')->select();
		//echo $m->getLastSql();
		$this->assign('datalist', $datalist);
		$this->assign('pagelist', $pagelist);
		$this->assign('breadcrumb','<a href="__URL__/newlist">文章管理</a>');
		$this->assign('select','<input type="submit" name="select" value="查询"');
		$this->display('news');
	}
	
	function newedit(){
		$m = M("newtype");
		$this->assign('newtype', getnewtype());
		$condition['news.id'] = $_GET['id'];
		$datalist = $m->where($condition)->join("join news on news.newtype=newtype.id")->field('news.id,news.newtitle,news.author,news.newcontent,news.newremark,news.fstcreate,news.isdel,newtype.typename,news.newtype')->find();
		//echo $m->getLastSql();
		$this->assign('breadcrumb', '<a href="__URL__/newedit">页面修改</a>');
		$this->assign('edit','<input type="submit" name="select" value="修改"/>');
		$this->assign('data', $datalist);
		$this->display('newedit');
	}
	
	//文章修改
	function neweditmod(){
		$m = M("news");
		$where['newtitle'] 		= $_POST['newtitle'];
		$where['newcontent']	= stripslashes($_POST['newcontent']);
		$where['newremark'] 	= $_POST['newremark'];
		$where['newtype']		= $_POST['newtype'];
		$where['author']		= $_POST['author'];
		$where['id']			= $_POST['id'];
		
		$result = $m->save($where);
		//echo $m->getLastSql();
		if (!$result)
			$this->error("操作失败！");
		else
			$this->success("操作成功！");
	}
	
	//文章删除
	function newdelmod(){
		$m = M("news");
		$condition['id'] = $_POST['id'];
		echo $m->where($condition)->delete();
			
			
	}
}
?>