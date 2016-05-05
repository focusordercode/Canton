<?php 
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

    //登录检测
    public function checklogin(){
        $username=I("post.username");
        $password=I("post.password");
        $test=\Think\User::ValidationPassword($username,$password);
        if($test!=-1){
           \Think\User::updaLisdate($test); 
            $_SESSION['userid']=$test;
            $_SESSION['username']=$username;
            \Think\Log::write($username.'登录了！','info');
            $this->redirect('Index/index');
        }else{
            $this->error("密码错误！",U('Login/login'));  
        }
    }
    //退出登录
    public function login_out(){
            session_unset();
            session_destroy();
        }
}