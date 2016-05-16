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
     * 附加属性列表
     */

    public function attachedProperties(){
        $attr = M('attr','sys_');
        $category = M('category','sys_');
        
        $arrs = $attr->select();
        foreach ($arrs as $key => $value) {
            $data = $category->where(array('id'=>$value['categoryid']))->find();
            $arrs[$key]['categoryName'] = $data['name'];
        }

        $this->assign('arrs',$arrs);
        $this->display();
    }

    public function addAttr(){
        if(IS_POST){
            $attr = M('attr','sys_');
            $option = M('attr_option','sys_');
            $arr = I();
            switch ($arr['type']) {
                case 'checkbox':
                case 'radio':
                case 'linkage':
                    $values = explode(',',str_replace("，",",",$arr['value']));
                    break;
                default:
                    $values = $arr['value'];

            }
            $data = array(
                'categoryid' => $arr['categoryid'],
                'name' => $arr['name'],
                'type' =>$arr['type'],
                'order' => 50
            );
            if($attr->where(array('categoryid'=>$arr['categoryid'],'name'=>$arr['name']))->find()){
               $this->resultMsg('error','同级分类属性名称不能相同'); 
            }
            $attid = $attr->data($data)->add();
            if(is_array($values)){
                foreach ($values as $key => $value) {
                    $op = array(
                        'attid' => $attid,
                        'value' => $value
                    );
                    $option->data($op)->add();
                }
            }
            $this->resultMsg('success','属性添加成功');
        }else{
            $category = M('category','sys_');
            $linkage = M('linkage','sys_');
            $where['parentid'] = array('eq','0');
            $linkages = $linkage->where($where)->select();
            $cateArr = $category->field('name,parentid,id')->select();
            $tree=new \Org\Util\tree;
            $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $tree->init($cateArr);
            $str = "<option value=\$id >\$spacer\$name</option>";
            $categoryTree = $tree->get_tree(0,$str,1);
            $this->assign('option',$categoryTree);
            $this->assign('linkages',$linkages);
            $this->display();
        }
    }

    public function editAttr(){
        if(IS_POST){
            $attr = M('attr','sys_');
            $option = M('attr_option','sys_');
            $arr = I();
            switch ($arr['type']) {
                case 'checkbox':
                case 'radio':
                case 'linkage':
                    $values = explode(',',str_replace("，",",",$arr['value']));
                    break;
                default:
                    $values = $arr['value'];

            }
            $data = array(
                'categoryid' => $arr['categoryid'],
                'name' => $arr['name'],
                'type' =>$arr['type'],
                'order' => 50
            );
            $where = array('categoryid'=>$arr['categoryid'],'name'=>$arr['name']);
            $where['id'] = array('neq',$arr['id']);

            if($attr->where($where)->find()){
               $this->resultMsg('error','同级分类属性名称不能相同'); 
            }
            $option->where(array('attid'=>$arr['id']))->delete();
            $attr->where(array('id'=>$arr['id']))->save($data);
            if(is_array($values)){
                foreach ($values as $key => $value) {
                    $op = array(
                        'attid' => $arr['id'],
                        'value' => $value
                    );
                    $option->data($op)->add();
                }
            }
            $this->resultMsg('success','属性编辑成功');
        }else{
            $arr = I();
            $linkage = M('linkage','sys_');
            $where['parentid'] = array('eq','0');
            $linkages = $linkage->where($where)->select();
            $category = M('category','sys_');
            $attr = M('attr','sys_');
            $attr_option = M('attr_option','sys_');
            $data = $attr->find($arr['id']);
            $opstr = "";
            if($data['type'] =='checkbox' || $data['type'] =='radio' || $data['type'] =='linkage'){
                $options = $attr_option->where(array('attid'=>$data['id']))->select();
                $options = array_column($options,'value');
                $opstr = implode(',',$options);
            }
            $categoryid = $data['categoryid'];
            $cateArr = $category->field('name,parentid,id')->select();
            $cateIds = array_column($cateArr,'id');
            $index = array_search($categoryid,$cateIds);
            $tree=new \Org\Util\tree;
            $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $tree->init($cateArr);
            $str = "<option value=\$id \$selected>\$spacer\$name</option>";
            $categoryTree = $tree->get_tree(0,$str,$index);
            $this->assign('option',$categoryTree);
            $this->assign('data',$data);
            $this->assign('opstr',$opstr);
            $this->assign('linkages',$linkages);
            $this->display();
        }
    }

    function delAttr(){
        $arr = I();
        $id = $arr['id'];
        $attr = M('attr','sys_');
        $option = M('attr_option','sys_');
        $attr->where(array('id'=>$arr['id']))->delete();
        $option->where(array('attid'=>$arr['id']))->delete();
        $this->resultMsg('success','删除属性成功');
    }

    /**
     * 联动菜单列表
     */
    function linkage(){
        $linkage = M('linkage','sys_');
        $linkages = $linkage->field('name,id,parentid')->select();
        $tree=new \Org\Util\tree;
        $tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $tdStr = "<tr>
                    <td>\$id</td>
                    <td>\$spacer\$name</td>
                    <td><a class='option' href='".U('Admin/Content/addLinkage')."/id/\$id'>添加子菜单</a>|<a class='option edit-menu' href='".U('Admin/Content/editLinkage')."/id/\$id'>编辑</a>|<a class='option del-linkage' data-val='\$id'>删除</a></td>
                </tr>";
        $tree->init($linkages);
        $tr = $tree->get_tree(0, $tdStr);
        $this->assign('tr',$tr);
        $this->display();
    }

    /**
     * 添加联动
     */
    function addLinkage(){
        $arr = I();
        $linkage = M('linkage','sys_');
        $id = isset($arr['id']) ? $arr['id'] : 0;
        if(IS_POST){
            $data = array('name'=>$arr['name'],'parentid'=>$id);
            if($linkage->where($data)->find()){
                $this->resultMsg('error','联动菜单名称已经存在');    
            }
            $linkage->add($data);
            $this->resultMsg('success','添加成功');  
        }else{
            $this->assign('id',$id);
            $this->display();
        }
    }

     /**
     * 编辑联动
     */
    function editLinkage(){
        $arr = I();
        $linkage = M('linkage','sys_');
        $id = $arr['id'];
        if(IS_POST){
            $re = $linkage->find($id);
            $data = array('name'=>$arr['name'],'parentid'=>$re['parentid']);
            $data['id'] = array('neq',$id);
            if($linkage->where($data)->find()){
                $this->resultMsg('error','联动菜单名称已经存在');    
            }
            $linkage->where(array('id'=>$id))->save(array('name'=>$arr['name']));
            $this->resultMsg('success','编辑成功');  
        }else{
            $data = $linkage->find($id);
            $this->assign('data',$data);
            $this->assign('id',$id);
            $this->display();
        }
    }

    function delLinkage(){
        $arr = I();
        $id = $arr['id'];
        $linkage = M('linkage','sys_');
        $linkage->where(array('id'=>$id))->delete();
        $linkage->where(array('parentid'=>$id))->delete();
        $this->resultMsg('success','删除成功'); 
    }   

}