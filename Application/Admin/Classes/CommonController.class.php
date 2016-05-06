<?php
/*
* 这是一个所有其它模块控制器都必须继承的控制器
*/
namespace Admin\Classes;
use Think\Controller;
class CommonController extends Controller {
  public $auth;
	public function __construct()
	{	    
    parent::__construct();
    $this->auth = new \Think\Auth();
	}

	
    /**
   * [resultMsg 公共信息返回]
   * @param  [type] $status [返回状态,success或error]
   * @param  [type] $msg    [返回消息]
   * @param  string $data   [返回值]
   * @return [type]         [json]
   */
    public function resultMsg($status, $msg, $data = '') {
        $array['status'] = $status;
        $array['message'] = $msg;
        $array['data'] = $data;
        $this->ajaxReturn($array, 'json');
    }

}