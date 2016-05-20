<?php
namespace Think;

/**
 * 企业信息
 */
class Org
{
    /*
     * 添加企业信息
     */
    static public function addorg($arr){
        $add = M("org");
        $data["fullname"]    = strip_tags($arr["fullname"]);//全称
        $data["simplename"]  = strip_tags($arr["simplename"]);//简称
        $data["introduce"]   = $arr["introduce"];//介绍
        $data["status"]      = $arr["status"]; //状态
        $data["parent_id"]   = $arr["parent_id"]; //父id
        $data["language"]    = strip_tags($arr["language"]); // 语言
        $data["note"]        = strip_tags($arr["note"]); //备注
        $data["create_date"] = $arr["create_date"]; //创建时间
        $data["modify_date"] = $arr["modify_date"]; //修改时间

        $res = $add->add($data);
        if($res){
            return 1;
        }else{
            return -1;
        }
    }

    /*
     * 编辑企业信息
     */
    static public function editorg($arr){
        $save = M("org");
        $data["fullname"]    = strip_tags($arr["fullname"]);//全称
        $data["simplename"]  = strip_tags($arr["simplename"]);//简称
        $data["introduce"]   = $arr["introduce"];//介绍
        $data["status"]      = $arr["status"]; //状态
        $data["language"]    = strip_tags($arr["language"]); // 语言
        $data["note"]        = strip_tags($arr["note"]); //备注
        $data["modify_date"] = $arr["modify_date"]; //修改时间

        $res = $save->where("id=".$arr['id'])->save($data);
        if($res){
            return 1;
        }else{
            return -1;
        }
    }
}