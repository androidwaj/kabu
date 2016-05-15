<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	private $page = 1;
	private $limit = 10;
    public function index(){
    	var_dump('ok');
    }
    
    /**获取新闻列表*/
    public function newsList(){
    	$type = $_POST['type'];
    	$model_news = D('Content');
    	switch ($type) {
    		case 257:
    			$model_news->setTable('Data_Content_257');
    		break;
    			$model_news->setTable('Data_Content_258');
    		case 258:
    		break;
    		case 259:
    			$model_news->setTable('Data_Content_259');
    		break;
    		case 260:
    			$model_news->setTable('Data_Content_260');
    		break;
    		case 261:
    			$model_news->setTable('Data_Content_261');
    		break;
    		case 262:
    			$model_news->setTable('Data_Content_262');
    		break;
    		case 263:
    			$model_news->setTable('Data_Content_263');
    		break;
    		case 264:
    			$model_news->setTable('Data_Content_264');
    		break;
    		case 265:
    			$model_news->setTable('Data_Content_265');
    		break;
    		default:
    			$model_news->setTable('Data_Content_257');
    		break;
    	}
    	if($_POST['limit']){
    		$this->limit = $_POST['limit'];
    	}
    	if($_POST['page']){
    		$this->page = $_POST['page'];
    	}
    	$list = $model_news->order('id desc')->limit($this->limit)->page($this->page)->select();
    	if($list){
    		foreach ($list as $k => $v){
//     			http://img1.gtimg.com/13/1371/137124/13712484_small.jpg
				$data = $this->getimgs($v['内容']);
				if(is_array($data)){
					$list[$k]['img'] = $data[0];
				}else{
// 					$img = $this->getimgs2($v['内容']);
					$list[$k]['img'] = $img;
				}
    			$list[$k]['标题'] = mb_substr($v['标题'], 0,strlen($v['标题'],"UTF-8")-4,"UTF-8");
    		}
    		output_data($list);
    	}else{
    		output_error('暂无数据');
    	}
    }
    
    private function getimgs($str) {
    	$reg = '/((http|https):\/\/)+(\w+\.)+(\w+)[\w\/\.\-]*small.(jpg|gif|png)/';
    	$matches = array();
    	preg_match_all($reg, $str, $matches);
    	foreach ($matches[0] as $value) {
    		$data[] = $value;
    	}
    	return $data;
    }
    private function getimgs2($str) {
    	$reg = '/((http|https):\/\/)+(\w+\.)+(\w+)[\w\/\.\-]*small.(jpg|gif|png)/';
    	$matches = array();
    	preg_match_all($reg, $str, $matches);
    	foreach ($matches[0] as $value) {
    		$data[] = $value;
    	}
    	return $data;
    }
}