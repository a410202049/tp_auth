<?php
namespace Query\Controller;
use Think\Controller;
use QL\QueryList;

class IndexController extends Controller {

	/**
	 * 采集汽车基本信息
	 */
    public function index()
    {	 
        // echo Pinyin($this->_format_pinyin('电池容量(kWh)'));
        // exit();
        set_time_limit(0);//设置不超时
        echo "更新开始..."."<br>";
        $data = QueryList::Query('http://i.che168.com/Handler/SaleCar/ScriptCarList_V1.ashx?needData=1');
        $str=iconv("GBK", "UTF-8", $data->html);
        preg_match('/=\'([^\']+)\'/', $str, $matches);
        $arr = explode(',',$matches[1]);
        $cars = array_chunk($arr,2);
        foreach ($cars as $k => $v) {
        	$a = explode(' ',$v[1]);
        	$cars[$k][1] = $a[0];
        	$cars[$k][2] = $a[1];
        }

        //第一步获取品牌信息
        $carbrand = M('carbrand');//品牌表
        $BrandIdArr = $carbrand->field('BrandId')->select();
        $ids = array_column($BrandIdArr, 'brandid');//二维数组转一维数组
        foreach ($cars as $key => $value) {
            $dataArr = array(
                'BrandId'=>$value[0],
                'Name'=>$value[2],
                'FirstLetter'=>$value[1]
            );
            if(!in_array($value[0], $ids)){//如果不存在就添加
                $status = $carbrand->add($dataArr);
            }
        }
        echo "品牌更新结束";
        $this->redirect('index/getSeries');
    }

    /**
     * 获取车系
     */
    public function getSeries($id = ""){
        $carbrand = M('carbrand');//品牌表
        $carseries = M('carseries');//车系表
        $BrandIdArr = $carbrand->field('BrandId')->order('BrandId asc')->find();
        $bid = $BrandIdArr['brandid'];
        $id = !empty($id) ? $id : $bid;
        $car = $this->_getCars($id);
        foreach ($car as $car_k => $car_v) {
            foreach ($car_v['list'] as $list_k => $list_v) {
                $car_data = array(
                    'SeriesId' =>$list_v[0],
                    'Name'=>$list_v[2],
                    'FatherId'=>$id,
                    'FactoryName'=>$car_v['name']
                );
                if(!$carseries->where(array('FatherId'=>$id,'SeriesId'=>$list_v[0]))->find()){
                    //如果不存在就添加
                    $carseries_status = $carseries->add($car_data);//添加车系
                }
            }
        }

        $data = $carbrand->where('BrandId > '.$id)->order('BrandId asc')->limit(1)->find();
        if($data){
            echo "正在采集品牌ID为".$data['brandid']."的车系";
            echo "<script>location.href='".U('query/index/getSeries',array('id'=>$data['brandid']))."'</script>";
        }else{
            //如果车系采集完成，就采集车型
            $this->redirect('index/getSpec');
        }

    }

    /**
     * 通过车系获取车型
     */
    public function getSpec($id = ""){
        $carseries = M('carseries');//车系表
        $carspec = M('carspec');//车型表
        // $jibencanshu = M('jibencanshu');
        // $SpecIdArr = $jibencanshu->field('specId')->order('id desc')->find();
        // $sid = $SpecIdArr['specid'];
        $SeriesIdArr = $carseries->field('SeriesId')->order('SeriesId asc')->find();
        $sid = $SeriesIdArr['seriesid'];
        
        $id = !empty($id) ? $id : $sid;
        $carModel = $this->_getCarModel($id);
        foreach ($carModel as $carModel_k => $carModel_v) {
            foreach ($carModel_v->spec as $spec_k => $spec_v) {
                $carModel_data = array(
                    'SpecId' => $spec_v->id,
                    'Name' => $spec_v->name,
                    'Year' => str_replace("款","",$carModel_v->year),//汉字替换为空
                    'FatherId' => $id
                );
                if(!$carspec->where(array('FatherId'=>$id,'SpecId'=>$spec_v->id))->find()){
                    //如果不存在就添加
                    $carspec_status = $carspec->add($carModel_data);//添加车型
                }

            }
        }
        $data = $carseries->where('SeriesId > '.$id)->order('SeriesId asc')->limit(1)->find();
        if($data){
            echo "正在采集车系ID为".$data['seriesid']."的车型";
            echo "<script>location.href='".U('query/index/getSpec',array('id'=>$data['seriesid']))."'</script>";
        }else{
            //如果车型采集完成，就采集参数
            $this->redirect('index/getCarParameter');
        }
    }

