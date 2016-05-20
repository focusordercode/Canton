<?php
/*
抽象翻页类
*/
namespace Think;//命名空间

abstract class abstractPage{
    protected $pageIdName;//翻页$_GET中的键名
 
    protected $showNum;//每页显示多少条
    protected $allNum;//总条数
 
    protected $allPageNum;//总页数
    public $nowPageNum;//当前第几页
 
    protected $lastPageNum;//上一页页码
    protected $nextPageNum;//下一页页码
 
    protected $linkStartPageNum;//翻页代码循环的，开始页码
    protected $linkEndPageNum;//翻页代码循环的，结束页码
 
    public $limitStartNum;//给mysql查询语句用的 limit 开始值
 
 
    /**
    *   构造函数
    * @param    integer     $showNum            每页显示多少条
    * @param    integer     $allNum             总条数
    * @param    integer     $showLinkNum        显示连接数
    * @param    string      $pageIdName         翻页键名
    */
    public function __construct($showNum,$allNum,$showLinkNum=10,$pageIdName='pageId'){
        $this->showNum=(int)$showNum;
        $this->allNum=(int)$allNum;
        $this->showLinkNum=(int)$showLinkNum;
        $this->pageIdName=$pageIdName;
 
        $this->rule();
    }
 
    /**
    *   翻页规则方法
    */
    private function rule(){
        //总页数
        $this->allPageNum=ceil($this->allNum/$this->showNum);
 
        //当前第几页
        $this->nowPageNum=!empty($_GET[$this->pageIdName])?(int)$_GET[$this->pageIdName]:1;
        //验证当前页 的页码
        //不能大于：总页数
        $this->nowPageNum=min($this->nowPageNum,$this->allPageNum);
        //不能小于1.
        $this->nowPageNum=max($this->nowPageNum,1);
        //上一页
        $this->lastPageNum=$this->nowPageNum-1;
        //下一页
        $this->nextPageNum=$this->nowPageNum+1;
        //验证////若没有下一页
        $this->nowPageNum==$this->allPageNum && $this->nextPageNum=1;
 
        //当前页码前后，应该有几个连接
        if( ($this->showLinkNum-1)%2==0 ){//若没有余数 
            $pNum1=$pNum2=($this->showLinkNum-1)/2;
        }else{
            $pNum1=($this->showLinkNum-2)/2;   
            $pNum2=$pNum1+1;
        }
       //  1 + + *  +  +7   0   6
        //翻页代码循环的，开始页码
        $this->linkStartPageNum=$this->nowPageNum-$pNum1;
        //翻页代码循环的，结束页码
        $this->linkEndPageNum=$this->nowPageNum+$pNum2;

        //验证，如果开始循环小于1，则将其变成1，并且将循环结束增加相应数量
        if($this->linkStartPageNum<1){
            $this->linkEndPageNum+=1-$this->linkStartPageNum;
            $this->linkStartPageNum=1;
 
            //循环结束页，不能大于总页数//若不验证，则显示1，总2条时，会出现问题
            $this->linkEndPageNum=min($this->linkEndPageNum,$this->allPageNum);
        }
        //验证，如果结束循环大于总页数，则将其变成总页数，并且将循环开始减少相应数量
        if($this->linkEndPageNum>$this->allPageNum){
            $this->linkStartPageNum-=$this->linkEndPageNum-$this->allPageNum;
            $this->linkEndPageNum=$this->allPageNum;
 
            //循环开始页，不能小于1
            $this->linkStartPageNum=max($this->linkStartPageNum,1);
        }
 
 
        //limit开始值
        $this->limitStartNum=($this->nowPageNum-1)*$this->showNum;
    }
 
 
    /**
    *   获得当前url地址
    * @return       string  返回翻页的url
    */
    final protected function getUrl() {
        //获得当前页url
        $url="http://".$_SERVER["HTTP_HOST"].(($_SERVER["SERVER_PORT"]==="80")?"":$_SERVER["SERVER_PORT"]).$_SERVER["PHP_SELF"].'?';
 
        if(!empty($_GET)) {//如果有get值
            $g=$_GET;
 
            //将存在的翻页id删除。在循环翻页代码时，会重新组装
            if(isset($g[$this->pageIdName])) {
                unset($g[$this->pageIdName]); 
            }
 
            //删除后，重新组装成url问号后面的get参数
            //$url.=http_build_query($g).(empty($g)?'':'&');
            $url.=empty($g)?'':http_build_query($g).'&';
        }
        return $url;        
    }
 
 
    /**
    *   返回mysql limit 开始条数
    * @return       string  返回html代码
    */
    public function getlimitStartNum(){
        return $this->limitStartNum;
    }
 
    /**
    *   获得翻页代码
    * @return       string  返回html代码
    */
    final public function getCode(
                            $sort=array('first','last','links','next','end','allPageNum'),
                            $templatePath=''
                            ){
        if(empty($templatePath)){//如果没有传模板路径
            return $this->createHtml($sort);
        }else{
            return $this->renderHtml($templatePath);
        }
    }
     
    /**
    *   抽象方法：创建翻页html
    * @param    array   $sort   排序数组。为了显示顺序
    * @return       string  返回html代码
    */
    abstract protected function createHtml(array $sort);
 
 
    /**
    *   渲染模板html：有模板路径时
    * @param    array   $templatePath       模板路径
    * @return       string  返回html代码
    */
    protected function renderHtml($templatePath){
            if($this->allNum==0) return '';//若总数为0
 
            $url=$this->getUrl();
            ob_start();//开启缓存
            require_once($templatePath);//载入模板路径
            return  ob_get_clean();
    }
}
/*
*分页实现类
*/

class page_show extends abstractPage{
    protected function createHtml(array $sort){
        if($this->allNum == 0) return "";
        $url=$this->getUrl();
        $html=array('first'=>'','last'=>'','links'=>'','next'=>'','end'=>'','allPageNum'=>'');
        //首页
        $html['first']="<a href='".$url.$this->pageIdName."=1'>首页</a> ";
        //上一页
        $html['last']="<a href='".$url.$this->pageIdName.'='.$this->lastPageNum."'>上一页</a> ";
        //links
        $temp='';
        for($i=$this->linkStartPageNum;$i<=$this->linkEndPageNum;$i++){
            if($i==$this->nowPageNum){
                $temp.="<span style='color:red;'>".$i."</span> ";
                continue;
            }
            $temp.="<a href='".$url.$this->pageIdName.'='.$i."'>".$i."</a>".' ';
        }
        $html['links']=$temp;
        //下一页
        $html['next']="<a href='".$url.$this->pageIdName.'='.$this->nextPageNum."'>下一页</a> ";
        //末页
        $html['end']="<a href='".$url.$this->pageIdName.'='.$this->allPageNum."'>末页</a> ";
        //总页数
        $html['allPageNum']=$this->allPageNum.'页';
        //排序输出
        $page='';
        if(!empty($sort)){
            foreach($sort as $val){
                $page.=$html[$val];
            }
        }else{
            $page=implode(' ',$html);
        }
        return $page;
    }
}       