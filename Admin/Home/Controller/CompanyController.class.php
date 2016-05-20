<?php
namespace Home\Controller;
use Think\Controller;
class CompanyController extends Controller {
    public function index(){
        $this->company = M("company")->select();
        $this->show();
    }
    public function add(){
        $this->show();
    }
    public function doadd(){
        if(IS_POST){
            $arr = array(
                'fullname'   => I('fullname','','strip_tags'),
                'simplename' => I('simplename','','strip_tags'),
                'industry'   => I('industry','','strip_tags'),
                'note'       => I('note','','strip_tags'),
                'introduce'  => $_POST['introduce'],
                'status'     => I('status'),
                'parent_id'  => I('parent_id'),
                'language'   => I('language'),
                'create_date'=> time(),
                'modify_date'=> time()
            );
            $res = \Think\Company::addcompany($arr);
            if($res){
                $this->success("添加成功",U("Company/index"),1);
            }
        }
    }

    public function edit(){
        if(isset($_GET['id'])){
            $id = I('id');
            $this->company = M("company")->find($id);
            $this->show();
        }
    }

    public function doedit(){
        if(IS_POST){
            $arr = array(
                'id' => I("id"),
                'fullname'   => I('fullname','','strip_tags'),
                'simplename' => I('simplename','','strip_tags'),
                'industry'   => I('industry','','strip_tags'),
                'note'       => I('note','','strip_tags'),
                'introduce'  => $_POST['introduce'],
                'status'     => I('status'),
                'parent_id'  => I('parent_id'),
                'language'   => I('language'),
                'modify_date'=> time()
            );
            $res = \Think\Company::editcompany($arr);
            if($res){
                $this->success("修改成功",U("Company/index"),1);
            }
        }
    }

}