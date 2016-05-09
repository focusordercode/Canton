<?php
namespace Home\Controller;
use Think\Controller;
use Think\Auth;
header("Content-type: text/html; charset=utf-8");
//权限控制器
class AuthController extends Controller{
    //判断用户是否可以登录后台
	public function checkGroup($id){
        $UserTable=M('user_role ur');
        $sql=$UserTable->join('left join foc_role r on ur.roleid=r.roleid')->where("userid=%d",array($id))->find();
        if($sql['groupid']==1){
         	return  true;
        }else{
         	return flase;
        }

	}
    
    //判断该用户的权限
	private function checkUserRoot($userid,$idcode){
        $idcodes=$this->GetUserRoot($userid);
        if($idcodes==9999){
            return true;
        }
        for($i=0;$i<count($idcodes);$i++){
            if($idcode=$idcodes[$i]){
                 return true;
            }
        }     
	}
    
    //获取该用户的权限
    private function GetUserRoot($userid){
        $UserTable=M('user_role ur');
        $sql=$UserTable->join('left join foc_role r on ur.roleid=r.roleid')->where("userid=%d",array($userid))->find();
        $idcodes=$sql['idcodes'];
        $idcodes = explode(",", $idcodes);//将字符串转换成数组
        return($idcodes);
    }
}