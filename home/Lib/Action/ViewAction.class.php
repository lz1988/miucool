<?php
class ViewAction extends Action{
	function index(){
		import("ORG.Util.Page");
		//print_r($_GET);
		$m		= M("indexmenu");
		$data	= $m->where('isdel=0')->select();
		$this->assign('data',$data);
		$tag_header = $this->fetch('Public:tag_header'); 
		$this->assign('tag_header',$tag_header);
		
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
		
		$type		= M("newtype");
		$artype		= $type	->where('isdel=0 ')-> select();
		//echo $type->getLastSql();
		$this->assign('artype', $artype);
		$newtype	= $this->fetch('Public:tag_newtype');
		$this->assign('newtype', $newtype);
		
		$id			= intval($_GET['id']);
		$where['news.id']	= $id;
		$new 		= M("news");
		$ret_getone = $new->where($where)->find();
		if (!$ret_getone) header("location:http://www.miucool.com");
		
		//$maindata	=	$new->join('join newtype on news.newtype=newtype.id')->field('news.id,news.fstcreate,author,newcontent,typename')->select();
		$count 		= $new->where($where)->count();
		$page 		= new Page($count,15);
		$pagelist	= $page->show();
		$maindata	= $new->join('join newtype on news.newtype=newtype.id')
		->field('news.id,news.fstcreate,author,newtitle,newcontent,typename,count,entypename')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		//echo $new->getLastSql();
		//浏览次数
		$data['id'] = $id;
		$data['count'] = $maindata[0]['count'] + 1;
		$new->save($data);
//		echo $new->getLastSql();
		//评论内容
		$comment = M("comment");
		$comwhere['news.id'] = $id;
		$comwhere['comment.isdel'] = 1;
		$commentcout = $comment->where($comwhere)->join('join news on news.id=comment.type')->count();
		$commentpage = new Page($commentcout,15);
		$pagecomment =	$commentpage->show();
		$commemt_data = $comment->where($comwhere)->field('comment.user,comment.fstcreate,comment.comment,comment.type')->join('join news on news.id=comment.type')->order('fstcreate asc ')->limit($commentpage->firstRow.','.$commentpage->listRows)->select();
		//echo $comment->getLastSql();
		
		//翻页
		//$sql = "SELECT * FROM  (SELECT MAX(id)  maxid FROM news WHERE id <$id LIMIT 1)tb1, (SELECT MIN(id) minid FROM news WHERE id>$id LIMIT 1)tb2";
		$sql = "SELECT * FROM (SELECT id,newtitle FROM news WHERE id<$id ORDER BY id DESC LIMIT 1)tb1 UNION ALL SELECT id,newtitle FROM (SELECT* FROM news WHERE id>$id ORDER BY id ASC LIMIT 1)tb2
";
		$tag = M("");
		$data = $tag->query($sql);
		$this->assign('next',$data);
		$this->assign('comment',$commemt_data);
		
		//
		$newlist = M("news");
		$datanew = $newlist->limit(15)->order('id')->field('id,newtitle')->select();
		$this->assign('newslist',$datanew);
		$this->assign('pid',$id);//评论参数
		
		$this->assign('pagecomment',$pagecomment);
		$this->assign('maindata', $maindata);
		$this->assign('pagelist',$pagelist);
		$this->assign('bread','<a href="__APP__/Index">首页</a>>文章列表');
		$maincontent	=	$this->fetch('View:view');
		$this->assign('main',$maincontent);
		
		//文章title	
		$this->assign('title',$maindata[0]['newtitle']);
		
	
		//
		$tag_footer = $this->fetch('Public:tag_footer');
		$this->assign('tag_footer', $tag_footer);
		$this->display("index");
		
	}
	
	
	
	public function savecomment(){
		$m = M("comment");
		$vo['userid'] 	= $_COOKIE['uid']?$_COOKIE['uid']:0;
		$vo['isdel']  	= $_COOKIE['uid']?'1':'1';
		$vo['comment'] 	= htmlspecialchars(addslashes($_POST['comment']));
		$vo['type']  	= $_POST['type'];
		$vo['email'] 	= $_POST['email'];
		//$vo['user']  	= $_COOKIE['uname']?$_COOKIE['uname']:'游客'.substr(session_id(),-8);
		$vo['user'] 	= $_COOKIE['uname']?$_COOKIE['uname']:$_POST['user'];
		if (false !== $m->add($vo)){
			$this->ajaxReturn($vo,'提交成功',1);
		}else {
			$this->ajaxReturn('',"操作失败",0);
		}
	}
	
	/*function _empty(){
		header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
		$this->display("Public:404");
	}*/

}
?>
