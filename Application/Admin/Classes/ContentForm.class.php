<?php
namespace Admin\Classes;
class ContentForm {
	public $modelid;
	public $fields;
	public $id;
	public $formValidator;
	public $script;


	public function __construct($modelid) {
		$this->modelid = $modelid;
		$this->fields = $this->get_fields($modelid);
	}

	/**
	 * 获取模型字段
	 */
	public function get_fields($modelid) {
		$field_array = array();
		$fields = M('model_field','sys_')->where(array('modelid'=>$this->modelid))->select();
		// print_r($fields);
		// exit();
		foreach ($fields as $key => $value) {
			 $setting = unserialize($value['setting']);
			 if(isset($setting)){
			 	$value = array_merge($value,$setting);
			 }
			 $field_array[$value['field']] = $value;
		}
		return $field_array;
	}

	public function get($data = array()){
		$this->data = $data;
		if(isset($data['id'])) $this->id = $data['id'];
		$info = array();

		foreach($this->fields as $field=>$v) {
			$func = $v['fieldtype'];
			$value = isset($data[$field]) ? htmlspecialchars($data[$field], ENT_QUOTES) : '';
			if(!method_exists($this, $func)) continue;
			$form = $this->$func($field,$value,$v);//调用函数
			$info[$field] = $form;
		}
		return $info;
	}

	public function text($field,$value,$v){
		extract($v);
		if(!$value) $value = $defaultvalue;
		$str = '<div class="form-group"><label class="col-sm-2 control-label">'.$fieldname.'：</label><div class="col-sm-2">';
		$str.= '<input type="text" name="'.$field.'" class="form-control" value="'.$value.'">';
		if($fieldtip){
			$str.='<span class="help-block m-b-none">'.$fieldtip.'</span>';
		}
		$str.= '</div></div><div class="hr-line-dashed"></div>';
		return $str;
	}

	public function textarea($field,$value,$v){
		extract($v);
		if(!$value) $value = $defaultvalue;
		$str = '<div class="form-group"><label class="col-sm-2 control-label">'.$fieldname.'</label>';
        $str.= '<div class="col-sm-2"><textarea class="form-control" name="'.$field.'" id="'.$field.'" style="width:'.$width.'px;height:'.$height.'px;">'.$value.'</textarea></div></div>';
        $str.='<div class="hr-line-dashed"></div>';
        return $str;
	}

	public function editor($field,$value,$v){
		extract($v);
		$this->script .='var '.$field.' = UM.getEditor("'.$field.'");';
        $str = '<div class="form-group"><label class="col-sm-2 control-label">'.$fieldname.'：</label>';
        $str.='<div class="col-sm-2"><script type="text/plain" id="'.$field.'" name="'.$field.'" style="width:'.$width.'px;height:'.$height.'px;"></script>';
		if($fieldtip){
			$str.='<span class="help-block m-b-none">'.$fieldtip.'</span>';
		}
        $str .='</div></div><div class="hr-line-dashed"></div>';
		return $str;
	}

	public function box($field,$value,$fieldinfo){
		if($value=='') $value = $fieldinfo['defaultvalue'];
		$options = explode("\n",$fieldinfo['options']);
		foreach($options as $_k) {
			$v = explode("|",$_k);
			$k = trim($v[1]);
			$option[$k] = $v[0];
		}
		$values = explode(',',$value);
		$value = array();
		foreach($values as $_k) {
			if($_k != '') $value[] = $_k;
		}
		$value = implode(',',$value);
		switch($fieldinfo['boxtype']) {
			case 'radio':
			$string = '<div class="form-group"><label class="col-sm-2 control-label">'.$fieldinfo['fieldname'].'：</label><div class="col-sm-3"><div class="radio i-checks">';
			$string.= \Org\Util\Form::radio($option,$value,"name='$field'",$field);
			$string.= '</div>';
			if($fieldinfo['fieldtip']){
				$string.='<span class="help-block m-b-none">'.$fieldinfo['fieldtip'].'</span>';
			}
			$string.='</div></div><div class="hr-line-dashed"></div>';
			break;

			case 'checkbox':
			$string = '<div class="form-group"><label class="col-sm-2 control-label">'.$fieldinfo['fieldname'].'：</label><div class="col-sm-3"><div class="checkbox i-checks">';
			$string.= \Org\Util\Form::checkbox($option,$value,"name='$field]'",1,$field);
			$string.= '</div>';
			if($fieldinfo['fieldtip']){
				$string.='<span class="help-block m-b-none">'.$fieldinfo['fieldtip'].'</span>';
			}
			$string.='</div></div><div class="hr-line-dashed"></div>';
			break;


			case 'select':
			$string = '<div class="form-group"><label class="col-sm-2 control-label">'.$fieldinfo['fieldname'].':</label><div class="col-sm-1">';
			$string .= \Org\Util\Form::select($option,$value,"name='info[$field]' id='$field' class='form-control m-b'");
			if($fieldinfo['fieldtip']){
				$string.='<span class="help-block m-b-none">'.$fieldinfo['fieldtip'].'</span>';
			}
			$string .= '</div></div><div class="hr-line-dashed"></div>';
			break;

		}

		return $string;

	}

	public function image($field,$value,$v){
		extract($v);
		$this->script.='$(\'#file_'.$field.'\').uploadify({\'swf\': \''.__ROOT__.'/public/admin/js/plugins/uploadify/uploadify.swf\',';
		$this->script.= '\'uploader\' : \''.U('Admin/Index/upload').'\',';
		$this->script.= '\'buttonText\':\'上传图片\',';
		$this->script.= '\'onUploadSuccess\' : function(file, data, response) {';
		$this->script.= 'data = jQuery.parseJSON(data);$(\'#img_'.$field.'\').attr(\'src\',\''.__ROOT__.'/Uploads/\'+data.data);';
		$this->script.='$(\'input[name='.$field.']\').val(data.data);}});';

		$str = '<div class="form-group"><label class="col-sm-2 control-label">'.$fieldname.'</label>';
		$str .= '<div class="col-sm-4"><div class="row"><div class="col-sm-4"><img src="'.__ROOT__.'/public/admin/img/add_img.png" width="150" height="150" id="img_'.$field.'"></div>';
		$str.='<input type="hidden" name="'.$field.'">';
		$str.='<div class="col-sm-6 up-padding" ><input id="file_'.$field.'" name="file_upload" type="file" multiple="true"></div></div>';
		if($fieldtip){
			$str.='<span class="help-block m-b-none">'.$fieldtip.'</span>';
		}
		$str.= '</div></div><div class="hr-line-dashed"></div>';

		return $str;

	}

	public function images($field,$value,$v){
		return '6';
	}

	public function datetime($field,$value,$v){
		return '7';
	}


}?>