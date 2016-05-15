<?php
/**
 * mobile公共方法
 *
 * 公共方法
 *
 */
function output_data($datas, $extend_data = array()) {
    output_other(0,$datas, $extend_data);
}

function output_error($message, $extend_data = array()) {
    $datas = array('error' => $message);
    output_other(1,$datas, $extend_data);
}

function output_other($code,$datas, $extend_data = array()) {
	$data = array();
	$data['code'] = $code;

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

