<?php
/**前台公共方法**/

	date_timezone_set('PRC');
	//获取首页菜单
	function getindexmenu(){
		$m		= M("indexmenu");
		$data	= $m->where('isdel=0')->order('sort')->select();
		
		return $data;
		
	}
	//获取首页文章类别
	function getnewtype(){
		$type		= M("newtype");
		$artype		= $type	->where('isdel=0 ')-> select();
		return $artype;
	}
	
	//获取浏览最多的文章--随机
	function getreadmore(){
		$news = M("news");
		$data = $news->order('count')->limit(10)->field('id,newtitle,count')->select();
		return $data;
	}
	
	//最新文章
	function newnew(){
		$newm = M("news");
		$data = $newm->order('id')->limit(10)->field('id,newtitle,fstcreate')->select();
		//echo '<pre>';		print_r($data);
		return $data;
	}
	
	//热门文章
	function hotnew(){
		$hotm = M("news");
		$datas = $hotm->order('count,id')->limit(10)->field('id,newtitle,fstcreate,count')->select();
		return $datas;
	}
	
	//回复文章
	function replay(){
		$news = M("news");
		$data = $news->where('comment.isdel=1')->join('left join comment on comment.type=news.id')->group('comment.type')->order('counts desc')->field('news.id,count(comment.type) as counts,news.newtitle')->select();
		//echo $news->getLastSql();
		return $data;
	}
	
	/*分词*/
	function auto_extract_keywords($bt_auto_content,$bt_auto_len=5){
		require 'ThinkPHP/Extend/Vendor/auto_keywords/pscws4.class.php';
		error_reporting(E_ALL);
		$bt_auto_cws = new PSCWS4();
		$bt_auto_cws->set_charset('utf8');
		$bt_auto_cws->set_dict('ThinkPHP/Extend/Vendor/auto_keywords/dict.utf8.xdb');
		$bt_auto_cws->set_rule('ThinkPHP/Extend/Vendor/auto_keywords/rules.utf8.ini');
		$bt_auto_cws->send_text(preg_replace("/&[a-z]+\;/i",'',strip_tags($bt_auto_content)));
		$bt_auto_ret = array();
		$bt_auto_ret = $bt_auto_cws->get_tops($bt_auto_len,'r,v,p');
		$bt_auto_res = array();
		$bt_auto_i = 0;
		foreach ($bt_auto_ret as $tmp)
		{
			$bt_auto_res[$bt_auto_i] = $tmp['word'];
			$bt_auto_i++;
		}
		$bt_auto_cws->close();
		return $bt_auto_res;
	}
	
	/*清除空格*/
	function delhtmltags($string){
		$string = preg_replace("'([\r\n])[\s]+'", "", $string);               //去掉空白字符
        $string = preg_replace("'&(quot|#34);'i", "", $string);               //替换HTML实体
        $string = preg_replace("'&(amp|#38);'i", "", $string);
        $string = preg_replace("'&(lt|#60);'i", "<", $string);
        $string = preg_replace("'&(gt|#62);'i", ">", $string);
        $string = preg_replace("'&(nbsp|#160);'i", "", $string);
        $string = preg_replace("'<script[^>]*?>.*?</script>'si", "", $string);//去掉javascript
        $string = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $string);         //去掉HTML标记
        $string = preg_replace ('/ |　/is', '', $string);                     //去掉多余空格
		
		return $string;
	}
	/*转义*/
	function check_addslashes($string){
		if (!get_magic_quotes_gpc()) {
			$string = addslashes($string);
		} 
		return $string;
	}
	/*删除目录*/
	function delDirAndFile($dirName)
	{
	
	if($handle = opendir("$dirName")){
	while(false !== ($item = readdir($handle))){
	echo $item."<br/>";
	if($item != "." && $item != ".."){
	if(is_dir("$dirName/$item")){
	   delDirAndFile("$dirName/$item");
	}else{
	   if(unlink("$dirName/$item"))echo"成功删除文件： $dirName/$item<br />\n";
	}
	}
	}
    closedir($handle);
    if(rmdir($dirName))echo"成功删除目录： $dirName<br />\n";
	}
	}
	function checkuser($username){
		$m = M("user");
		$confition['username']	= $username;
		$confition['isdel']		= 0;
		$data = $m->where($confition)->select();
		if ($data) return 1;else return 2;
	}
	
	function getarticle($type){
		$new = 	M("news");
		$where['entypename'] = $type;
		$maindata	= $new->where($where)->join('join newtype on newtype.id=news.newtype')->field('news.id,news.newtitle,news.author,news.fstcreate,news.newcontent,count,typename,entypename')->order('id desc ')->select();
		return $maindata;
	}	
?>