    /**
     * 获取车系
     */
    private function _getCars($carId){
    	$data = QueryList::Query('http://i.che168.com/Handler/SaleCar/ScriptCarList_V1.ashx?seriesGroupType=2&needData=2&bid='.$carId);
    	$str=iconv("GBK", "UTF-8", $data->html);
    	preg_match('/=\'([^\']+)\'/', $str, $matches);
    	$arr = explode(',',$matches[1]);
    	$cars = array_chunk($arr,2);
    	foreach ($cars as $k => $v) {
        	$a = explode(' ',$v[1],2);
        	$cars[$k][1] = $a[0];
        	$cars[$k][2] = $a[1];
        }
  		$new_arr = array();
  		$name ="";
  		$n = 0;
  		$s = 0;
        foreach ($cars as $j => $i) {
        	if($i[1]!=$name){
        		$name = $i[1];
        		$new_arr[$s]['name'] = $name;
        		$s++;
        		$n = 0;
        	}
        	unset($i[1]);
    		$new_arr[$s-1]['list'][$n] = $i;
        	$n++;
        }
        return $new_arr;
    }

    /**
     * 获取车型
     */
    private function _getCarModel($mid){
    	$data = QueryList::Query('http://i.che168.com/Handler/SaleCar/ScriptCarList_V1.ashx?seriesGroupType=2&needData=3&seriesid='.$mid);
    	$str=iconv("GBK", "UTF-8", $data->html);
    	$str = str_replace("spec","\"spec\"",$str);
    	$arr = json_decode($str);
    	return $arr;
    }

    /**
     * 获取车型参数
     */
    public function getCarParameter($id =""){
        $carspec = M('carspec');
        $jibencanshu = M('jibencanshu');
        $SpecIdArr = $jibencanshu->field('specId')->order('id desc')->find();
        $sid = $SpecIdArr['specid'];
        $id = !empty($id) ? $id : $sid;
        $this->_getBaseParameter($id);
        $this->_getSeniorParameter($id);
        $data = $carspec->where('SpecId > '.$id)->order('SpecId asc')->limit(1)->find();
        if($data){
            echo "正在采集车型ID为".$data['specid']."的详细参数";
            echo "<script>location.href='".U('query/index/getCarParameter',array('id'=>$data['specid']))."'</script>";
        }else{
            //如果参数采集完成，就采集报价
            $this->redirect('index/getCarCityPrice');
        }
    }

    /**
     * 获取车型汽车报价
     */
    public function getCarCityPrice($id =""){
        $carspec = M('carspec');
        $cityprice = M('cityprice');
        $SpecIdArr = $cityprice->field('specId')->order('id desc')->find();
        $sid = $SpecIdArr['specid'];
        $id = !empty($id) ? $id : $sid;
        $this->_getCityPrice($id);
        $data = $carspec->where('SpecId > '.$id)->order('SpecId asc')->limit(1)->find();
        if($data){
            echo "正在采集车型ID为".$data['specid']."的城市报价";
            echo "<script>location.href='".U('query/index/getCarCityPrice',array('id'=>$data['specid']))."'</script>";
        }else{
            //如果参数采集完成，就采集报价
            echo "所有数据采集完成";
        }  
    }

    /**
     * 获取基本车型参数
     */
    private function _getBaseParameter($mid){
        $data = QueryList::Query('http://www.interface.che168.com/CarProduct/GetParam.ashx?specid='.$mid.'&_callback=param');
        $str=iconv("GBK", "UTF-8", $data->html);
        $str = substr($str,6,-1);
        $json = json_decode($str);
        $parArr = $json->result->paramtypeitems;
        $Model = M();
        foreach ($parArr as $key => $value) {
            $childStr = "";
            $sql = "";
            $columName ="";
            $tempArr = array();
            $tableName = Pinyin($this->_format_pinyin($value->name));
            foreach ($value->paramitems as $k => $v) {
               // $childStr.="\"".$v->value."\",";
               // $columName.="`".Pinyin($this->_format_pinyin($v->name))."`,";
                $tempArr[Pinyin($this->_format_pinyin($v->name))] = $v->value;
            }
            foreach ($tempArr as $temp_key => $temp_value) {
               $childStr.="\"".$temp_value."\",";
               $columName.="`".$temp_key."`,";
            }

            $columName = $columName."`specId`";
            $childStr =  substr($childStr, 0, -1);
            $sql = "insert into ".$tableName." (".$columName.") values(".$childStr.",\"".$mid."\"".");";
            $status = $Model->query("select count(*) as count from ".$tableName." where specId=".$mid);
            $count = $status[0]['count'];
            if(!$count){
                //如果不存在就插入数据
                $Model->execute($sql);
            }
        }
    }

