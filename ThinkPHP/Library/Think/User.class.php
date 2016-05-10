<?php
namespace Think;
/**
* 用户类
*/
class User{
	static private $userid;
	static private $username;
	static private $password;
	static private $email;
	static private $emailstatus;
	static private $mobile;
	static private $random;
	static private $field;
	static private $arr=array();
	static private $data=array();


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
		$field='userid,username,email,emailstatus,mobile';
        $sql=$UserTable->field($field)->where($array)->select();
        return($sql);
	}

	//查询所有用户
	static public function SelAllUser(){
		$UserTable=M('user');
		$field='userid,username,email,emailstatus,mobile';
        $sql=$UserTable->field($field)->select();
        return($sql);
	}

	//验证密码
	static public function  ValidationPassword($username,$password){
		$UserTable=M('user');
        $sql=$UserTable->where("username='%s'",array($username))->find();
        $random=$sql['random'];
        if($sql['password']==md5(md5($password).$random)){
        	return $sql['userid'];
        }else{
        	return  -1;
        }
	}

	//更新登录时间
	static public function updaLisdate($userid){
		$UserTable=M('user');
		$time=date("Y-m-d H:i:s");
        $data['lisdate']=$time;
        $sql=$UserTable->where("userid=%d",array($userid))->data($data)->save();
        if($sql!=='flase'){
        	return  1;
        }else{
        	return  -1;
        }
	}

    
    //根据id修改密码
	static public function UpdaPassword($userid,$password){
		$UserTable=M('user');
		$data['random']= substr(uniqid(rand()), -6);
		$data['password']=md5(md5($password).$random);
        $sql=$UserTable->where("userid = '%d'",array($userid))->data($data)->save();
        if($sql!=='flase'){
        	return  1;
        }else{
        	return  -1;
        }
	}

	//根据id修改邮箱和手机号
	static public function UpdaUser($userid,$email,$mobile){
		$UserTable=M('user');
		$data['email']= $email;
		$data['mobile']= $mobile;
        $sql=$UserTable->where("userid = '%d'",array($userid))->data($data)->save();
        if($sql!=='flase'){
        	return  1;
        }else{
        	return  -1;
        }
	}

    //添加用户
	static public function AddUser($username,$password,$email,$mobile,$emailstatus='0'){
		$UserTable=M('user');
		$data['username']=$username;
		$data['random']= substr(uniqid(rand()), -6);  //随机生成盐值
		$data['password']=md5(md5($password).$data['random']);
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