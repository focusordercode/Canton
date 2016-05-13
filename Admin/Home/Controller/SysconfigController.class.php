<?php
namespace Home\Controller;
use Think\Controller;
class SysconfigController extends CommonController {

    public function sysconfig(){
        $list = \Think\Sysconfig::getsysconfig();
        $this->assign("list",$list);
        $this->display();
    }

    public function doadd(){
        if(IS_POST){
	    	$sysname = I("sysname");
	    	$info = I("info");
	    	$value = I("value");
	    	$typeid = I("typeid");
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
                    $save = \Think\Sysconfig::editsysconfig($k1,$v1,$_POST['status'][$k1]);
                    if($save){
                        $updateStatus += 1;
                    }
                }
            }
        }
        $this->success("您成功修改了".$updateStatus."条信息。",U("Sysconfig/sysconfig"),1);
    }

}