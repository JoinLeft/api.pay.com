<?php
/**
 * 监听类
 */

//引入监听类
require_once dirname(__FILE__).'/../../../vendor/chrisboulton/php-resque/lib/Resque/Event.php';

// Somewhere in our application, we need to register:
Resque_Event::listen('afterEnqueue', array('PayMessageEvent', 'afterEnqueue'));
Resque_Event::listen('beforeFirstFork', array('PayMessageEvent', 'beforeFirstFork'));
Resque_Event::listen('beforeFork', array('PayMessageEvent', 'beforeFork'));
Resque_Event::listen('afterFork', array('PayMessageEvent', 'afterFork'));
Resque_Event::listen('beforePerform', array('PayMessageEvent', 'beforePerform'));
Resque_Event::listen('afterPerform', array('PayMessageEvent', 'afterPerform'));
Resque_Event::listen('onFailure', array('PayMessageEvent', 'onFailure'));

class PayMessageEvent
{
    public static function afterEnqueue($class, $arguments)
    {
        echo "Job was queued for " . $class . ". Arguments:";
        print_r($arguments);
    }

    public static function beforeFirstFork($worker)
    {
        echo "Worker started. Listening on queues: " . implode(', ', $worker->queues(false)) . "\n";
    }

    public static function beforeFork($job)
    {
        fwrite(STDOUT, $job->payload['id']."：开始运行钩子：状态：".$job->getStatus()."\n");
    }

    public static function afterFork($job)
    {
        fwrite(STDOUT, $job->payload['id']."：运行完毕钩子：状态：".$job->getStatus()."\n");
    }

    public static function beforePerform($job)
    {
        fwrite(STDOUT, $job->payload['id']."：开始执行Job钩子：状态：".$job->getStatus()."\n");
        //这里抛出异常的话，会把当前任务置为失败
        //	throw new Resque_Job_DontPerform;
    }

    public static function afterPerform($job)
    {
        fwrite(STDOUT, $job->payload['id']."：Job执行完毕钩子：状态：".$job->getStatus()."\n");
        //echo "Just performed " . $job . "\n";
    }

    public static function onFailure($exception, $job)
    {
        fwrite(STDOUT, $job->payload['id']."：Job执行出现异常钩子：状态：".$job->getStatus()."\n");
        fwrite(STDOUT, "---------重新写入队列-------------\n");
        $job->updateStatus(Resque_Job_Status::STATUS_COMPLETE);
        fwrite(STDOUT, $job->payload['id']."：更新状态：状态：".$job->getStatus()."\n");
        /*fwrite(STDOUT, json_encode($job)."\n");
        $queue_id = Resque::enqueue($job->queue, $job->payload['class'], $job->argc, true);
        fwrite(STDOUT, "{$queue_id}新队列id\n");*/
        fwrite(STDOUT, "---------写入队列完毕-------------\n");

        //echo $job . " threw an exception:\n" . $exception;
    }
}