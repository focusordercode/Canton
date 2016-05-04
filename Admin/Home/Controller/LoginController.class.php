<?php 
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

    //登录检测
    public function checklogin(){
        $username=I("post.username");
        $password=I("post.password");

        $userTable=M("user");
        $sql=$userTable->where("username='%s'",array($username))->find();
        $random=$sql['random'];
        if($sql['password']!=md5(md5($password).$random)){
            $time=date("Y-m-d H:i:s");
            $data['lisdate']=$time;
            $upda=$userTable->where("userid=%d",array($sql['userid']))->data($data)->save();
            $_SESSION['userid']=$sql['userid'];
            $_SESSION['username']=$username;
            \Think\Log::write($username.'登录了！','info');
            $this->redirect('Index/index');
        }else{
            $this->error("密码错误！","Login/Login");  
        }
    }
    //退出登录
    public function login_out(){
            
            session_destroy();
        }
}