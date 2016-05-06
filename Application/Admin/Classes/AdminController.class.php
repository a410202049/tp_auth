<?php
/*
* 所有后台相关操作的控制器都必须继承于该控制器
*/
namespace Admin\Classes;
class AdminController extends CommonController {
	public $uid;
    public function __construct() {
		parent::__construct();
		if(!$this->check_login()&&!(in_array(U(),array(U('Admin/Index/login'))))&&!(in_array(U(),array(U('Admin/Index/verify'))))&&!(in_array(U(),array(U('Admin/Index/upload')))))
		{
			$this->redirect('Admin/Index/login');
		}


		$this->assign('userinfo',session('userinfo'));
		$userinfo = session('userinfo');
		$this->uid = $userinfo['id'];
		$m = M('auth_rule','sys_');
		$field = 'id,name,title,icon';
		$where['pid'] = 0;    //顶级ID
		$where['isshow'] = 1; //显示状态
		$data = $m->field($field)->where($where)->order('sort')->select();
		
		$ctype = C('CONTENT_TYPE');//内容类型
		$this->assign('ctype',$ctype);

		//没有权限的菜单不显示
		foreach ($data as $k=>$v){      
			if(!$this->auth->check($v['name'],  $this->uid) &&  $this->uid != 1){
			  unset($data[$k]);
			}else{
			  $data[$k]['sub'] = $m->field($field)->where('pid='.$v['id'].' AND isshow=1')->select();
			  foreach ($data[$k]['sub'] as $k2 => $v2){       
			    if(!$this->auth->check($v2['name'], $this->uid) && $this->uid != 1){
			      unset($data[$k]['sub'][$k2]);
			    }
			  }
			}
		}

		$this->assign('menuData',$data);//菜单信息

		//不需要验证的权限
		$not_check = array('Index/login','Index/verify','Index/upload','Index/index','Index/logout');
		
		//当前操作的请求                 模块名/方法名
		if(in_array(CONTROLLER_NAME.'/'.ACTION_NAME, $not_check)){
			return true;
		}

		//下面代码动态判断权限
		if(!$this->auth->check(CONTROLLER_NAME.'/'.ACTION_NAME,$this->uid) && $this->uid != 1){
			// $this->error('没有权限');
			if(IS_AJAX){
				 $this->resultMsg('error','没有权限');
			}else{
				$this->error('没有权限');
			}
		}
	
    }

    /*
     * 验证用户是否登陆
     */
   final protected function check_login()
    {
	  return session("userinfo")?true:false;
    }


	// function error($error,$jumpUrl,$waitSecond=3,$type=1)
	// {
	// 	require ('Public/tpl/error.htm');
	// }
	// function success($message,$jumpUrl,$waitSecond=3,$close=1)
	// {
	// 	require ('Public/tpl/success.htm');
	// }
	// function tip($info,$waitSecond=3)
	// {
	// 	require ('Public/tpl/tip.htm');
	// }	
}