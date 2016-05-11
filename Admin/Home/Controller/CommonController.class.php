<?php 
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

    // 判断是否已经登录
	public function _initialize(){
        if(!isset($_SESSION['username'])){
        	$this->redirect("Login/login");
        }        
	}

}


