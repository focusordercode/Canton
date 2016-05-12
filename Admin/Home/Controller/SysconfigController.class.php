<?php
namespace Home\Controller;
use Think\Controller;
class SysconfigController extends CommonController {

    public function sysconfig(){
        $where1 = " and typeid=1";
        $list1 = \Think\Sysconfig::getsysconfig($where1);
        $this->assign("list1",$list1);

        $where2 = " and typeid=2";
        $list2 = \Think\Sysconfig::getsysconfig($where2);
        $this->assign("list2",$list2);

        $this->display();
    }

    public function doadd(){
        if(IS_POST){
            if(isset($_POST['typeid']) && $_POST['typeid']=='2'){
                $val = \Think\Uploadfile::files();
                $value = $val['value']['savename'];
                $typeid = 2;
            }else{
                $value = trim(I("value"));
                $typeid = I("typeid");
            }
            $sysname = trim(I("sysname"));
            $info = trim(I("info"));
            if($sysname == "" || $info == "" || $value == ""){
                $this->error("error");
            }
	    	
	    	$status = I("status");
	        $list = \Think\Sysconfig::addsysconfig($sysname,$info,$value,$typeid,$status);
	        if($list == -2){
                $this->error("isset");
	        }else if($list == 1){
                $this->success("success");
	        }else if($list == -1){
                $this->error("error");
            }	
        }
    }
    
    public function edit(){
        $updateStatus = 0;
        foreach(I("post.") as $k => $v){
            if($k == 'value'){
                foreach($v as $k1 =>$v1){
                    $save = \Think\Sysconfig::editsysconfig($k1,$_POST['status'][$k1],1,$v1);
                    if($save){
                        $updateStatus += 1;
                    }
                }
            }
        }
        $this->success("您成功修改了".$updateStatus."条信息。",U("Sysconfig/sysconfig"),1);
    }

    public function editP(){
        $pic = M("sysconfig")->where("sysname='".I("sysname")."'")->find();
        $image = $pic["value"];
        $file = C('IMAGE_FILE_PATH').$image;
        
        foreach ($_FILES as $k => $v){
            if($_FILES[$k]['name']){
                $value = \Think\Uploadfile::files();
                $save = \Think\Sysconfig::editsysconfig($k,$_POST[$k]['status'],2,$value[$k]['savename']);
                if($save) @unlink($file);
            }else{
                $save = \Think\Sysconfig::editsysconfig($k,$_POST[$k]['status'],2);
            }
            if($save){
                $this->success("修改成功。",U("Sysconfig/sysconfig"),1);
            }
        }
    }
}