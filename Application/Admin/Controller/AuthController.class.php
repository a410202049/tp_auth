<?php
namespace Admin\Controller;
use \Admin\Classes\AdminController;

class AuthController extends AdminController {
	/**
	 * 权限菜单
	 */
    public function index(){
    	$rule = M('auth_rule','sys_');
        $rules = $rule->field('title,name,pid,id,create_time,isshow,sort')->order('sort')->select();
        foreach ($rules as $key => $value) {
            $rules[$key]['order'] = $value['sort'];
        	$rules[$key]['parentid']= $value['pid'];
        	$rules[$key]['name'] = $value['title'];
        	$rules[$key]['title'] = $value['name'];
        	$rules[$key]['isshow'] = $value['isshow']?'√':'×';
        	$rules[$key]['create_time'] = date('Y-m-d H:i:s', $value['create_time']);    
        }
        $tree=new \Org\Util\tree;
        $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $tree->init($rules);
        $str = "<option value=\$id >\$spacer\$name</option>";
        $menus = $tree->get_tree(0,$str,1);
        $tdStr = "<tr>
                    <td width='60px'><input type='text' class='form-control' name='order[\$id]' value='\$order'></td>
                    <td>\$id</td>
                    <td>\$spacer\$name</td>
                    <td>\$title</td>
                    <td><font color='red'>\$isshow</font></td>
                    <td>\$create_time</td>
                    <td><a class='option del-menu' data-val='\$id'>删除</a></td>
                </tr>";
        $tree->init($rules);
        $tr = $tree->get_tree(0, $tdStr);
        $this->assign('tr',$tr);
        $this->assign('menus',$menus);
    	$this->display();
    }

    public function addMenu(){
    	$arr = I();
    	if(IS_POST){
    		if(!$arr['title']){
    			$this->resultMsg('error','菜单名称不能为空');
    		}
    		$rule = M('auth_rule','sys_');
    		if($rule->where(array('title'=>$arr['title'],'pid'=>$arr['pid']))->find()){
    			$this->resultMsg('error','菜单名称已经存在');
    		}
    		$arr['create_time'] = time();
    		$status = $rule->add($arr);
    		if($status){
    			$this->resultMsg('success','菜单添加成功');
    		}
    	}
    }

    public function delMenu(){
    	$arr = I();
    	if(IS_POST){
    		$id = $arr['id'];
    		$rule = M('auth_rule','sys_');
    		$rule->delete($id);
    		$rule->where(array('pid'=>$id))->delete();
    		$this->resultMsg('success','菜单删除成功');
    	}
    }

    /**
     * 管理员列表
     */
    public function adminList(){
    	$admin = M('user','sys_');
    	$admins = $admin->select();
    	foreach ($admins as $key => $value) {
    		$group = $this->auth->getGroups($value['id']);
    		$admins[$key]['groupname'] = $group[0]['title'];
    		$admins[$key]['last_login_time'] = date('Y-m-d H:i:s',$value['last_login_time']);
    		$admins[$key]['status'] = $value['status'] ? '启用' : '禁用';
    		$admins[$key]['disable'] = $value['status'] ? '禁用' : '启用';
    	}
    	$this->assign('admins',$admins);
    	$this->display();
    }

    /**
     * 分组列表
     */
    public function groupList(){
	    $group = M('auth_group','sys_');
	    $groups = $group->select();
	    $this->assign('groups',$groups);//用户组列表
    	$this->display();
    }

    public function addUser(){
    	$arr = I();
    	if(IS_POST){
    		$admin = M('user','sys_');
    		$data['username'] = I('username');
    		$data['password'] = md5(I('password'));
    		$data['last_login_time'] = time();		//创建时间
    		$data['last_login_ip'] = '0.0.0.0';	
    		$where['username'] = I('username');
    		$result = $admin->where($where)->find();
    		if(!empty($result)){
    			$this->resultMsg('error','用户名已存在');
    		}
    		//添加用户
    		$result['uid']  = $admin->add($data);
    		$result['group_id'] = I('groupid');	//用户组ID
    		if($result['uid']){
    			$group_access = M('auth_group_access','sys_');
    			//分配用户组
    			if($group_access->add($result)){
    				$this->resultMsg('success','用户添加成功');
    			}else{
    				$this->resultMsg('success','用户组分配失败');
    			}
    		}else{
    			$this->resultMsg('error','用户添加失败');
    		}
    	}
    }

    /**
     * 删除用户
     */
    public function delUser(){
    	$arr = I();
    	if(IS_POST){
    		$id = $arr['id'];
            if($id == '1'){
                $this->resultMsg('error','不能删除系统默认账户');
            }
    		$admin = M('user','sys_');
    		$status = $admin->where(array('id'=>$id))->delete();
    		if($status){
	    		$access = M('auth_group_access','sys_');
	    		$access->where(array('uid'=>$id))->delete();
	    		$this->resultMsg('success','用户删除成功');
    		}

    	}
    }

