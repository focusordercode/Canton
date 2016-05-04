<?php
namespace Home\Controller;
use Think\Controller;

class RegisterController extends Controller{
	//用户注册
	public function registerUser(){
		$username=I('post.username');
		$password=I('post.password');
		$email=I('post.email');
		$mobile=I('post.mobile');
		$time=date("Y-m-d H:i:s",time());
		$random= substr(uniqid(rand()), -6);
		$userTable=M("user");

		$data['username']=$username;
		$data['password']=md5(md5($password).$random);
		$data['email']=$email;
		$data['mobile']=$mobile;
		$data['regdate']=$time;
		$data['random']=$random;

		$sql=$userTable->data($data)->add();
		if($sql){
			$ip=get_client_ip();
            \Think\Log::write('ip地址 '.$ip.'注册了用户名为'.$username.'的用户！','info');
			$this->success("注册成功！",U('Login/login'));
		}else{
			$this->error("注册失败！",U('Register/register'));
		}
	}
}