<?php
/**
*@title 主题分类显示
*@author lizhi
*@create on 2013-05-30
*/

class ArticleAction extends Action{
	public function index(){
		
		Load('extend');
		import("ORG.Util.Page");
		$dir = 'home/Runtime';
		//delDirAndFile($dir);
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
		$type = $_GET['type'];
		$where['entypename'] = $type;
		$count 		= $new->where($where)->join('join newtype on newtype.id=news.newtype')->count();
		$page 		= new Page($count,10);
		$nowPage = isset($_GET['p'])?$_GET['p']:1;

		$pagelist	= $page->show();
		$maindata	=	$new->where($where)->join('join newtype on newtype.id=news.newtype')->field('news.id,news.newtitle,news.author,news.fstcreate,news.newcontent,count,typename,entypename,snewimg')->limit($page->firstRow.','.$page->listRows)->order('id desc ')->select();
		//echo $new->getLastSql();
		/*$page->setConfig('header', '条数据');//共有多少条数据
		$page->setConfig('prev', "<");//上一页
		$page->setConfig('next', '>');//下一页
		$page->setConfig('first', '<<');//第一页
		$page->setConfig('last', '>>');//最后一页*/
		$this->assign('maindata', $maindata);
		$this->assign('pagelist',$pagelist);
		$this->assign('bread','><a href="__APP__/index">首页</a>');
		$maincontent	=	$this->fetch('Public:tag_main');
		$this->assign('main',$maincontent);
		
	
		$this->assign("pagetitle","米库".$maindata[0]['typename']."-个人生活分享平台");
		$tag_footer = $this->fetch('Public:tag_footer');
		$this->assign('tag_footer', $tag_footer);
		$this->display();
		
	}
}

?>