    /**
     * 禁用用户
     */
    public function disableUser(){
    	$arr = I();
    	if(IS_POST){
    		$admin = M('user','sys_');
            if($arr['id'] == '1'){
                $this->resultMsg('error','不能禁用系统默认账户');
            }
    		$data = $admin->where(array('id'=>$arr['id']))->find();
    		if($data['status']){
    			$admin->where(array('id'=>$arr['id']))->save(array('status'=>0));
    			$this->resultMsg('success','用户禁用成功');
    		}else{
    			$admin->where(array('id'=>$arr['id']))->save(array('status'=>1));
    			$this->resultMsg('success','用户启用成功');
    		}
		}
    }

    /**
     * 添加分组
     */
    public function addGroup(){
    	if(IS_POST){
    		$arr = I();
    		if(empty($arr['rule'])){
    			$this->resultMsg('error','权限不能为空');
    		}
    		$m = M('auth_group','sys_');
    		$data['title'] = I('title');
    		$data['rules'] = implode(',', $arr['rule']);
    		$data['create_time'] = time();
    		if($m->add($data)){
    			$this->resultMsg('success','用户组添加成功');
    		}else{
    			$this->resultMsg('error','用户组添加失败');
    		}

    	}else{
    		$rule = M('auth_rule','sys_');
    		$rules = $rule->field('title,pid,id')->select();
	        foreach ($rules as $key => $value) {
	        	$rules[$key]['parentid']= $value['pid'];
	        	$rules[$key]['name'] = $value['title'];
	        }

	        $tree=new \Org\Util\tree;
	        $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
	        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
	        $tree->init($rules);
	        $str = "<label style='margin-bottom:5px;'><input name='rule[]' type='checkbox' value='\$id' /><i></i>&nbsp;\$spacer\$name</label><br>";

	        $check = $tree->get_tree(0,$str,1);
	        $this->assign('rules',$check);
    		$this->display();
    	}
    }

    /**
     * 编辑用户组
     */
	public function editGroup(){
		$arr = I();
		$id = $arr['id'];
		$m = M('auth_group','sys_');
		if(IS_POST){
    		if(empty($arr['rule'])){
    			$this->resultMsg('error','权限不能为空');
    		}

    		$data['id'] = $id;
    		$data['title'] = I('title');
    		$data['rules'] = implode(',', $arr['rule']);

    		if($m->save($data)){
    			$this->resultMsg('success','用户组编辑成功');
    		}else{
    			$this->resultMsg('error','用户组编辑失败');
    		}

		}else{
			$authData = $m->where(array('id'=>$id))->find();
			$arrs = explode(',', $authData['rules']);
    		$rule = M('auth_rule','sys_');
    		$rules = $rule->field('title,pid,id')->select();
	        foreach ($rules as $key => $value) {
	        	$rules[$key]['parentid']= $value['pid'];
	        	$rules[$key]['name'] = $value['title'];
	        	$rules[$key]['check'] = in_array($value['id'], $arrs) ? 'checked="checked"' : '';

	        }
	        $tree=new \Org\Util\tree;
	        $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
	        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
	        $tree->init($rules);
	        $str = "<label style='margin-bottom:5px;'><input name='rule[]' type='checkbox' \$check value='\$id' /><i></i>&nbsp;\$spacer\$name</label><br>";
	        $check = $tree->get_tree(0,$str,1);
	        $this->assign('rules',$check);
	        $this->assign('id',$id);
	        $this->assign('authData',$authData);
	        $this->display();
		}
	}

    /**
     * 删除分组
     */
	public function delGroup(){
		$arr = I();
		if(IS_POST){
			$id = $arr['id'];
            if($id == '1'){
                $this->resultMsg('error','不能删除系统默认分组');
            }
	    	$where['id'] = $id;
	    	$m = M('auth_group','sys_');
	    	if($m->where($where)->delete()){
	    		$access = M('auth_group_access','sys_');
	    		$access->where(array('group_id'=>$id))->delete();
	    		$this->resultMsg('success','用户组删除成功');
	    	}else{
	    		$this->resultMsg('error','用户组删除失败');
	    	}
		}
	}

    /**
     * ajax分组列表
     */
    
	public function getGroupList(){
	    $group = M('auth_group','sys_');
	    $groups = $group->select();
	    $option = "";
	    foreach ($groups as $key => $value) {
	    	$option.= '<option value="'.$value['id'].'">'.$value['title'].'</option>';
	    }
	    $this->resultMsg('success','获取列表成功',$option);
	}

    public function order(){
        $arr = I();
        $orders = $arr['order'];
        $rule = M('auth_rule','sys_');
        foreach ($orders as $key => $value) {
            $rule->where(array('id'=>$key))->save(array('sort'=>$value));
        }
        $this->resultMsg('success','排序成功');
    }


 }

