<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {
    public function __construct() {
    	parent::__construct();
    	$menu = M('menu','sys_');
    	$menus = $menu->select();
    	$this->assign('menus',$menus);
    }

}