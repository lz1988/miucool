<?php
if (!defined('THINK_PATH')) exit();
return array(
    'DB_TYPE'            => 'mysql',	        // 使用的数据库类型
    'DB_HOST'            => 'localhost',
    'DB_NAME'            => 'think_db',	    	// 数据库名
    'DB_USER'            => 'root',	    	// 数据库账号
    'DB_PWD'             => '4bd824823d',	        // 数据库密码
    'DB_PORT'            => '3306',
    'DB_PREFIX'          => '',	    	// 表前缀
    'TOKEN_ON'           => false,	    	// 是否开启令牌验证
    'URL_MODEL'          => 2,		        // URL模式：0普通模式 1PATHINFO 2REWRITE 3兼容模式
    'SHOW_PAGE_TRACE'    => false,	    	// 是否显示调试跟踪信息
    'URL_HTML_SUFFIX'    => '.html',	        // 伪静态后缀
    'URL_ROUTER_ON'      => true,               // 是否开启路由
	'URL_ROUTE_RULES'	 =>array(
		'/^view\/(\d+)$/' 		=> 'view/index?id=:1',	//显示文章
	),	
	'USER_AUTH_KEY'		 =>'authId',
	
    /* 网站设置 */
    'SITE_NAME'          => 'MiuCool',	// 站点名字
    'NO_ARTICLE_VIEW'    => '抱歉：您请求的文章不存在，系统已记录该错误。请继续访问本站其他内容。',
);
?>
