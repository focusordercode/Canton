<?php 
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

    // 判断是否已经登录
	public function _initialize(){
        if(!isset($_SESSION['username'])){
        	$this->redirect("Login/login");
        }
        $s = M("sysconfig")->where("status=1")->select();
        $site = array();
        foreach($s as $k => $v){
            $site[$v['sysname']] = $v['value'];
        }
        $this->assign("site" ,$site);
	}

}


