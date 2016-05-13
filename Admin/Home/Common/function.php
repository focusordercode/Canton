<?php
	//得到权限的列表
	 function GetRoot(){
		$RootTable=M('root');
		$sql=$RootTable->select();
		return($sql);
	}

	//查询角色权限
	function SelAuth($id){
		$RoleTable=M('role');
		$sql=$RoleTable->where("roleid=%d",array($id))->find();
		return($sql);
	}

	//分配权限给角色
	 function Assign($id,$idcodes){
		$RoleTable=M('role');
		$data['idcodes']=$idcodes;
		$sql=$RoleTable->where("roleid=%d",array($id))->data($data)->add();
		if($sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//修改角色权限
	 function updaAuth($id,$idcodes){
		$RoleTable=M('role');
        $data['idcodes']=$idcodes;
        $sql=$RoleTable->where("roleid=%d",array($id))->data($data)->save();
        if($sql!=='flase'){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//删除角色
	function DelRoot($id){
		$RoleTable=M('role');
		$sql=$RoleTable->where("roleid=%d",array($id))->delete();
		if($sql){
        	return 1;
        }else{
        	return -1;
        } 
	}
