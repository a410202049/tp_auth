<?php
namespace Admin\Controller;
use \Admin\Classes\AdminController;

class IndexController extends AdminController {

    public function __construct() {
      parent::__construct();
    }

    public function index(){
    	$this->display();
    }

	public function mainInfo() {
		if (function_exists('gd_info')) {
			$gd = gd_info();
			$gd = $gd['GD Version'];
		} else {
			$gd = "不支持";
		}
		$system_info = array(
			'0' => PHP_OS,
			'1' => php_sapi_name(),
			'2' => function_exists("mysql_close") ? mysql_get_client_info() : '不支持',
			'3' => PHP_VERSION,
			'4' => $gd,
			);
		$this->assign('system_info', $system_info);
		$this->display();
	}

    public function login(){
    	//判断是否已经登陆，如果已经登陆则跳转到后台首页
		if(session('userinfo')){
			$this->redirect('index');	
		}
		if(IS_POST)
        {
			//验证验证码是否正确
            if(empty($_POST['code']))
            {
                $this->error("验证码不能为空！");
				exit;	 
            }
			$verify = new \Think\Verify();
            if(!$verify->check($_POST['code'])){
				$this->error("验证码有误！");
				exit;	
			}
            //验证用户名是否正确
           if(empty($_POST['username'])){
                $this->error("用户名不能为空！");
				exit;	 
            }
            //验证密码
           if(empty($_POST['password'])){
                $this->error("密码不能为空！");
				exit;	 
            }
           $admin = M('user','sys_');//实例化系统表
           $userData = $admin->where(array('username'=>$_POST['username']))->find();
           if(!$userData){
           		$this->error("当前用户不存在");
           }
           if(md5($_POST['password'])!=$userData['password'] || !$userData['is_manage']){
           		$this->error("账号或密码错误");
           }
           $admin->where(array('id'=>$userData['id']))->save(array('last_login_time'=>time(),'last_login_ip'=>get_client_ip()));
           $groups = $this->auth->getGroups($userData['id']);
           $userData['groupname'] = $groups[0]['title'];
           session('userinfo',$userData);
           $this->success('登陆成功！','index'); 
        }else{
        	$this->display();
        }
    }



	/*
	*注销登陆
	*/
    public function logout()
    {
       //清空登陆信息
	   session('userinfo',null);
	   $this->success('退出登陆成功',U('login'));
    }

	public function verify()
	{
	   $config =    array(
		'fontSize'    =>    30,    // 验证码字体大小
		'length'      =>    4,     // 验证码位数
		);		
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
	}

	/**
	 * 文件上传
	 */
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
        	$path = $info['Filedata']['savepath'].$info['Filedata']['savename'];
        	$this->resultMsg('success','上传成功',$path);
        }
    }


	/**
	* 清理缓存，待完善
	*/
	public function cache_clean() {
		echo "<span style='color: red;'>缓存清理中……</span><br/>";
		$path = RUNTIME_PATH . "Cache/";
		echo delDirAndFile($path);
		echo "<br/><span style='color: red;'>缓存清理完毕。</span>";
	}

  /**
   * 站点设置
   */
  public function siteSetting(){
    $arr = I();
    $site = M('site_setting','sys_');
    if(IS_POST){
      $site->where(array('id'=>1))->save($arr);
      $this->resultMsg('success','保存成功');
    }else{
      $data = $site->where(array('id'=>1))->find();
      $this->assign('data',$data);
      $this->display();
    }
  
  }

  /**
   * 修改当前用户密码
   */
  public function changePassword(){
    $arr = I();
    if(IS_POST){
      $admin = M('user','sys_');
      $data = $admin->where(array('id'=>$this->uid))->find();
      if($data['password']!= md5($arr['oldpassword'])){
        $this->resultMsg('error','旧密码不正确');
      }
      $admin->where(array('id'=>$this->uid))->save(array('password'=>md5($arr['password'])));
      $this->resultMsg('success','密码修改成功');
    }else{
        $this->display();
    }
  }


  /**
   * 头像上传
   */
  public function shearPhoto(){
    if(IS_POST){
        require($_SERVER['DOCUMENT_ROOT'].'/Public/shearphoto_common/php/shearphoto.php');
        $avatar = $result ? $result[0]['ImgName'] : '';
        $user = M('user','sys_');
        $user->where(array('id'=>$this->uid))->save(array('avatar'=>$avatar));
        exit;
    }else{
        $this->display();
    }
  }


}