    /**
     * 获取高级车型参数
     */
    private function _getSeniorParameter($mid){
        $data = QueryList::Query('http://www.interface.che168.com/CarProduct/GetConfig.ashx?specid='.$mid.'&_callback=config');
        $str=iconv("GBK", "UTF-8", $data->html);
        $str = substr($str,7,-1);
        $json = json_decode($str);
        $parArr = $json->result->configtypeitems;
        $Model = M();
        foreach ($parArr as $key => $value) {
            $childStr = "";
            $sql = "";
            $columName ="";
            $tempArr = array();
            $tableName = Pinyin($this->_format_pinyin($value->name));
            foreach ($value->configitems as $k => $v) {
               // $childStr.="\"".$v->value."\",";
               // $columName.="`".Pinyin($this->_format_pinyin($v->name))."`,";
                $tempArr[Pinyin($this->_format_pinyin($v->name))] = $v->value;
            }
            foreach ($tempArr as $temp_key => $temp_value) {
               $childStr.="\"".$temp_value."\",";
               $columName.="`".$temp_key."`,";
            }

            $columName = $columName."`specId`";
            $childStr =  substr($childStr, 0, -1);
            $sql = "insert into ".$tableName." (".$columName.") values(".$childStr.",\"".$mid."\"".");";

            $status = $Model->query("select count(*) as count from ".$tableName." where specId=".$mid);
            $count = $status[0]['count'];
            if(!$count){
                //如果不存在就插入数据
                $Model->execute($sql);
            }
        }
    }

    /**
     * 获取城市参考价
     */
    private function _getCityPrice($mid){
        $jsonCity = '[{"I": 0,"N": "全国"},{"I": 110100,"N": "北京"},{"I": 310100,"N": "上海"},{"I": 440100,"N": "广州"},{"I": 440300,"N": "深圳"},{"I": 510100,"N": "成都"},{"I": 410100,"N": "郑州"},{"I": 420100,"N": "武汉"},{"I": 530100,"N": "昆明"}]';
        $cityArr = json_decode($jsonCity);
        $isPrice = false;
        $cityprice = M('cityprice');
        foreach ($cityArr as $key => $value) {     
            $data = QueryList::Query('http://car.interface.autohome.com.cn/dealer/LoadDealerPrice.ashx?_callback=jQuery17204234428702897002_1459929090211&type=2&specid='.$mid.'&city='.$value->I.'&_=1459929120022');
            $str=iconv("GBK", "UTF-8", $data->html);
            $str = substr($str,41,-1);
            $json = json_decode($str);
            $reData = $json->body->item[0];
            if($reData){
                $isPrice = true;
                $dataArr = array(
                    'cityId'=>$value->I,
                    'cityName'=>$value->N,
                    'price' =>round($reData->Price/10000,2),
                    'minPrice'=>round($reData->MinPrice/10000,2),
                    'specId'=>$mid
                );
                $dataWhere = array('cityId'=>$value->I,'specId'=>$mid);
                $priceData = $cityprice->where($dataWhere)->find();
                if($priceData){
                //判断当前城市，当前车型下是否存在，存在更新数据，不存在添加数据
                    $cityprice->where($dataWhere)->save($dataArr);
                }else{
                    $cityprice->data($dataArr)->add();
                }
            }
        }
        if(!$isPrice){
            //判断在第一个接口没有采集到数据，调用第二个接口
           $data = QueryList::Query('http://car.interface.autohome.com.cn/che168/LoadUsedCarPrice.ashx?_callback=jQuery172049602974411246226_1459931094140&type=2&specid='.$mid.'&pid=0&_=1459931094225');
            $str=iconv("GBK", "UTF-8", $data->html);
            $str = substr($str,43,-4);
            $json = json_decode($str);
            $dataArr = array(
                'cityId'=>0,
                'cityName'=>'全国',
                'maxPrice' =>$json->maxPrice,
                'minPrice'=>$json->minPrice,
                'specId'=>$mid
            );
            $dataWhere = array('cityId'=>0,'specId'=>$mid);
            $priceData = $cityprice->where($dataWhere)->find();
            if($priceData){
            //判断当前城市，当前车型下是否存在，存在更新数据，不存在添加数据
                $cityprice->where($dataWhere)->save($dataArr);
            }else{
                $cityprice->data($dataArr)->add();
            }

        }
    } 

    /**
     * 格式化汉字，去除特殊符号
     */
    private function _format_pinyin($str){
        $str = str_replace("(","",$str);
        $str = str_replace(")","",$str);
        $str = str_replace("_","",$str);
        $str = str_replace("/","",$str);
        $str = str_replace("·","",$str);
        $str = str_replace("-","",$str);
        $str = str_replace("*","",$str);
        return $str;
    }  
}