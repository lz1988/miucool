<?php if (!defined('THINK_PATH')) exit();?>
<style>
    .tag_morenew ul li{ line-height:24px;padding:4px 0 1px 24px;}
    .newtype1{
        background: url(__ROOT__/static/images/index1.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype2{
        background: url(__ROOT__/static/images/index2.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype3{
        background: url(__ROOT__/static/images/index3.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype4{
        background: url(__ROOT__/static/images/index4.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype5{
        background: url(__ROOT__/static/images/index5.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype6{
        background: url(__ROOT__/static/images/index6.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype7{
        background: url(__ROOT__/static/images/index7.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype8{
        background: url(__ROOT__/static/images/index8.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype9{
        background: url(__ROOT__/static/images/index9.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
    .newtype10{
        background: url(__ROOT__/static/images/index10.gif) 0 8px no-repeat;
        width: 210px;
        overflow: hidden;
        white-space: nowrap;
    }
</style>
<h3 class="tit">热门文章</h3>
<ul class="u">
    <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="newtype<?php echo ($k); ?>"><a href="<?php echo U("/view/$vo[id]");?>"><?php echo ($vo["newtitle"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>