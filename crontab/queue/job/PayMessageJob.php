<?php
/**
 * Created by PhpStorm.
 * User: jiang
 * Date: 2018/4/12
 * Time: 21:26
 */
use PhalApi;
use PhalApi\NotORM;
class PayMessageJob
{
    //前置方法
    public function setUp() {
        fwrite(STDOUT, $this->job->payload['id']."：开始运行：状态：".$this->job->getStatus()."\n");
    }

    //这个方法是默认方法必须存在
    public function perform() {
        //这里用来处理任务

        ini_set('display_errors', 'on');
        error_reporting(E_ALL);

        // 引入框架入口文件
        require_once dirname(__FILE__) . '/../../../public/init.php';
        //数据库入库
        //\PhalApi\DI()->notorm->sms->insert(array('name' => ($this->job->payload['args'])[0]['name'], 'status' => $this->job->getStatus()));
        //数据入库
        //fwrite(STDOUT, $this->job->payload['id']."：正在运行：状态：".$this->job->getStatus()."\n");
        //throw new Exception('处理异常');
    }

    //后置方法
    public function tearDown() {
        fwrite(STDOUT, $this->job->payload['id']."：运行完毕：状态：".$this->job->getStatus()."\n");
    }
}