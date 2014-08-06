<?php
return array(
    //独立分组
    'URL_CASE_INSENSITIVE'=>true,
    'APP_GROUP_LIST' =>'CrowdCredit,Index',
     //默认分组
    'DEFAULT_GROUP' =>'Index',
    'APP_GROUP_MODE'=>1,
    'APP_GROUP_PATH'=>'Modules',
    //制定错误页面模版路径 halt 和_404通用
    //'TMPL_EXCEPTION_FILE'='./Public/tql/error.html'
	//数据库配置
    'DB_HOST' =>'127.0.0.1',
    'DB_USER' =>'root',
    'DB_PWD' =>'89657415',
    'DB_NAME' =>'Optimal_loan',
    'DB_PREFIX'=>'',//表前缀
    // //模版路径
    // 'FMPL_FILE_DEPR'=>'_',
    // //伪静态后缀名 。html
    // 'URL_HTML_SUFFIX' =>'',
     //显示调试
    'SHOW_PAGE_TRACE' => true,
     //加载额外的配置文件
    'LOAD_EXT_CONFIG' =>'verify',
    //默认编码
    'DEFAULT_CHARSET' =>'UTF-8',
     //默认过滤函数 用于I函数
    'DEFAULT_FILTER'=>'htmlspecialchars',
         //伪静态后缀名 。html
    'URL_HTML_SUFFIX' =>'',
   
);
?>