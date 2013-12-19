<?php
/* create on 2013-02-25
	author lizhi
 */
	//获取文章类别
	 function getnewtype(){
		$m 			= M("newtype");
		$datalist 	= $m->field('id,typename')->order('id desc')->select();
		$sel .= "<select name='newtype' id='newtype'><option value='-1'>请选择</option>";
		foreach ($datalist as $v){
			$sel .= "<option value=".$v['id'].">".$v['typename']."</option>";
		}
		$sel .= "</select>";
		return $sel;
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
	/*删除文件*/
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
	/*获取后天已审核评论*/
	function checkcomment(){
		$m 		= M("comment");
		$data 	= $m->where('comment.isdel=1')->join("left join news on news.id=comment.type")->field("news.id,news.newtitle,user,email,comment")->select();
		echo $m->getLastSql();
		return $data;
	}
	
	/*获取访问者ip*/
	function get_onlineip() {
		$onlineip = '';
		if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
			$onlineip = getenv('HTTP_CLIENT_IP');
		} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
			$onlineip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
			$onlineip = getenv('REMOTE_ADDR');
		} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
			$onlineip = $_SERVER['REMOTE_ADDR'];
		}
		return $onlineip;
	}
	
?>