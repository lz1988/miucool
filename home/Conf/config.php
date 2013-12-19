<?php
if (!defined('THINK_PATH')) exit();
return array(
    'DB_TYPE'            		=> 'mysql',	        // 使用的数据库类型
    'DB_HOST'            		=> 'localhost',
    'DB_NAME'            		=> 'think_db',	    	// 数据库名
    'DB_USER'            		=> 'root',	    	// 数据库账号
    'DB_PWD'             		=> '111',	        // 数据库密码
    'DB_PORT'           		=> '3306',
    'DB_PREFIX'         		=> '',	    	// 表前缀
    'TOKEN_ON'           		=> false,	    	// 是否开启令牌验证
    'URL_MODEL'          		=> 2,		        // URL模式：0普通模式 1PATHINFO 2REWRITE 3兼容模式
	'HTML_CACHE_ON'		 		=> true,			//开启静态缓存
    'SHOW_PAGE_TRACE'    		=> false,	    	// 是否显示调试跟踪信息
    'URL_HTML_SUFFIX'    		=> '.html',	        // 伪静态后缀
    'URL_ROUTER_ON'      		=> true,               // 是否开启路由
	'URL_ROUTE_RULES'	 		=>array(
		'/^article\/([a-z_A-Z]{1,})$/'	=> 'Article/index?type=:1',
		'/^login$/'				=> 'Login/index',
		'/^register$/'			=> 'Register/index',
		'/^index$/'				=> 'Index/index',
		'/^index\/page\/(\d+)$/'=> 'Index/index?page=:1',
		'/^view\/(\d+)$/' 		=> 'View/index?id=:1',	//显示文章
		'/^show\/(\d+)$/' 		=> 'Show/index?pid=:1',	//文章分类
		/*'/^show\/(\d+)\/newtype\/(\d+)\/page\/(\d+)$/' => 'show/index?id=:1&newtype=:2&page=:3',	//分页文章分类*/
	),					//路由定义
	'USER_AUTH_KEY'		 		=>'authId',
	'DEFAULT_TIMEZONE'			=>'PRC', // 设置默认时区为新加坡
	'TMPL_STRIP_SPACE' => false, // 是否去除模板文件里面的html空格与换行
	'VAR_PAGE'					=>'page',//分页参数
	
    /* 网站设置 */
    'SITE_NAME'          		=> 'MiuCool',	// 站点名字
    'NO_ARTICLE_VIEW'    		=> '抱歉：您请求的文章不存在，系统已记录该错误。请继续访问本站其他内容。',
);
?>