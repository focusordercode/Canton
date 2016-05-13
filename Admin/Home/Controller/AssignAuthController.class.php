<?php
namespace Home\Controller;
use Think\Controller;

//权限分配控制器
class AssignAuthController extends Controller{
	//将权限导入页面
	public function getRoot(){
        $arr=array();
        $arr=GetRoot();
        $this->assign('getroot',$arr);
        $this->display();
	}

	//查询角色权限
	public function authSel(){
		$roleid=I('roleid');
		$array=array();
		$array=SelAuth($roleid);
		$this->assign('authsel',$array);
		$this->display();
	}

    //分配权限给角色
	public function assign(){
		$idcodes=I('post.idcodes');
		$roleid=I('post.roleid')
		$assignRoot=Assign($roleid,$idcodes);
		if($assignRoot==1){
			echo "分配成功！"
		}else{
			echo "分配失败！";
		}
	}

	//修改角色权限
	public function authUpdate(){
		$idcodes=I('post.idcodes');
		$roleid=I('post.roleid');
		$update=updaAuth($roleid,$idcodes);
		if($update==1){
			echo "修改权限成功！"
		}else{
			echo "修改权限失败！";
		}
	}

	//删除角色
	public function DelRole(){
		$roleid=I('post.roleid');
		$del=DelRoot($roleid);
		if ($del==1) {
			echo "删除角色成功！"
		}else{
			echo "删除角色失败！";
		}
	}
}
