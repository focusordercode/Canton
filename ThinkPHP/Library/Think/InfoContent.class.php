<?php
namespace Think;
//产品内容类
class InfoContent{
	static private $contentid;
	static private $title;
	static private $content;
	static private $name;
	static private $date;
	static private $columnid;
	static private $arr=array();
    
    //查询所有标题
	static public function SelTitle(){
		$contentTable=M('content');
		$field='contentid, title';
		$sql=$contentTable->field($field)->select();
		return($sql);
	}

	//模糊查询标题
	static public function VagueTitle($title){
		$contentTable=M('content');
		$field='contentid,title';
		$array['title']=array('like',"%{$title}%");
		$sql=$contentTable->field($field)->where($array)->select();
		return($sql);
	} 

	//添加产品内容
	static public function AddContent($title,$content,$name,$columnid){
		$contentTable=M('content');
		$data['title']=$title;
		$data['content']=$content;
		$data['name']=$name;
		$time=date("Y-m-d H:i:s");
		$data['date']=$time;
		$data['columnid']=$columnid;
		$sql=$contentTable->data($data)->add();
		if($sql){
        	return  1;
        }else{
        	return  -1;
        }

	}

	//修改产品标题
	static public function UpdaTitle(){
		
	}
}