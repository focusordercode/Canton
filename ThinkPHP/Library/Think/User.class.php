<?php
namespace Think;
//用户类
class User{
	static private $userid;
	static private $username;
	static private $password;
	static private $email;
	static private $emailstatus;
	static private $mobile;
	static private $random;
	static private $arr=array();


    //根据id查询用户
	static public function SelID($userid){
		$UserTable=M('user');
        $sql=$UserTable->where("userid = '%d'",array($userid))->find();
        $arr['username']=$sql['username'];
        $arr['email']=$sql['email'];
        $arr['emailstatus']=$sql['emailstatus'];
        $arr['mobile']=$sql['mobile'];
        return($arr);
	}

	//根据用户名查询用户
	static public function SelName($username){
		$UserTable=M('user');
        $sql=$UserTable->where("username = '%s'",array($username))->find();
        $arr['userid']=$sql['userid'];
        $arr['username']=$sql['username'];
        $arr['email']=$sql['email'];
        $arr['emailstatus']=$sql['emailstatus'];
        $arr['mobile']=$sql['mobile'];
        return ($arr);
	}

	//模糊查询用户
	static public function SelVague($username){
		$UserTable=M('user');
		$array['username']=array('like',"%{$username}%");
        $sql=$UserTable->where($array)->select();
        return($sql);
	}

	//查询所有用户
	static public function SelAll($username){
		$UserTable=M('user');
        $sql=$UserTable->select();
        return($sql);
	}
    
    //根据id修改密码
	static public function UpdaPassword($userid,$password){
		$UserTable=M('user');
		$data['random']= substr(uniqid(rand()), -6);
		$data['password']=md5(md5($password).$random);
        $sql=$UserTable->where("userid = '%d'",array($userid))->data($data)->save();
        if(flase!==$sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//根据id修改邮箱
	static public function UpdaEmail($userid,$email){
		$UserTable=M('user');
		$data['email']= $email;
        $sql=$UserTable->where("userid = '%d'",array($userid))->data($data)->save();
        if(flase!==$sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//根据id修改手机号
	static public function UpdaMobile($userid,$mobile){
		$UserTable=M('user');
		$data['mobile']= $mobile;
        $sql=$UserTable->where("userid = '%d'",array($userid))->data($data)->save();
        if(flase!==$sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

    //添加用户
	static public function AddUser($username,$password,$email,$emailstatus='0',$mobile){
		$UserTable=M('user');
		$data['username']=$username;
		$data['random']= substr(uniqid(rand()), -6);
		$data['password']=md5(md5($password).$random);
		$data['email']=$email;
		$data['emailstatus']=$emailstatus;
		$data['mobile']=$mobile;
		$data['regdate']=date("Y-m-d H:i:s",time());
        $sql=$UserTable->data($data)->add();
        if($sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//删除用户
	static public function DelUser($userid){
		$UserTable=M('user');
        $sql=$UserTable->where("userid = '%d'",array($userid))->delete();
        if($sql){
        	return 1;
        }else{
        	return -1;
        } 
	}
}