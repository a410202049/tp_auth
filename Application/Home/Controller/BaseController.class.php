<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {
    public function __construct() {
    	parent::__construct();
    	$menu = M('category','sys_');
    	$category = $menu->select();
    	$this->assign('category',$category);
    }

}