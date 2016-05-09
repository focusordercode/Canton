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

	//修改产品内容
	public function contentUpda(){
		$contentid=I('post.contentid');
		$title=I('post.title');
		$content=I('post.content');
		$test=\Think\InfoContent::UpdaContent($contentid,$title,$content);
		if($test==1){
        	$this->success("修改成功！");
        }else{
        	$this->error("修改失败！");
        }
	} 
}