<?php
namespace Home\Controller;
use Think\Controller;
use Think\Auth;
header("Content-type: text/html; charset=utf-8");
//权限控制器
class AuthController extends Controller{
    //判断用户权限
	public function checkUser(){
	     $id=$_SESSION['userid'];
         $groupTable=M("role r");
         //$field="";
         $sql=$groupTable->join('left join foc_user_role ur on r.roleid=ur.roleid')->where("userid = '%d'",array($id))->find();
         if($sql['groupid']==1){
         	return 1;
         }else{
         	return -1;
         }
/*
         switch ($sql['groupname']) {
         	case '管理员组':
         		     $test=true;
         		break;

         	case '用户组':
         		    $test=flase;
         		break;
         }
         return $test;   */
	}
/*
    //判断管理员组的角色权限
	private function adminRoot($rolename,$idcodes){
		switch ($rolename) {
			case '系统管理员':
				$title=11;
				break;
			case '超级管理员':
				$title=12;
				break;
			case '用户管理员':
				$title=13;
				break;
			case '产品管理员':
				$title=14;
				break;
		}
		return $title;

	}

	//判断用户组的角色权限
	private function userRoot($rolename,$idcodes){
        switch ($rolename) {
        	case '普通用户':
        		$title="你是普通用户！";
        		break;
        	case 'VIP用户':
        		$title="你是VIP用户！";
        		break;
        }
        return $title;
	}
	*/
}