<?php if (!defined('THINK_PATH')) exit();?><style>
.miulist{float:left;width:218px;overflow:hidden;border:#EEEEEE solid 1px;margin:5px 0px 0px 19px;}
span,h1{
	word-wrap: break-word;
	display: block;
	font-size: 20px;
	color: #494949;
	margin: 0;
	padding: 0 0 22px 0;
	line-height: 1.1;
}
.item-pic{
	margin-bottom: 15px;
	text-align: center;
	max-height: 255px;
	overflow: hidden;
}
.item-title{
	height:auto;
	margin: 0 0 5px 0;
	color: #666;
	line-height: 1.4;
	text-align:left;
}
.item-author{
	max-height: 60px;
	line-height: 1.5;
	overflow: hidden;
	margin: 0 0 10px 0;
	text-align:left;
}
</style>
<div class="home">
<div class="miu"></div>

<div class="cool">
<span>这里正在分享……</span>


<?php if(is_array($maindata)): $i = 0; $__LIST__ = $maindata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="miulist">
<div class="item-pic">
<a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><img src="../Public/pic/<?php echo ($vo["newimg"]); ?>" title="<?php echo ($vo["newtitle"]); ?>" width="220"  height="250"alt=""></a></div>
<div class="item-title"><a href="<?php echo U("/view/$vo[id]");?>" target="_blank" title="<?php echo ($vo["newtitle"]); ?>"><?php echo ($vo["newtitle"]); ?></a></div>
<div class="item-author">分享者：<?php echo ($vo["author"]); ?></div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
</div>

<!--<link href="http://fonts.googleapis.com/css?family=Electrolize" rel="stylesheet" type="text/css">
<style type="text/css">
body{ font:12px/20px  "Electrolize","Microsoft YaHei",tahoma,Arial,sans-serif; color:#666; background:url(../Public/images/body_bg.png);}
ul,ol,li{ list-style:none;}
a{ color:#666; text-decoration:none;}
a:hover img{ opacity:.9;}

#waterfall{ margin:0px auto; position:relative;}
.picList{ width:220px; box-shadow:0 0 3px #CCC; background:#FFF; margin:0 6px 12px 6px; position:absolute; display:block;}
.picList:hover{ box-shadow:1px 1px 5px #BBB;}
.picList:hover .shareIcon{ display:block;}
.picList .shareIcon{ display:none; width:100px; height:24px; background:url(../Public/images/share_icon.png) no-repeat; cursor:pointer; position:absolute; top:11px; right:11px; z-index:2; opacity:.9;}
.picList .shareIcon:hover{ opacity:1;}
.picThumbnail{ border-bottom:1px solid #EEE;}
.picThumbnail a{ display:block; margin:11px; max-height:800px; overflow:hidden;}
.picThumbnail img{ max-width:200px; display: block;}
.picDescription{ padding:1px; text-align:center; padding:5px 10px; background:#F7F7F7; margin-top:1px;}

</style>
<script type="text/javascript">
$(function(){
	/*!
	* Ublue jQuery Waterfall
	* Create 2012.02.21
	* Update 2012.10.18 ( 1.由于内容是absolute属性，导致元素偏离了文档，嵌入网页时无法撑开父级区域 2. 性能和代码结构优化 3.已知BUG修复)
	* Copyright (c) 2011, 梦幻神化 
	* http://www.bluesdream.com
	*/
	function waterfall(){
		var wfArea = $("#waterfall"); //显示区域名称
		var wfList = $(".picList"); //内容区域名称
		var wfWidth = wfList.outerWidth(true); //获取内容区域实际宽度（含Margin和Padding的值）
		var wfArr = []; //创建数组，用来记录内容区域高度
		var maxCol = Math.floor( wfArea.width() / wfWidth ); //窗口的宽度除以内容区域宽度，并且向下取整（得出每行能放多少列）
		for(var i = 0; i < wfList.length; i++) { //根据内容区域数量进行循环
			colHeight = wfList.eq(i).outerHeight(true); //获取每个内容区域的高度
			if( i < maxCol ){ //如果i小于maxCol，那就说明是在一行里面（例如每行有4列，那就是4个为一组）
				wfArr[i] = colHeight; //把每组内容区域的高度，放入到数组中
				wfList.eq(i).css("top",0); //第一行Li的默认Top值为0
				wfList.eq(i).css("left",i * wfWidth); //每个列的Left值就是当前列数*内容区域宽度
			}else{
				minHeight = Math.min.apply(null,wfArr); //获取数组中的最小值（也就是每行中，最小高度的那列）
				minCol = getArrayKey(wfArr, minHeight); //最小的值对应的指针
				wfArr[minCol] += colHeight; //加上新高度后更新高度值
				wfList.eq(i).css("top",minHeight); //先得到高度最小的Li，然后把接下来的li放到它的下面
				wfList.eq(i).css("left",minCol * wfWidth); //第i个列的左坐标就是i*列的宽度
			}
		};
		var wfLastLayerT = parseInt(wfList.last().css("top")); //最后一个元素的Top值
		var wfLastLayerH = wfList.last().outerHeight(true); //最后一个元素的高度
		var wfAreaH = wfLastLayerT + wfLastLayerH + "px"; //显示区域的高度为 最后一个元素的Top值+自身高度
		wfArea.css({ "width":wfWidth * maxCol,"height":wfAreaH }); //设置显示区域宽度和高度
	 };

	function getArrayKey(s, v) { //使用for in运算返回数组中某一值的对应项数(比如算出最小的高度值是数组里面的第几个) 
		for( k in s ) {
			if( s[k] == v)  {
				return k;
			};
		};
	};
	window.onload = function() { waterfall(); } //当页面加载完毕，执行函数
	window.onresize = function() { waterfall(); }; //当窗口改变时，执行函数

	function wfLoadImg(){
		var json = "../Public/js/json_load.js";
		$.getJSON(json, function(data){
			$.each(data,function(i){
				var url=data[i].url;
				var desc=data[i].desc;
				var author=data[i].author;
				var html = 	"<div class=\"picList\"><i class=\"shareIcon\"></i><div class=\"picThumbnail\"><a href=\"#\"><img src="+url+"></a></div><div class=\"picDescription\"><p>"+desc+"</p><p>"+author+"</p></div></div>"
				$("#waterfall").append(html);
				waterfall();
			});
		});
	};
	$(window).scroll(function () { //滚动到底部时加载
		var wfLoadArea = 50; //为了更直观，这里加个变量。目的在于这里的参数，表示滚动条距离底部还有多少像素的时候加载
		if( $(document).scrollTop() + $(window).height() > $(document).height() - wfLoadArea ){
			wfLoadImg();
		}
	});
});
</script>

<div><h1>分享从这里开始……</h1></div>

<div id="waterfall">
	<?php if(is_array($maindata)): $i = 0; $__LIST__ = $maindata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="picList">
		<i class="shareIcon"></i>
		<div class="picThumbnail">
			<a href="#"><img src="../Public/pic/<?php echo ($vo["newimg"]); ?>"></a>
		</div>
		<div class="picDescription">
			<p><?php echo ($vo["newtitle"]); ?></p>
			<p>分享者：<?php echo ($vo["author"]); ?></p>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>	
</div>-->