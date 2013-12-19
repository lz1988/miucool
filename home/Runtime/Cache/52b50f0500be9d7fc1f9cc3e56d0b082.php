<?php if (!defined('THINK_PATH')) exit();?><div class="tabs-line">
				<span><b class="icon1">最新文章</b></span>
				<span class="current"><b class="icon2">随机文章</b></span>
				<span style="border-right:none"><b class="icon3">回复最多</b></span>
</div>
<ul class="random-article tab-con" style="display: none; ">
<?php if(is_array($newdatalist)): $i = 0; $__LIST__ = $newdatalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><b class="num-<?php echo ++$key;?>"><?php echo ($key); ?></b><span class="last-time"><?php echo (date("m/d",strtotime($vo["fstcreate"]))); ?></span><a href="<?php echo U("/view/$vo[id]");?>"><?php echo ($vo["newtitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<ul class="random-article tab-con" style="display: block; ">
<?php if(is_array($hotdatalist)): $i = 0; $__LIST__ = $hotdatalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><b class="num-<?php echo ++$key;?>"><?php echo ($key); ?></b><a href="<?php echo U("/view/$vo[id]");?>"><?php echo ($vo["newtitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

<ul class="hot-article tab-con" style="display: none; ">
<?php if(is_array($replaydata)): $i = 0; $__LIST__ = $replaydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><b class="num-<?php echo ++$key;?>"><?php echo ($key); ?></b><span>(<?php echo ($vo["counts"]); ?>)</span><a href="<?php echo U("/view/$vo[id]");?>"><?php echo ($vo["newtitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
</ul>