<?php
namespace Home\Controller;
use Think\Controller;
class OrgController extends Controller {
    public function index(){
        $field = array("id","fullname","simplename","parent_id","status");
        $org = M("org")->field($field)->select();

        $this->org = getTree($org);

        p(getTree($org));
        $this->show();
    }
    public function addorg(){
        $this->parent_id = I("parent_id");
        $this->show();
    }

    public function doaddorg(){
        if(IS_POST){
            $arr = array(
                'fullname'   => I('fullname','','strip_tags'),
                'simplename' => I('simplename','','strip_tags'),
                'note'       => I('note','','strip_tags'),
                'introduce'  => $_POST['introduce'],
                'status'     => I('status'),
                'parent_id'  => I('parent_id'),
                'language'   => I('language'),
                'create_date'=> time(),
                'modify_date'=> time()
            );
            $res = \Think\Org::addorg($arr);
            if($res){
                $this->success("添加成功",U("Org/index"),1);
            }
        }
    }
}