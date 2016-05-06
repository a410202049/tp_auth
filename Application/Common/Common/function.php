<?php

function get_location($ip) {
	$Ip = new \Org\Net\IpLocation(); // 实例化类 参数表示IP地址库文件
	$iplocation = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
	$area = $iplocation['country'].$iplocation['area'];
	return $area;
}


/**
* 删除目录及目录下所有文件或删除指定文件
* @param str $path   待删除目录路径
* @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
* @return bool 返回删除状态
*/
function delDirAndFile($path, $delDir = FALSE) {
	$message = "";
	$handle = opendir($path);
	if ($handle) {
		while (false !== ( $item = readdir($handle) )) {
			if ($item != "." && $item != "..") {
				if (is_dir("$path/$item")) {
					$msg = delDirAndFile("$path/$item", $delDir);
					if ( $msg ){
						$message .= $msg;
					}
				} else {
					$message .= "删除文件" . $item;
					if (unlink("$path/$item")){
						$message .= "成功<br />";
					} else {
						$message .= "失败<br />";
					}
				}
			}
		}
		closedir($handle);
		if ($delDir){
			if ( rmdir($path) ){
				$message .= "删除目录" . dirname($path) . "<br />";
			} else {
				$message .= "删除目录" . dirname($path) . "失败<br />";
			}


		}
	} else {
		if (file_exists($path)) {
			if (unlink($path)){
				$message .= "删除文件" . basename($path) . "<br />";
			} else {
				$message .= "删除文件" + basename($path) . "失败<br />";
			}
		} else {
			$message .= "文件" + basename($path) . "不存在<br />";
		}
	}
	return $message;
}


/**
* 将字符串转换为数组
*
* @param  string  $data 字符串
* @return array 返回数组格式，如果，data为空，则返回空数组
*/
function string2array($data) {
	if($data == '') return array();
	@eval("\$array = $data;");
	return $array;
}

/**
* 将数组转换为字符串
*
* @param  array $data   数组
* @param  bool  $isformdata 如果为0，则不使用new_stripslashes处理，可选参数，默认为1
* @return string  返回字符串，如果，data为空，则返回空
*/
function array2string($data, $isformdata = 1) {
	if($data == '') return '';
	if($isformdata) $data = new_stripslashes($data);
	return var_export($data, TRUE);
}

function formatStr($str){
	return str_replace(array("\r\n", "\r", "\n"), "", htmlspecialchars_decode($str));
}


/**
** 截取中文字符串
**/
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(function_exists("mb_substr")){
        $slice= mb_substr($str, $start, $length, $charset);
    }elseif(function_exists('iconv_substr')) {
        $slice= iconv_substr($str,$start,$length,$charset);
    }else{
        $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }    
        $fix='';
        if(strlen($slice) < strlen($str)){
            $fix='...';
        }
        return $suffix ? $slice.$fix : $slice;
}


function formatTime($timer) {
    $str = '';
    $diff = $_SERVER['REQUEST_TIME'] - $timer;
    $day = floor($diff / 86400);
    $free = $diff % 86400;
    if ($day > 0) {
        return $day . "天前";
    } else {
        if ($free > 0) {
            $hour = floor($free / 3600);
            $free = $free % 3600;
            if ($hour > 0) {
                return $hour . "小时前";
            } else {
                if ($free > 0) {
                    $min = floor($free / 60);
                    $free = $free % 60;
                    if ($min > 0) {
                        return $min . "分钟前";
                    } else {
                        if ($free > 0) {
                            return $free . "秒前";
                        } else {
                            return '刚刚';
                        }
                    }
                } else {
                    return '刚刚';
                }
            }
        } else {
            return '刚刚';
        }
    }
}

/**
 * 根据uid获取用户
 * return array
 */
function getUser($uid,$getPic= 0){
	$admin = M('user','sys_');
	$user = $admin->where(array('id'=>$uid))->find();
	return $user;
}

include dirname(__FILE__).DIRECTORY_SEPARATOR.'pinyin.php';
?>