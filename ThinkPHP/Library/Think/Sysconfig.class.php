<?php 
namespace Think;
/*
*
*系统配置
*
*/
//静态方法调用 Sysconfig::getsysconfig();
class Sysconfig {

    //查询已有系统配置项
    //$where 查询条件
    static public function getsysconfig($where){
        $sys = M("sysconfig");
        $getwhere = "1=1 ";
        if($where){
            $getwhere .= $where;
        }
        $list = $sys->where($getwhere)->select();
        if($list){
            return $list;
        }
    }

    //添加系统配置项
    //$sysname 配置项名  主键，独一无二
    //$info    描述信息  配置项备注
    //$value   配置项值
    //$typeid  类型id   1 文字项  2 图片项
    static public function addsysconfig($sysname,$info,$value,$typeid="1",$status="1"){
        $sys = M("sysconfig");
        $isset = $sys->where("sysname='".$sysname."'")->select();
        if(!$isset){
            $data["sysname"] = $sysname;
            $data["info"]    = $info;
            $data["value"]   = $value;
            $data["typeid"]  = $typeid;
            $data["status"]  = $status;
            $add = $sys->add($data);
            if($add){
                return 1;
            }else{
            	return -1;
            }
        }else{
            return -2;//已经存在
        }
	}

	//修改配置项  参数如上
    //typeid以及 info描述信息暂时不可修改
	static public function editsysconfig($sysname,$status,$typeid,$value,$info){
        $sys = M("sysconfig");

        if(isset($value)){
            $data["value"] = $value;
        }
        $data["status"] = $status;
        $data["typeid"] = $typeid;        
        if(isset($info)){
        	$data["info"] = $info;
        }

        $add = $sys->where("sysname='".$sysname."'")->save($data);
        if($add){
            return 1;
        }else{
        	return -1;
        }

	}
}