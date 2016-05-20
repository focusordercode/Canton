<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE'   => 'mysqli', //数据库类型
    'DB_HOST'   => 'localhost',//服务器地址
    'DB_NAME'   => 'focus',//数据库名
    'DB_USER'   => 'root', //用户名
    'DB_PWD'    => 'root', //密码
    'DB_PORT'   => 3306, //端口
    'DB_PREFIX' => 'foc_', //数据库表前缀 
    'DB_CHARSET'=> 'utf8', // 字符集
    
    'AUTH_CONFIG' => array(
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => '', //用户组数据表名
        'AUTH_GROUP_ACCESS' => '', //用户组明细表
        'AUTH_RULE' => '', //权限规则表
        'AUTH_USER' => '',//用户信息表
    ),
    
    'DB_BACKUP' => './Data/',
    'IMAGE_FILE_PATH' => './Public/index/images/',//图片上传路径
    'ATHER_FILE_PATH' => './Public/index/Upload/', //其他文件上传路径

    'BACKUP_PATH' => './Data/', //数据库备份目录
    'DOMAIN' => '', //网站域名
    //默认成功失败跳转模板
    // 'TMPL_ACTION_ERROR' => 'Public:error',
    // 'TMPL_ACTION_SUCCESS' => 'Public:success',

    // "TMPL_FILE_DEPR"=>"_",  //减少目录层次
    // "APP_GROUP_LIST" => '',  // 项目分组
);