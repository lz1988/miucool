<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>
<meta name="keywords"content="米库(miucool)：分享音乐、分享电影、分享美食、分享读书、分享运动、生活点滴。" />
<meta name="description"content="米库(miucool)最大的个人免费发布社区，米库内容丰富多元、涵盖音乐、电影、旅行、美食、运动、读书、等热门主题，真正为用户提供免费分享生活平台。" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="../Public/css/common.css"/>
<link rel="stylesheet" href="../Public/css/dshare.css"/>
<link rel="stylesheet" href="../Public/css/tb_article.css"/>
<script language="javascript" src="../Public/js/jquery.js"></script>
<script language="javascript" src="../Public/js/jquery.form.js"></script>
<script language="javascript" src="../Public/js/default.js"></script>
<script src="../Public/js/view-history.js"></script>
<script>

if(typeof localStorage !== 'undefined' && typeof JSON !== 'undefined') {
    var viewHistory = new ViewHistory();
    viewHistory.init({
        limit: 10,
        storageKey: 'viewHistory',
        primaryKey: 'url'
    });
}
</script>

<script>
/* <![CDATA[ */
// 如果 ViewHistory 的实例存在，则可以将页面信息写入。
if(viewHistory) {
    var page = {
        "title": document.getElementsByTagName('title')[0].innerHTML,
        "url": location.href // 这是 primaryKey
        // "time": new Date()
        // "author": ...
        // 这里可以写入更多相关内容作为浏览记录中的信息
    };
    viewHistory.addHistory(page);
}
/* ]]> */
</script>
<script>
$(document).ready(function(){

	$("#commentform").ajaxForm({
		beforeSubmit:checkcomment,
		success:complete,
		dataType:'json'
	});
	
	function checkcomment(){
		var user = $("input[name='user']").val();
		$("#result").css({'background':'url(../Public/images/no.png) no-repeat 10px 5px'});
		if ($.trim(user) == ''){
			$("#result").html("昵称不能为空！").show();
			$("#result").fadeOut(2000);
			return false;
		}
		
		var email = $("input[name='email']").val();
		if ($.trim(email) == ''){
			$("#result").html("邮箱不能为空！").show();
			$("#result").fadeOut(2000);
			return false;
		}

		var comment = $("textarea[name='comment']").val();
		if ($.trim(comment) == ''){
			$("#result").html("评论内容不可以为空！").show();
			$("#result").fadeOut(2000);
			return false;
		}
		
	}
	
	function complete(data){
		if (data.status == 1){
			$("#result").css({'background':'url(../Public/images/yes.png) no-repeat 10px 5px'});
			$("#result").html(data.info).show();
			setTimeout("self.location.reload();",1000);
		}else{
			$("#result").css({'background':'url(../Public/images/no.png) no-repeat 10px 5px'});
			$("#result").html(data.info).show();
			$("#result").fadeOut(2000);
		}
	}
})

</script>
</head>
<body>


<!--加载头部导航-->
<div id="tag_banner">
<?php echo ($tag_header); ?>
</div>

<div id ="tag_content_wrap">
<div id="tag_content">

<!--加载文章内容-->
<div class="tag_main"><?php echo ($main); ?></div>

<!--加载文章类别-->
<div class="article-tab"><?php echo ($tag_article); ?></div>
<div class="tag_type"><?php echo ($newtype); ?></div>
<div id="view-history" class="widget">
<h3 class="tit">文章浏览记录</h3>
<div class="loading-s" style="display: none; ">正在加载...</div>
</div>
</div>
</div>


<!--加载底部导航-->
<div id="tag_footer"><?php echo ($tag_footer); ?></div>


<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F322c20650793bcae617cdfcde1a6bbc7' type='text/javascript'%3E%3C/script%3E"));
</script>
<script src="../Public/js/share.js"></script>
<script>
/*保存用户记录*/
var wrap = document.getElementById('view-history');

if(viewHistory && wrap) {
    var histories = viewHistory.getHistories();
 
    var list = document.createElement('ul');
    if(histories && histories.length > 0) {
        for(var i=histories.length-1; i>=0; i--) {
            var history = histories[i];
 
            var item = document.createElement('li');
            var link = document.createElement('a');
            link.href = history.url;
            link.innerHTML = history.title;
 
            item.appendChild(link);
            list.appendChild(item);
        }
 
        // 插入页面特定位置
        wrap.appendChild(list);
    }
}

</script>
</body>
</html>