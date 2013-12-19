<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="../Public/css/main.css" />
<script type="text/javascript" src="../Public/js/jquery.js"></script>
<script type="text/javascript">
	  $(document).ready(function(){
	       $("#wenzhang>dd>dl>dd").hide();
	     $.each($("#wenzhang>dd>dl>dt"), function(){
			$(this).click(function(){
				$("#wenzhang>dd>dl>dd ").not($(this).next()).slideUp();
				$(this).next().slideToggle(100);
				//$(this).next().toggle();
			});
			});
	  });
		function showDialog(pageUrl,nWidth,nHeight)
		{
			var left = (screen.width - nWidth) / 2;  
			var top = (screen.height - nHeight) / 2;
			var win=null;
			win=window.open(pageUrl,newwindow,'height='+nHeight+', width='+nWidth+', top='+top+', left='+left+', toolbar=yes, menubar=no, scrollbars=yes, resizable=no,location=no,status=no');
			if(win!=null){
				win.document.title="CRM 3.0";
				win.focus(); 
			}
		}
	  //左边菜单弹出框
	  function add(e){
		var _url = '__URL__/ww';
		//alert(e);
		//window.frames['mainFrame'].src = 'http://baidu.com';
		//$("#mainFrame").src = '__APP__/Menu';
		$("#mainFrame").attr("src","http://baidu.com");

		/*$.post(_url,{'id':e},function(data) {
			if (data) {
				//location.href = 'http://baidu.com';
				//alert('__APP__/'+data);
//				mainFrame.src = '__APP__/'+data; 
				$("#mainFrame").src = '__APP__/'+data+'/';
				//$("#mainFrame").src = 'http://baidu.com';
			}else{
				alert('参数错误');
				return '';
			}
					
		});	*/
	  }
    </script>
<style type="text/css">
dl,dd,dt,ul,li{margin:0; padding:0; list-style:none; color:#333;}
#wenzhang{
 	width:170px; text-align:center; font-size:12px;border-left:1px solid #dedede;border-right:1px solid #dedede; border-bottom:1px solid #dedede;
 }
#wenzhang  dd dl dt{ border-top:1px solid #dedede; background:#f2f2f2; height:35px; line-height:35px; font-weight:bold;}
#wenzhang ul{ background:#f9f9f9; }
#wenzhang li{ border-top:1px solid #efefef; line-height:30px;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
    <dl id="wenzhang">
        <dd><?php if(is_array($res)): $k = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><dl>
           	<dt>
                <?php echo ($key); ?>
			</dt>
          <dd>
              <ul>
              <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="__APP__/<?php echo ($v["pageurl"]); ?>" target="mainFrame"><?php echo ($v["pagename"]); ?></a>
                
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
              </ul>
           </dd>
           
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </dd> 
       
    </dl>
</body>
</html>