<?php
function format_date($time){
	$t=time()-$time;
	$f=array(
			'31536000'=>'年',
			'2592000'=>'个月',
			'604800'=>'星期',
			'86400'=>'天',
			'3600'=>'小时',
			'60'=>'分钟',
			'1'=>'秒'
	);
	foreach ($f as $k=>$v)    {
		if (0 !=$c=floor($t/(int)$k)) {
			return $c.$v.'前';
		}
	}
}

function uploadImage(){
	 import("ORG.Net.UploadFile");
     $name=time().rand();	//设置上传图片的规则
     $upload = new UploadFile();// 实例化上传类
     $upload->maxSize  = 3145728 ;// 设置附件上传大小
     $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
     $upload->savePath = $path = 'public/uploads/app/'.date('Y-m').'/';// 设置附件上传目录
     if (!is_dir($path)){
         $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
     }
     if(!$upload->upload()) {// 上传错误提示错误信息
         $result['info'] =  $upload->getErrorMsg();
         $result['code'] = 0;
     }else{// 上传成功 获取上传文件信息
         $result['info'] =  $upload->getUploadFileInfo();
         $result['code'] = 1;
     }
	return $result;
}

function output_data($datas, $extend_data = array()) {
    output_other(200,$datas, $extend_data);
}

function output_error($message, $extend_data = array()) {//服务器异常
    output_other(500,$message, $extend_data);
}

function output_other($code,$datas, $extend_data = array()) {
	$data = array();
	$data['code'] = intval($code);

	if(!empty($extend_data)) {
		$data = array_merge($data, $extend_data);
	}

	$data['datas'] = $datas;

	if(!empty($_GET['callback'])) {
		echo $_GET['callback'].'('.json_encode($data).')';die;
	} else {
		echo json_encode($data);die;
	}
}
