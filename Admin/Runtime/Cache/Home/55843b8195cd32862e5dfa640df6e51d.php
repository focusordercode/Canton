<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>福克斯德有限公司管理后台</title>

<link rel="stylesheet" href="/focusor/Public/index/css/index.css" type="text/css" media="screen" />

<script type="text/javascript" src="/focusor/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/focusor/Public/index/js/tendina.min.js"></script>
<script type="text/javascript" src="/focusor/Public/index/js/common.js"></script>

</head>
<body>
    <!--顶部-->
    <div class="top">
            <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #fff">企业管理中心</h1></span></div>  
            <div id="ad_setting" class="ad_setting">
                
                <a  href="javascript:; " style="color:red"><?php echo $_SESSION["username"]?></a>         
                <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                    
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-signout glyph-icon"></i> <span class="font-bold"  id="logo_out">退出</span> </a> </li>
                </ul>
                <img class="use_xl" src="/focusor/Public/index/images/right_menu.png" />
            </div>
    </div>
    <!--顶部结束-->
    <!--菜单-->
    <div class="left-menu">
        <ul id="menu">
            <li class="menu-list">
               <a style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>查询管理<s class="sz"></s></a>
                <ul>
                    <li><a href="/focusor/admin.php/home/Search/index" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>查询用户</a></li>
                   <li><a href="/focusor/admin.php/home/Search/indexTwo" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>添加用户</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
    
    <!--菜单右边的iframe页面-->
    <div id="right-content" class="right-content">
        <div class="content">
            <div id="page_content">
                <iframe id="menuFrame" name="menuFrame" src="/focusor/admin.php/home/index/main" style="overflow:visible;"
                        scrolling="yes" frameborder="no" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
</body>
</html>
<script>
$("#logo_out").click(function(){
    //alert();
    $.ajax({
        'type'  : 'POST',
        'data'  : '',
        'url'   : "<?php echo '/focusor/admin.php/Home/Login/login_out' ?>",
        success : function(msg){
            window.location.href = "<?php echo '/focusor/admin.php/Home/Login/login' ?>";   
        }
    });
});
</script>