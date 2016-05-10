<?php
namespace Home\Model;
use Think\Model\ViewModel;

class UserInfoViewModel extends ViewModel{
	public $viewFields=array(
		'user'=>array('userid','username'),
        'userinfo'=>array('name','sex','_on'=>'userinfo.userid=user.userid'),
	);
}