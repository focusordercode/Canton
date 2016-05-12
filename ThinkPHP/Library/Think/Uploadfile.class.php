<?php 
namespace Think;
/*
*
*文件上传
*
*/
//静态方法调用 class::function();
class Uploadfile {

    //上传文件
    //$path 上传路径 
    //$extension 上传格式限制
    static public function files($path , $extension=array('jpg', 'gif', 'png', 'jpeg')){

        $filepath = isset($path)? $path : C('IMAGE_FILE_PATH');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   = 3145728 ;// 设置附件上传大小
        $upload->exts      = $extension;// 设置附件上传类型
        $upload->rootPath  = $filepath; // 设置附件上传根目录
        $upload->savePath  = ''; // 设置附件上传（子）目录
        $upload->autoSub   = false; //自动使用子目录上传
        $upload->replace   = false; //存在同名文件是否覆盖
        $upload->saveName  = date("His"); //存在同名文件是否覆盖
        // 上传文件 
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            return $info;
        }
    }

}