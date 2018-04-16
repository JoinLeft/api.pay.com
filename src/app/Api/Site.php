<?php
namespace App\Api;

use PhalApi\Api;
/**
 * 默认接口服务类
 *
 * @author: dogstar <chanzonghuang@gmail.com> 2014-10-04
 */

class Site extends Api {

	public function getRules() {
        return array(
            'index' => array(
                'username' 	=> array('name' => 'username', 'default' => 'PhalApi', 'desc' => '用户名'),
            ),
        );
	}
	
	/**
	 * 默认接口服务
     * @desc 默认接口服务，当未指定接口服务时执行此接口服务
	 * @return string title 标题
	 * @return string content 内容
	 * @return string version 版本，格式：X.X.X
	 * @return int time 当前时间戳
     * @exception 400 非法请求，参数传递错误
	 */
	public function index() {
        ini_set('display_errors', 'on');
        error_reporting(E_ALL);
	    //初始化队列

	    \Resque::setBackend('localhost:6379');
	    $argc = array(
	        'name' => time()
        );
        //写入队列
        for($i=0;$i<100;$i++) {
            $jobId = \Resque::enqueue('default', 'PayMessageJob', $argc, true);
        }
	    //$jobId = \Resque::enqueue('default', 'PHP_Job', $argc);
        return array(
            'title' => 'Hello ' . $this->username,
            'version' => $jobId,
            'time' => $_SERVER['REQUEST_TIME'],
        );
	}
}
