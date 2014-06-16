<?php
class IndexAction extends Action{
	public function index(){
		Load('extend');
		import("ORG.Util.Page");
//ECHO '<pre>';		print_r($_COOKIE);
		
		
		$dir = 'home/Runtime';
		//delDirAndFile($dir);
		//print_r($_GET);
		//获取菜单
		$datamenu = getindexmenu();
		
		
		$this->assign('data',$datamenu);
		$tag_header = $this->fetch('Public:tag_header');
		$this->assign('tag_header',$tag_header);
		
		//获取浏览最多文章
		$datanews = getreadmore();
		$this->assign('data',$datanews);
		$tag_morenew = $this->fetch('Public:tag_morenew'); 
		$this->assign('tag_morenew',$tag_morenew);
		
		//微博秀
		$tag_weiboshow = $this->fetch('Public:tag_weiboshow'); 
		$this->assign('tag_weiboshow',$tag_weiboshow);
		
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
		
		
		//获取文章类别
		$artype = getnewtype();
		//echo $type->getLastSql();
		$this->assign('artype', $artype);
		$newtype	= $this->fetch('Public:tag_newtype');
		$this->assign('newtype', $newtype);
		
		//获取文章信息
		$new 		= M("news");
		$count 		= $new->join('join newtype on newtype.id=news.newtype')->count();
		$page 		= new Page($count,32);
		$nowPage = isset($_GET['p'])?$_GET['p']:1;

		$pagelist	= $page->show();
		$maindata	=	$new->join('join newtype on newtype.id=news.newtype')->field('news.id,news.newtitle,news.author,news.fstcreate,news.newcontent,count,typename,entypename,mnewimg')->limit($page->firstRow.','.$page->listRows)->order('id desc ')->select();
		$this->assign('maindata', $maindata);
		$this->assign('pagelist',$pagelist);
		$this->assign('bread','><a href="__APP__/index">首页</a>');
		//$maincontent	=	$this->fetch('Public:tag_main');
		$maincontent	=	$this->fetch('Index:home');
		$this->assign('main',$maincontent);
		
		
		
		$tag_footer = $this->fetch('Public:tag_footer');
		$this->assign('tag_footer', $tag_footer);
		$this->display();
	}

	public function verify(){
		import("ORG.Util.Image");
		import("ORG.Util.String");

		// 混合型验证码,第二项为模式，类型  0字母 1数字，2大写字母,3为小写字母,4其他字符,5混合
		Image::buildImageVerify(4,1,gif,60,30,'verify');
		
		//中文验证码
		//Image::GBVerify();
	}
	
	
}
?>