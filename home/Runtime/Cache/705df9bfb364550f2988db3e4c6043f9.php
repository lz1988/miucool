<?php if (!defined('THINK_PATH')) exit();?><style>
.f li{ float:left;line-height:18px;height:18px;padding:10px 0px 5px 10px;}
.go {
	width: 47px;
	height: 106px;
	background-color: #FFF;
	position: fixed;
	_position: absolute;
	_top: expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop, 10)||200)-(parseInt(this.currentStyle.marginBottom, 10)||0)));
	right: 12px;
	bottom: 25%;
	border-radius: 5px;
	box-shadow: 0 0 2px #6E6E6E;
}
.go .top {
	background-position: 0 -33px;
	height: 22px;
}
.go a {
	background: url(../Public/images/a.png) no-repeat;
	display: block;
	text-indent: 999em;
	width: 37px;
	margin: 5px;
	border: 0;
	overflow: hidden;
	float: left;
}
.go .feedback {
	background-position: 0 -54px;
	height: 32px;
}
.go .bottom {
background-position: 0 -88px;
height: 22px;
}
.footer .bottom {
text-align: center;
line-height: 30px;
clear: both;
}
</style>
<ul class="f">
<li><a href="<?php echo U("/Index/index");?>"  target="_blank">关于我们</a></li>
<li><a href="<?php echo U("/Index/index");?>"  target="_blank">联系我们</a></li>
<li><a href="<?php echo U("/Index/index");?>"  target="_blank">意见反馈</a></li>
<li><a href="javascript:void(0)">友情链接申请 QQ:513245459</a></li>
<li>Copyright © 2013 米库-MiuCool | 爱生活、爱分享、爱米库</li>
<li><script src="http://s95.cnzz.com/stat.php?id=5334528&web_id=5334528&show=pic" language="JavaScript"></script></li>
</ul>

<div class="go">
    	<a title="返回顶部" class="top" href="#gotop"></a>
    	<a title="如果您有意见，请反馈给我们！" class="feedback" href="<?php echo U("/Index/index");?>" target="_blank"></a>
    	<a title="返回底部" class="bottom" href="#gobottom"></a>
</div>
	<a name="gobottom">&nbsp;</a>