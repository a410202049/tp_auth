<?php
namespace Query\Controller;
use Think\Controller;

class QueryManageController extends Controller {

	/**
	 * 采集关联后台首页
	 */
    public function index()
    {	 
    	$this->display();
    }

    public function carbrandManage(){
        $carbrand= M('carbrand');
        $carseries = M('carseries');
        $carspec = M('carspec');
        $count      = $carbrand->count();// 查询满足要求的总记录数
        $Page       = new \Common\Tools\Page($count,15);
        $Page->setConfig('prev', '<span aria-hidden="true">«</span>');
        $Page->setConfig('next', '<span aria-hidden="true">»</span>');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('theme', '<li>%FIRST%</li><li>%UP_PAGE%</li>%LINK_PAGE%<li>%DOWN_PAGE%</li><li>%END%</li>');
        $show = $Page->show();// 分页显示输出
        $list = $carbrand->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $value) {
            $bid = $value['brandid'];
            $fData = $carseries->field('factoryName')->where(array('FatherId'=>$bid))->group('FactoryName')->select();
            foreach ($fData as $fk => $fv) {
                $cData = $carseries->where(array('FatherId'=>$bid,'FactoryName'=>$fv['factoryname']))->select();
                foreach ($cData as $k => $v) {
                    $sData = $carspec->where(array('FatherId'=>$v['seriesid']))->select();
                    $cData[$k]['spec'] = $sData;
                }

                $fData[$fk]['seriesChild'] = $cData;//车系列表
            }
            $list[$key]['factoryName'] = $fData;
        }
        // print_r($list);exit();
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function addCarbrand(){
        $this->display();
    }

    public function editCarbrand(){
        $id = I('get.id');
        $carbrand = M('carbrand');
        $data = $carbrand->where(array('BrandId'=>$id))->find();
        $this->assign('data',$data);
        $this->display();
    }

    public function addCarbrandMethod(){
        $postData = I();
        $carbrand = M('carbrand');
        $data = $carbrand->where(array('Name'=>$postData['Name']))->find();
        if($data){
            $this->resultMsg('error',$postData['Name']."这个品牌已经存在");
        }else{
            $carbrand->data($postData)->add();
            $this->resultMsg('success',"保存成功");
        }
    }

    public function editCarbrandMethod(){
        $postData = I();
        $carbrand = M('carbrand');
        $where['Name'] = $postData['Name'];
        $where['BrandId'] = array('neq',$postData['BrandId']);

        $data = $carbrand->where($where)->find();
        if($data){
            $this->resultMsg('error',$postData['Name']."这个品牌已经存在");
        }else{
            $carbrand->save($postData);
            $this->resultMsg('success',"保存成功");
        }
    }

    public function specList(){
        $this->display();
    }

    public function delCarbrand($id = ""){
        $carbrand = M('carbrand');
        $carseries = M('carseries');
        $data = $carseries->where(array('FatherId'=>$id))->select();
        if($data){
            $this->resultMsg('error',"当前品牌下有车系数据，不能删除");
        }else{
            $carbrand->where(array('BrandId'=>$id))->delete();
            $this->resultMsg('success',"品牌删除成功");
        }
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