<?php if (!defined('THINK_PATH')) exit(); if(is_array($maindata)): $i = 0; $__LIST__ = $maindata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="article">
<?php if($vo["snewimg"] == ''): ?><a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><img height="155" src="__ROOT__/static/pic/2000.jpg" width="130" /></a>
<?php else: ?>
<a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><img height="175" src="__ROOT__/static/thumbpath/<?php echo ($vo["snewimg"]); ?>" width="145" /></a><?php endif; ?>
    <div class="title">
        <span class="t"><a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><?php echo ($vo["newtitle"]); ?></a></span>
        <div class="info">主题&nbsp;<a href="<?php echo U("/article/$vo[entypename]");?>"><?php echo ($vo["typename"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["author"]); ?>&nbsp; 发表&nbsp;<?php echo (date('Y-m-d',strtotime($vo["fstcreate"]))); ?>&nbsp;&nbsp;&nbsp;&nbsp;点击&nbsp;<?php echo ($vo["count"]); ?>&nbsp;次
        </div>
        <div class="contents"><?php echo (msubstr(delhtmltags($vo["newcontent"]),0,200,'utf-8',false)); ?></div>
    </div>
    <div class="archive_more"><a href="<?php echo U("/view/$vo[id]");?>"  target="_blank"title="<?php echo ($vo["newtitle"]); ?>">阅读全文</a></div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

<div class="pagecut"><?php echo ($pagelist); ?></div>