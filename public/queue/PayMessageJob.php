<?php
/**
 * Created by PhpStorm.
 * User: jiang
 * Date: 2018/4/12
 * Time: 21:26
 */
require_once dirname(__FILE__).'/../../vendor/chrisboulton/php-resque/lib/Resque/Event.php';
require_once dirname(__FILE__).'/../../vendor/chrisboulton/php-resque/extras/sample-plugin.php';

class PayMessageJog
{
    public function setUp() {
        $status = new Resque_Job_Status($this->job->payload['id']);
        fwrite(STDOUT, $this->job->payload['id'].':'.$status->get().":开始\n");
    }
    //这个方法是默认方法必须存在
    public function perform() {
        //这里用来处理任务
        //sleep(5);
        $status = $this->job->getStatus();
        fwrite(STDOUT, $status.":执行\n");
    }

    public function tearDown() {
        //$this->job->updateStatus(1);
        fwrite(STDOUT, $this->job->getStatus().":结束\n");
    }
}