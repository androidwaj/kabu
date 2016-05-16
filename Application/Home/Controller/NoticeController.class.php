<?php
namespace Home\Controller;
class NoticeController extends BaseController {
	
    public function index(){
    	$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
    	$page = ($page - 1) * $this->limit;
    	$list = M('notice')->limit($page,$this->limit)->field('notice_id,notice_title,user_id,notice_abstract,FROM_UNIXTIME(add_time,"%Y-%m-%d %H:%i:%s") add_time')->select();
    	output_data($list);
    }
    
}