<?php
return array(
	'DB_TYPE'   => 'mysqli', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'auth', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'root', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'esc_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
	'URL_HTML_SUFFIX'       => '' ,

	 //Auth配置
    'AUTH_CONFIG' => array(
        // 用户组数据表名
        'AUTH_GROUP' => 'sys_auth_group',
        // 用户-用户组关系表
        'AUTH_GROUP_ACCESS' => 'sys_auth_group_access',
        // 权限规则表
        'AUTH_RULE' => 'sys_auth_rule',
        // 用户信息表
        'AUTH_USER' => 'sys_user'
    ),

    //内容类型
    'CONTENT_TYPE' => array(
    	'article' => '文章类型',
    	'imagelist' => '图集类型'
    ),

    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        'page/[:page\d]$'=>'Home/Index/index'
    )

);