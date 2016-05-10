<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	//根据id查询用户
	public function IDSel(){
		$userid=I('post.userid');
		$res=\Think\User::SelID($userid);
		$this->assign('res',$res);
		$this->display();
		\Think\Log::write('用户 '.$_SESSION['username'].'查询了Id为'.$userid.'的用户','info');
	}

	//根据用户名查询用户
	public function NameSel(){
		$username=I('post.username');
		$res=\Think\User::SelName($username);
		$this->assign('res',$res);
		$this->display();
		\Think\Log::write('用户 '.$_SESSION['username'].'查询了用户名为'.$userid.'的用户','info');
	}

	//模糊查询用户
	public function VagueSel(){
		$username=I('post.username');
		$res=\Think\User::SelVague($username);
		$this->assign('res',$res);
		$this->display();
		\Think\Log::write('用户 '.$_SESSION['username'].'查询了用户名含有'.$userid.'的所有用户','info');
	}

	//添加用户
	public function UserAdd(){
		$username=I('post.username');
		$password=I('post.password');
		$email=I('post.email');
		$mobile=I('post.mobile');
		$test=\Think\User::AddUser($username,$password,$email,$mobile);
		if($test==1){
			$this->success('添加成功！');
		}else{
			$this->error('添加失败！');
		}
	}

	//修改用户
	public function UserUpda(){
		$userid=I('post.userid');
		$email=I('post.email');
		$mobile=I('post.mobile');
		$test=\Think\User::UpdaUser($userid,$email,$mobile);
		if($test==1){
			$this->success('修改成功！');
		}else{
			$this->error('修改失败！');
		}
	}

	//删除用户
	public function UserDel(){
		$userid=I('post.userid');
		$test=\Think\User::DelUser($userid);
		if($test==1){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
    

}