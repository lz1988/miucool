<?php if (!defined('THINK_PATH')) exit();?><style>
.pagecut{margin:9px 0px 9px 9px; line-height:20px;height:20px; clear:both;}
.article{clear:left; float:left;padding:15px 4px; position:relative;width:100%; border-bottom:#EEE 1px solid}
.article img{float:left;border:0;}

.title{margin:0px 5px; overflow:hidden;padding-left:8px;}
.info{left;color:#777}
.contents{display:block;overflow:hidden;color:#666}
.t{font-size:14px;overflow:hidden;}
.archive_more{float:right;}
</style>


<?php if(is_array($maindata)): $i = 0; $__LIST__ = $maindata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="article">
<?php if($vo["newimg"] == ''): ?><a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><img height="105" src="../Public/pic/2000.jpg" width="145" /></a>
<?php else: ?>
<a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><img height="105" src="../Public/pic/<?php echo ($vo["newimg"]); ?>" width="145" /></a><?php endif; ?>
    <div class="title">
        <span class="t"><a href="<?php echo U("/view/$vo[id]");?>" target="_blank"><?php echo ($vo["newtitle"]); ?></a></span>
        <div class="info">主题&nbsp;<a href="<?php echo U("/article/$vo[entypename]");?>"><?php echo ($vo["typename"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["author"]); ?>&nbsp; 发表&nbsp;<?php echo (date('Y-m-d',strtotime($vo["fstcreate"]))); ?>&nbsp;&nbsp;&nbsp;&nbsp;点击&nbsp;<?php echo ($vo["count"]); ?>&nbsp;次
        </div>
        <div class="contents"><?php echo (msubstr(delhtmltags($vo["newcontent"]),0,140,'utf-8',false)); ?></div>
    </div>
    <div class="archive_more"><a href="<?php echo U("/view/$vo[id]");?>"  target="_blank"title="<?php echo ($vo["newtitle"]); ?>">阅读全文</a></div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

<div class="pagecut"><?php echo ($pagelist); ?></div>
<!--alivv code start I0AxUyXlF/4=--><!--alivv code end-->