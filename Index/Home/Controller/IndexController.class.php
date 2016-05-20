<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $this->usertype = M("group")->select();
        $this->show();
    }

    public function role(){// 角色
        $this->show();
    }

    public function auth(){// 权限
        $groupid = I('groupid');
        $this->groupid = $groupid;
        $role_root = M("auth")->where("user_id=".$groupid)->select();
        $rootarr = array();
        foreach($role_root as $k => $v){

            $rootarr[] = $v['root_id'];
        }
        $this->assign('rootarr',$rootarr);
        $this->root = M("root")->select();
        $this->show();
    }

    public function root(){
        $this->root = M("root")->select();
        $this->show();
    }

    public function addroot(){
        if(IS_POST){
            $data = array(
                'rootpath' => I('rootpath','','strip_tags'),
                'pid' => isset($_POST['pid']) ? $_POST['pid'] : 0,
                'title' => I('title','','strip_tags'),
                'idcode' => 0,
            );
            if(M("root")->add($data)){
                $id = M("root")->where("rootpath='".I('rootpath','','strip_tags')."'")->getField("id");
                $path['path'] = isset($_POST['path']) ? $_POST['path']."-".$id : 0;
                M("root")->where('id='.$id)->save($path);
                $this->success("添加成功",U('Index/root'),1);
            }
        }
    }

    public function delroot(){
        $id = I("id");
        $del = M("root")->delete($id);
        if($del){
            $this->success("删除成功",U('Index/root'),1);
        }else{
            $this->error("删除失败",U('Index/root'),1);
        }
    }

    public function editroot(){// 权限编辑
        if(IS_POST){
            $del = M("auth")->where("user_id=".I("groupid"))->delete();

            $data['user_id'] = I("groupid");
            foreach($_POST['root_id'] as $k => $v){
                $data['root_id'] = $v;
                M("auth")->add($data);
            }
            $this->success("修改成功",U('Index/index'),1);

        }
    }

}