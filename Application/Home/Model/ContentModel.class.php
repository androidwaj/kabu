<?php
namespace Home\Model;
use Think\Model;
class ContentModel extends Model { 
	protected $trueTableName = 'Data_Content_257'; 
	
	public function __construct($table){
		parent::__construct();
	}
	
	public function setTable($table){
		$this->trueTableName = $table;
	}
}