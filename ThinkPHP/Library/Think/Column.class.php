<?php
namespace Think;

/**
* 栏目类
*/
class Column
{
	static private $columnid;
	static private $paterid;
	static private $columnname;
    
    //查询所有一级栏目
	static public function SelColumn(){
		$ColumnTable=M('column');
		$paterid=0;
		$sql=$ColumnTable->where("paterid='%d'",array($paterid))->select();
		return($sql);
	}

    //查询二级栏目
	static public function SelTwoCloumn($paterid){
        $ColumnTable=M('column');
        $sql=$ColumnTable->where("paterid='%d'",array($paterid))->select();
        return($sql);
	}

	//添加一级栏目
	static public function AddColumn($columnname){
		$ColumnTable=M('column');
		$data['columnname']=$columnname;
        $sql=$ColumnTable->data($data)->add();
        if($sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//添加二级栏目
	static public function AddTwoColumn($paterid,$columnname){
        $ColumnTable=M('column');
        $data['paterid']=$paterid;
        $data['columnname']=$columnname;
        $sql=$ColumnTable->data($data)->add();
        if($sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//删除栏目
	static public function DelColumn($columnid){
        $ColumnTable=M('column');
        $sql=$ColumnTable->where("columnid='%d'",array($columnid))->delete();
        if($sql){
        	return 1;
        }else{
        	return -1;
        } 
	}

	//修改栏目
	static public function updaColumn($columnid,$columnname){
		$ColumnTable=M('column');
		$data['columnid']=$columnid;
		$data['columnname']=$columnname;
		$sql=$ColumnTable->data($data)->save();
		if($sql!=='flase'){
        	return  1;
        }else{
        	return  -1;
        }
	}
}