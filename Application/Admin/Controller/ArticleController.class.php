<?php
namespace Admin\Controller;
use \Admin\Classes\AdminController;

class ArticleController extends AdminController {

    public function __construct() {
      parent::__construct();
    }

    public function index(){
    	$article = M('article','sys_');
    	$count      = $article->count();// 查询满足要求的总记录数
        $Page       = new \Common\Tools\Page($count,2);
        $Page->setConfig('prev', '<span aria-hidden="true">«</span>');
        $Page->setConfig('next', '<span aria-hidden="true">»</span>');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show = $Page->show();// 分页显示输出
        $list = $article->limit($Page->firstRow.','.$Page->listRows)->order('createtime desc')->select();
        $this->assign('articles',$list);
        $this->assign('page',$show);
    	$this->display();
    }

    /**
     * 添加文章
     */
    public function addArticle(){
    	$article = M('article','sys_');
    	$arr = I();

    	if(IS_POST){
            $arr['isslide'] = $arr['isslide'] ? '1' : '0';
            $arr['ishot'] = $arr['ishot'] ? '1' : '0';
            $arr['isspecial'] = $arr['isspecial'] ? '1' : '0';
            $arr['isstressed'] = $arr['isstressed'] ? '1' : '0';
    		$arr['createtime'] = time();
    		$arr['updatetime'] = time();
    		$arr['uid'] = $this->uid;
    		$status = $article->add($arr);
    		if($status){
    			$this->resultMsg('success','文章添加成功');
    		}
    	}else{
    		$category = M('category','sys_');
    		$data = $category->where(array('categorytype'=>'article'))->select();
    		$this->assign('categoryData',$data);
    		$this->display();
    	}
    }

    /**
     * 删除文章
     */
    public function delArticle(){
        $arr = I();
        $article = M('article','sys_');
        $article->where(array('id'=>$arr['id']))->delete();
        $this->resultMsg('success','文章删除成功');
    }

    /**
     * 编辑文章
     */
    public function editArticle(){
    	$article = M('article','sys_');
    	$arr = I();
    	$id = $arr['id'];
    	if(IS_POST){
            $arr['isslide'] = $arr['isslide'] ? '1' : '0';
            $arr['ishot'] = $arr['ishot'] ? '1' : '0';
            $arr['isspecial'] = $arr['isspecial'] ? '1' : '0';
            $arr['isstressed'] = $arr['isstressed'] ? '1' : '0';
    		$article->save($arr);
    		$this->resultMsg('success','文章编辑成功');
    	}else{
    		$category = M('category','sys_');
    		$articleData = $category->where(array('categorytype'=>'article'))->select();
    		$data = $article->find($id);
    		$data['content'] = formatStr($data['content']);
            $data['source'] = $data['source'] ? $data['source'] : 'rving房车网';
            
    		$this->assign('categoryData',$articleData);
    		$this->assign('data',$data);
    		$this->display();
    	}
    }

    /**
     * 是否置顶
     */
    public function istop(){
    	$arr = I();
    	$id = $arr['id'];
    	$article = M('article','sys_');
    	$articleData = $article->where(array('id'=>$id))->find();
    	if($articleData['istop']){
    		$articleData = $article->where(array('id'=>$id))->save(array('istop'=>0));
    		$this->resultMsg('success','文章取消置顶');
    	}else{
    		$articleData = $article->where(array('id'=>$id))->save(array('istop'=>1));
    		$this->resultMsg('success','文章置顶成功');
    	}

    }

    /**
     * 是否显示
     */
    public function isshow(){
    	$arr = I();
    	$id = $arr['id'];
    	$article = M('article','sys_');
    	$articleData = $article->where(array('id'=>$id))->find();
    	if($articleData['isshow']){
    		$articleData = $article->where(array('id'=>$id))->save(array('isshow'=>0));
    		$this->resultMsg('success','文章隐藏');
    	}else{
    		$articleData = $article->where(array('id'=>$id))->save(array('isshow'=>1));
    		$this->resultMsg('success','文章显示');
    	}
    }

}