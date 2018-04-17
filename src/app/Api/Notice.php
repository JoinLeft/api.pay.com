<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 通知接口服务
 *
 * @author: jiang
 */

class Notice extends Api {

	public function getRules() {
        return array(
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
	public function getNotice() {
        return array(
            'title' => 'Hello ' . $this->username,
        );
	}
}
