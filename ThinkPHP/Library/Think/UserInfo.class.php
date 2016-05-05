<?php
namespace Think;
//用户信息类
class UserInfo{
	static private $userid;
	static private $name;
	static private $portrait;
	static private $sex;
	static private $birthday;
	static private $shengxiao;
	static private $constellation;
	static private $address;
	static private $zipcode;
	static private $arr=array();
    $UserInfoTable=M('userInfo');

    //根据id查询用户信息
	static public function SelID($userid){
        $sql=$UserInfoTable->where("userid = '%d'",array($userid))->find();
        /*
        $arr['name']=$sql['name'];
        $arr['portrait']=$sql['portrait'];
        $arr['sex']=$sql['sex'];
        $arr['birthday']=$sql['birthday'];
        $arr['shengxiao']=$sql['shengxiao'];
        $arr['constellation']=$sql['constellation'];
        $arr['address']=$sql['address'];
        $arr['zipcode']=$sql['zipcode'];*/
        return($sql);
	}
    
    //根据id更新用户信息
	static public function UpdaUserInfo($userid,$name,$portrait,$sex,$birthday,$shengxiao,$constellation,$address,$zipcode){
		$data['name']=$name;
		$data['portrait']=$portrait;
		$data['sex']=$sex;
		$data['birthday']=$birthday;
		$data['shengxiao']=$shengxiao;
		$data['constellation']=$constellation;
		$data['address']=$address;
		$data['zipcode']=$zipcode;
        $sql=$UserInfoTable->where("userid = '%d'",array($userid))->data($data)->save();
        if(flase!==$sql){
        	return  1;
        }else{
        	return  -1;
        }
	}

    //添加用户信息
	static public function AddUserInfo($userid,$name,$portrait,$sex,$birthday,$shengxiao,$constellation,$address,$zipcode){
		$data['userid']=$userid;
		$data['name']=$name;
		$data['portrait']=$portrait;
		$data['sex']=$sex;
		$data['birthday']=$birthday;
		$data['shengxiao']=$shengxiao;
		$data['constellation']=$constellation;
		$data['address']=$address;
		$data['zipcode']=$zipcode;
        $sql=$UserInfoTable->data($data)->add();
        if($sql){
        	return  1;
        }else{
        	return  -1;
        }
	}
}