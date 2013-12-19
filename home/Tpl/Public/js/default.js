// JavaScript Document
$(function(){
	
	//首页文章移动变色
	$(".article").hover(function(){
		$(this).addClass('article_hover');
	
	},function(){
		$(this).removeClass('article_hover');
	
	});
	
	//首页文章tab
	$(".article-tab .tabs-line span").each(function(i){
		$(this).hover(function(){
			$(".tab-con").hide();
			$(".article-tab .tabs-line span").removeClass("current");
			$(this).addClass("current");
			$(".tab-con:eq("+i+")").show();
		})
	})

});

//登陆验证form
var check=function(){
	var	 username 	= $("#username");
	var password	= $("#password");
	var checkcode	= $("#checkcode");
	
	if (username.val() == "") {
		alert("用户名不可为空");
		return false;
		//art.dialog('artDialog: I Love You!', function () {alert('Thank you!')});exit;
	}
	if (password.val() == "") {
		alert("密码不可为空");
		return false;
		//art.dialog('artDialog: I Love You!', function () {alert('Thank you!')});exit;
	}
	if (checkcode.val() == "") {
		alert("验证码不可为空");
		return false;
		//art.dialog('artDialog: I Love You!', function () {alert('Thank you!')});exit;
	}
	
}

//注册验证form
var checkregister=function(){
	var	 username 	= $("#username");
	var password	= $("#password");
	var email 		= $("#email").val();
	var supassword  = $("#supassword");
	var reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; 
	
	if (username.val() == "") {
		alert("用户名不可为空");
		return false;
	}
	if (password.val() == "") {
		alert("密码不可为空");
		return false;
	}
	
	if (password.val().length < 6){
		alert("密码长度不可小于6个字符");
		return false;
	}
	if (supassword.val() == "") {
		alert("确认密码不可为空");
		return false;
	}
	if (password.val() != supassword.val()){
		alert("确认密码与原始密码不相同");
		return false;
	}
	if (email == "") {
		alert("邮箱不可为空");
		return false;
	}
	
	if(!reg.test(email)){
		alert("邮箱输入格式错误");
		return false;
	}
}
