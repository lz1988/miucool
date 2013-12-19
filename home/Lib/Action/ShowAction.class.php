<?php
class ShowAction extends Action{
	public function index(){
		Load('extend');
		import("ORG.Util.Page");
		//print_r($_GET);
		$m		= M("indexmenu");
		$data	= $m->where('isdel=0')->select();
		$this->assign('data',$data);
		$tag_header = $this->fetch('Public:tag_header'); 
		$this->assign('tag_header',$tag_header);
		
		$type		= M("newtype");
		$artype		= $type	->where('isdel=0 ')-> select();
		//echo $type->getLastSql();
		$this->assign('artype', $artype);
		$newtype	= $this->fetch('Public:tag_newtype');
		$this->assign('newtype', $newtype);
		
		//最新新文章
		$newnew = newnew();
		//随机文章
		$hotnew = hotnew();
		//回复文章
		$replaydata = replay();
		
		$this->assign('replaydata',$replaydata);
		$this->assign('newdatalist',$newnew);
		$this->assign('hotdatalist',$hotnew);
		$tag_article = $this->fetch('Public:tag_article');
		$this->assign('tag_article',$tag_article);
		
		$id			= $_GET['pid'];
		$where['newtype']	= $id;
		$new 		= M("news");
		$count 		= $new->where($where)->count();
		$page 		= new Page($count,8);
		$map['newtype'] = $_GET['pid'];
		//print_r($map);
    	foreach($map as $key=>$val) {  
			$tempparameter .= "$key=".urlencode($val)."&";
        	$page->parameter .= str_replace('newtype','pid',$tempparameter);;  
    	}
		$pagelist	= $page->show();
		$maindata	= $new->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		//echo $new->getLastSql();
		$this->assign('maindata', $maindata);
		$this->assign('pagelist',$pagelist);
		$this->assign('bread','><a href="__APP__/Index">首页</a>>>类别显示');
		$maincontent	=	$this->fetch('Show:show');
		$this->assign('main',$maincontent);
		
		$tag_footer = $this->fetch('Public:tag_footer');
		$this->assign('tag_footer', $tag_footer);
		$this->display("index");
	}
	
	public function savecomment(){
		$m = M("comment");
		$condition['userid'] = 1;
		$condition['comment'] = $_POST['comment'];
		$condition['type'] = $_POST['id'];
		$data = $m->add($condition);
		//echo $m->getLastSql();
		if ($data) echo '1' ;else echo '0';
	}
}
?>
