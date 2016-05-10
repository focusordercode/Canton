<?php
namespace  Home\Controller;
use Think\Controller;

class ContentController extends Controller{
	//添加产品内容
	public function contentAdd(){
		$title=I('post.title');
		$content=I('post.content');
		$name=I('post.name');
		$date=date('Y-m-d H:i:s',time());
		$columnid=I('post.columnid');
		$grade=I('post.grade');
        
        $test=\Think\InfoContent::AddContent($title,$content,$name,$columnid,$grade);
        if($test==1){
        	$this->success("添加成功！");
        }else{
        	$this->error("添加失败！");
        }
	}
	
    //删除产品内容
	public function contentDel(){
		$contentid=I('post.contentid');
		$test=\Think\InfoContent::DelContent($contentid);
		if($test==1){
        	$this->success("删除成功！");
        }else{
        	$this->error("删除失败！");
        }
	}

	//查询所有产品标题
	public function titleSel(){
		$res=\Think\InfoContent::SelTitle();
		$this->assign('res',$res);
		$this->display();
	}

	//模糊查询产品标题
	public function titleVague(){
		$title=I('post.title');
		$res=\Think\InfoContent::VagueTitle($title);
		$this->assign('res',$res);
		$this->display();
	}

	//查询产品内容
	public function ContentSel(){
		$contentid=I('post.contentid');
		$res=\Think\InfoContent::SelContent($contentid);
		$grade=$res['grade'];
		if($grade==1){
			$this->assign('res',$res);
		    $this->display();
		}elseif($grade==2){
			$id=$_SESSION['userid']
		    if($this->checkUserRoot($id)){
		    	$this->assign('res',$res);
		        $this->display();
		    }else{
		    	$this->error("你没有权限查看该内容！");
		    }
		}
	}

	//修改产品内容
	public function contentUpda(){
		$contentid=I('post.contentid');
		$title=I('post.title');
		$content=I('post.content');
		$grade=I('post.grade');
		$test=\Think\InfoContent::UpdaContent($contentid,$title,$content,$grade);
		if($test==1){
        	$this->success("修改成功！");
        }else{
        	$this->error("修改失败！");
        }
	} 
}