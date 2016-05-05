<?php
namespace Home\Controller;
use Think\Controller;
use Think\User;

class RegisterController extends Controller{
	//用户注册
	public function registerUser(){
		$username=I('post.username');
		$password=I('post.password');
		$email=I('post.email');
		$mobile=I('post.mobile');

		$res=\Think\User::AddUser($username,$password,$email,$mobile);
		if($res){
			$ip=get_client_ip();
            \Think\Log::write('ip地址 '.$ip.'注册了用户名为'.$username.'的用户！','info');
			$this->success("注册成功！",U('Login/login'));
		}else{
			$this->error("注册失败！",U('Register/register'));
		}
	}
}