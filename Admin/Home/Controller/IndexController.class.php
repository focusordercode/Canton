<?php 
namespace Home\Controller;
use Home\Controller\AuthController;
use Think\User;
class IndexController extends AuthController {
    public function index(){

        $a=$this->checkUser();
        if(isset($_SESSION['username'])){
            //跳转到首页
            //$this->display();
            
            if ($a==1) {

                
                /*$arr=\Think\User::SelAll();
                for($i=0;$i<count($arr);$i++){
                    foreach ($arr[$i] as $k => $v) {
                         echo $arr[$i][$k] = $v." ";
                     }
                    echo "<br />";
                }*/
                    $this->display();
                
            }else{
            	$this->error("你没有权限！",U('Login/login'));
            }


        }  
        else{
            
         $this->redirect('Login/login');
        }
        
    }

    
}