<?php
namespace Admin\Controller;
use \Admin\Classes\AdminController;
class ContentController extends AdminController {

	public function Category(){
        $category = M('category','sys_');
        $result = $category->field('name,parentid,id,isshow,categorytype')->select();
        $tree=new \Org\Util\tree;
        $tree->icon = array('&nbsp;&nbsp;&nbsp; ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $array = array();
        foreach($result as $r) {
            $r['cname'] = $r['name'];
            $r['status']=$r['isshow']?'√':'×';        
            $array[] = $r;          
        }
        $str  = "<tr>
                    <td>\$id</td>
                    <td>\$categorytype</td>
                    <td>\$spacer\$cname</td>
                    <td><font color='red'>\$status</font></td>
                    <td><a data-id='\$id' class='option edit-category'>编辑</a>|<a class='option del-category' data-id='\$id'>删除</a></td>
                </tr>";
        $tree->init($array);
        $categorys = $tree->get_tree(0, $str);
        $this->assign('ul',$categorys);
		$this->display();
	}

    public function addCategory(){
        $arr = I();
        if(IS_POST){
            $category = M('category','sys_');
            $data = $category->where(array('name'=>$arr['name'],'parentid'=>$arr['parentid']))->find();
            if($data){
                $this->resultMsg('error','同级分类名称不能相同');
            }
            $status = $category->add($arr);
            if($status){
                $this->resultMsg('success','分类添加成功');
            }else{
                $this->resultMsg('error','分类添加失败');
            }
        }
    }

    /**
     * ajax获取分类信息
     */
    public function editCategory(){
        $arr = I();
        if(IS_POST){
            $category = M('category','sys_');
            $data = $category->find($arr['id']);
            $array['data'] = $data;
            $this->resultMsg('success','获取分类成功',$array);
        }
    }

    public function editCategoryMethod(){
        $arr = I();
        if(IS_POST){
            $category = M('category','sys_');
            $category->save($arr);
            $this->resultMsg('success','修改分类成功');
        }
    }

    public function delCategory(){
        $arr = I();
        if(IS_POST){
            $category = M('category','sys_');
            $data = $category->where(array('parentid'=>$arr['id']))->find();
            if($data){
            	$this->resultMsg('error','当前分类下有子类，不能删除');
            }
            $category->delete($arr['id']);
            $this->resultMsg('success','删除分类成功');
        }
    }

    /**
     * ajax获取分类列表
     */
    public function getCategory(){
        if(IS_GET){
            $category = M('category','sys_');
            $cateArr = $category->field('name,parentid,id')->select();
            $tree=new \Org\Util\tree;
            $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $tree->init($cateArr);
            $str = "<option value=\$id >\$spacer\$name</option>";
            $categoryTree = $tree->get_tree(0,$str,1);
            $this->resultMsg('success','获取分类成功',$categoryTree);
        }
    }

    /**
     * 前台菜单列表
     */
    public function menuManage(){
        $rule = M('menu','sys_');
        $rules = $rule->field('name,id,pid,isshow,url,sort')->order('sort')->select();
        foreach ($rules as $key => $value) {
            $rules[$key]['order']= $value['sort'];
            $rules[$key]['parentid']= $value['pid'];
            $rules[$key]['isshow'] = $value['isshow']?'√':'×';
            $rules[$key]['status'] = $value['isshow']?'隐藏':'显示';
        }
        $tree=new \Org\Util\tree;
        $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $tdStr = "<tr>
                    <td width='60px'><input type='text' class='form-control' name='order[\$id]' value='\$order'></td>
                    <td>\$id</td>
                    <td>\$spacer\$name</td>
                    <td>\$url</td>
                    <td><font color='red'>\$isshow</font></td>
                    <td><a class='option edit-menu' href='".U('Admin/Content/editMenu')."/id/\$id'>编辑</a>|<a class='option isshow-menu' data-val='\$id'>\$status</a>|<a class='option del-menu' data-val='\$id'>删除</a></td>
                </tr>";
        $tree->init($rules);
        $tr = $tree->get_tree(0, $tdStr);
        $this->assign('tr',$tr);
        $this->display();
    }

    /**
     * 添加菜单
     */
    public function addMenu(){
        if(IS_POST){
            $arr = I();
            $menu = M('menu','sys_');
            $arr['sort'] = 50;
            if($menu->where(array('name'=>$arr['name']))->find()){
                $this->resultMsg('error','菜单名称不能相同');
            }
            $menu->add($arr);
            $this->resultMsg('success','菜单添加成功');
        }else{
            $menu = M('menu','sys_');
            $menuArr = $menu->field('name,pid,id')->select();
            foreach ($menuArr as $key => $value) {
                $menuArr[$key]['parentid'] = $value['pid'];
            }
            $tree=new \Org\Util\tree;
            $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $tree->init($menuArr);
            $str = "<option value=\$id >\$spacer\$name</option>";
            $menuTree = $tree->get_tree(0,$str,1);
            $this->assign('menuTree',$menuTree);
            $this->display();
        }
    }

    /**
     * 编辑菜单
     */
    public function editMenu(){
        $arr = I();
        $id = $arr['id'];
        $menu = M('menu','sys_');
        if(IS_POST){
            $data = $menu->save($arr);
            $this->resultMsg('success','编辑菜单成功');
        }else{
            $data = $menu->where(array('id'=>$id))->find();
            $this->assign('menuData',$data);
            $this->display();
        }
    }

    /**
     * 删除菜单
     */
    public function delMenu(){
        $arr = I();
        $id = $arr['id'];
        $menu = M('menu','sys_');
        $data = $menu->where(array('pid'=>$id))->find();
        if($data){
            $this->resultMsg('error','当前菜单下有子菜单，不能删除');
        }
        $menu->where(array('id'=>$id))->delete();
        $this->resultMsg('success','删除菜单成功');
    }

    /**
     * 是否显示菜单
     */
    public function isShowMenu(){
        $arr = I();
        $id = $arr['id'];
        $menu = M('menu','sys_');
        $menuData = $menu->where(array('id'=>$id))->find();
        if($menuData['isshow']){
            $menu->where(array('id'=>$id))->save(array('isshow'=>0));
            $this->resultMsg('success','菜单隐藏');
        }else{
            $menu->where(array('id'=>$id))->save(array('isshow'=>1));
            $this->resultMsg('success','菜单显示');
        }
    }

    /**
     * 菜单排序
     */
    public function order(){
        $arr = I();
        $orders = $arr['order'];
        $rule = M('menu','sys_');
        foreach ($orders as $key => $value) {
            $rule->where(array('id'=>$key))->save(array('sort'=>$value));
        }
        $this->resultMsg('success','排序成功');
    }



}