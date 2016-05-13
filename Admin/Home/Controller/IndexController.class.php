<?php 
namespace Home\Controller;
use Home\Controller\AuthController;

class IndexController extends AuthController {
    public function index(){
        $id=$_SESSION['userid'];
        $a=$this->checkGroup($id);
                                
            if ($a!==flase) {
                //跳转到首页
                //$this->display();
                
                /*$arr=\Think\User::SelAll();
                for($i=0;$i<count($arr);$i++){
                    foreach ($arr[$i] as $k => $v) {
                         echo $arr[$i][$k] = $v." ";
                     }
                    echo "<br />";
                }*/

                $t='admin';
                $Model=D('UserInfoView');
                $te=$Model->where('userinfo.userid=1')->select();
                print_r($te);
               

                
            }else{
            	$this->error("你没有权限！",U('Login/login'));
            }
       
        
    }

    // 欢迎页
    public function welcome(){
        $this->display();
    }

    
}