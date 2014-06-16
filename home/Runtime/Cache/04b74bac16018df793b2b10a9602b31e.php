<?php if (!defined('THINK_PATH')) exit();?>
<a name="gotop"></a>
<!--header_top-->
<div class="head_top_wrap">
<div class="head_top_article">
<ul id="menu">
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="menu-item" class="menu-item"><a href="<?php echo U("/$vo[url]");?>"><?php echo ($vo["menuname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>

<div class="miu-title">爱生活、爱分享、爱米库-MiuCool</div>
<div class="head_top_user">
<ul id="userinfo">
<?php if($_COOKIE['uname'] != null): ?><li>欢迎你 <a href=""> <?php echo ($_COOKIE['uname']); ?></a>&nbsp;<a href="<?php echo U("/Login/loginout");?>">退出</a></li>
<?php else: ?>
<li><a href="<?php echo U("/login");?>" >登陆</a></li><?php endif; ?>
<li><a href="<?php echo U("/register");?>">注册</a></li>
</ul>
</div>
</div>