<?php
namespace Home\Controller;

class IndexController extends BaseController {
    public function index(){
    	$article = M('article','sys_');
    	$count = $article->where(array('isshow'=>'1'))->count();// 查询满足要求的总记录数
        $Page       = new \Common\Tools\Page($count,1);
        $Page->route = 'page';
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%');
        $show = $Page->show();// 分页显示输出
        $articles = $article->where(array('isshow'=>'1'))->limit($Page->firstRow.','.$Page->listRows)->order('createtime desc')->select();
    	foreach ($articles as $key => $value) {
    		$user = getUser($value['uid']);
    		$articles[$key]['content'] = formatStr($value['content']);
    		$articles[$key]['updatetime'] = formatTime($value['updatetime']);
    		$articles[$key]['username'] = $user['username'];
    		$articles[$key]['avatar'] = $user['avatar'];

    	}
    	$sides = $article->where(array('isslide'=>'1'))->order('createtime desc')->limit(5)->select();//幻灯片
    	$hotsPic = $article->where(array('isslide'=>'1'))->order('createtime desc')->limit(0,3)->select();//热门图片列表
    	$hotsText = $article->where(array('isslide'=>'1'))->order('createtime desc')->limit(4,9)->select();//热门文字列表
    	$isspecial = $article->where(array('isspecial'=>'1'))->order('createtime desc')->limit(3)->select();//特别推荐
    	foreach ($isspecial as $k => $v) {
    		$user = getUser($v['uid']);
    		$isspecial[$k]['username'] = $user['username'];
    		$isspecial[$k]['avatar'] = $user['avatar'];
    	}

        $this->assign('page',$show);
    	$this->assign('isspecial',$isspecial);
    	$this->assign('hotsPic',$hotsPic);
    	$this->assign('hotsText',$hotsText);
    	$this->assign('sides',$sides);
    	$this->assign('articles',$articles);
    	$this->display();
    }

    /**
     * 文章详情页
     */
    public function articleDetail(){
        $arr = I();
        $id = $arr['id'];
        $article = M('article','sys_');
        $data = $article->find($id);
        $user = getUser($data['uid']);
        $data['username'] = $user['username'];
        $data['content'] = formatStr($data['content']);
        $data['updatetime'] = formatTime($data['updatetime']);
        $data['source'] = $data['source'] ? $data['source'] : 'rving房车网';
        $keywords = explode(',',str_replace("，",",",$data['keywords']));
        $data['keywords'] = $keywords;
        $isspecial = $article->where(array('isspecial'=>'1'))->order('createtime desc')->limit(3)->select();//特别推荐
        $youLike = $article->order('rand()')->limit(5)->select();//热门图片列表

        foreach ($isspecial as $k => $v) {
            $user = getUser($v['uid']);
            $isspecial[$k]['username'] = $user['username'];
            $isspecial[$k]['avatar'] = $user['avatar'];
        }
        $this->assign('isspecial',$isspecial);
        $this->assign('youLike',$youLike);
        $this->assign('data',$data);
        $this->display();
    }


    public function articleList(){
        $arr = I();
        $cid = $arr['cid'];
    	$article = M('article','sys_');
        $category = M('category','sys_');
        $cate = $category->where(array('id'=>$cid))->find();
        $category_en = $cate['category_en'];
    	$count = $article->where(array('isshow'=>'1','categoryid'=>$cid))->count();// 查询满足要求的总记录数
        $Page       = new \Common\Tools\Page($count,15);
        $Page->route = $category_en."/page";
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%');
        $show = $Page->show();// 分页显示输出
        $articles = $article->where(array('isshow'=>'1','categoryid'=>$cid))->limit($Page->firstRow.','.$Page->listRows)->order('createtime desc')->select();
    	foreach ($articles as $key => $value) {
    		$user = getUser($value['uid']);
    		$articles[$key]['content'] = formatStr($value['content']);
    		$articles[$key]['updatetime'] = formatTime($value['updatetime']);
    		$articles[$key]['username'] = $user['username'];
    		$articles[$key]['avatar'] = $user['avatar'];

    	}
    	$sides = $article->where(array('isslide'=>'1'))->order('createtime desc')->limit(5)->select();//幻灯片
    	$hotsPic = $article->where(array('isslide'=>'1'))->order('createtime desc')->limit(0,3)->select();//热门图片列表
    	$hotsText = $article->where(array('isslide'=>'1'))->order('createtime desc')->limit(4,9)->select();//热门文字列表
    	$isspecial = $article->where(array('isspecial'=>'1'))->order('createtime desc')->limit(3)->select();//特别推荐
    	foreach ($isspecial as $k => $v) {
    		$user = getUser($v['uid']);
    		$isspecial[$k]['username'] = $user['username'];
    		$isspecial[$k]['avatar'] = $user['avatar'];
    	}

        $this->assign('cid',$cid);
        $this->assign('page',$show);
    	$this->assign('isspecial',$isspecial);
    	$this->assign('hotsPic',$hotsPic);
    	$this->assign('hotsText',$hotsText);
    	$this->assign('sides',$sides);
    	$this->assign('articles',$articles);
    	$this->display();
    }
}