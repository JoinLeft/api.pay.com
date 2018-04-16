<?php
/**
 * 常驻进程
 */

//项目名称
$app_name = $argv[1];
//Job名
$job_name = $argv[2];

//判断项目是否存在
$app_path = dirname(dirname(dirname(__FILE__)))."/src/$app_name";
if ( !file_exists($app_path) ) {
    exit("项目不存在\n");
}
//$job_path = "$app_path/Common/$job_name.php";

$job_path = dirname(__FILE__)."/$job_name.php";
//判断job是否存在
if ( !file_exists($job_path) ) {
    exit("Job不存在\n");
}
//自动加载job类
require_once $job_path;
//require dirname(__FILE__).'/../../vendor/joinleft/php-resque/demo/job.php';
//自动加载

//引入库文件
require_once dirname(__FILE__).'/../../vendor/joinleft/php-resque/resque.php';