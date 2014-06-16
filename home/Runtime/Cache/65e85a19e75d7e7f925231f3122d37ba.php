<?php if (!defined('THINK_PATH')) exit();?>
<div class="home">
<div class="miu"></div>
<div class="cool">
<span>这里正在分享……</span>
<?php if(is_array($maindata)): $i = 0; $__LIST__ = $maindata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="miulist"><div class="item-pic"><a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><img src="__ROOT__/static/thumbpath/<?php echo ($vo["mnewimg"]); ?>" title="<?php echo ($vo["newtitle"]); ?>" width="220"  height="250"alt=""></a></div>
<div class="item-title"><a href="<?php echo U("/view/$vo[id]");?>" target="_blank" title="<?php echo ($vo["newtitle"]); ?>"><?php echo ($vo["newtitle"]); ?></a></div>
<div class="item-author">分享者：<?php echo ($vo["author"]); ?></div></div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>