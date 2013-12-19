<?php if (!defined('THINK_PATH')) exit();?>
<h3 class="tit">专题分享</h3>
<ul class="u">
<?php if(is_array($artype)): $i = 0; $__LIST__ = $artype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="newtype"><a href="<?php echo U("/article/$vo[entypename]");?>"><?php echo ($vo["typename"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>