<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>后台</title>
    <link rel="stylesheet" href="/Canton/Public/admin/css/panel.css">
    <script src="/Canton/Public/admin/js/jquery.min.js"></script>
</head>
<body>
    <!-- 左边导航栏开始 -->
    <div class="main-left fl fix">
        <!-- 网站logo -->
        <a href="<?php echo U('index');?>" class="panel-logo">
            <img src="/Canton/Public/admin/images/logo.png" width="199" height="65" alt="">
        </a>
        <ul>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-1.png" alt="">
                    <span>网站首页</span>
                    <i></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-2.png" alt="">
                    <span>发布</span>
                    <i></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-3.png" alt="">
                    <span>管理</span>
                    <i></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-4.png" alt="">
                    <span>营销</span>
                    <i></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-5.png" alt="">
                    <span>外观</span>
                    <i></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-6.png" alt="">
                    <span>我的应用</span>
                    <i></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-7.png" alt="">
                    <span>应用商店</span>
                    <i></i>
                </a>
            </li>
            <li>
                <img src="/Canton/Public/admin/images/panel-8.png" alt="">
                <span>用户</span>
                <i></i>
                <div class="drop-list">
                    <a href="#" class="drop-listing">用户管理</a>
                    <a href="#" class="drop-listing">权限管理</a>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-9.png" alt="">
                    <span>安全</span>
                    <i></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/Canton/Public/admin/images/panel-10.png" alt="">
                    <span>设置</span>
                    <i></i>
                    <!-- <div class="drop-list">
                        <a class="drop-listing">系统配置</a>
                    </div> -->
                </a>
            </li>
            <li>
                <!-- 地址切换函数 -->
                <a onclick="addSrc('sysconfig')" id="sysconfig" name="<?php echo U('Sysconfig/sysconfig');?>" href="javascript:;">
                    <img src="/Canton/Public/admin/images/panel-10.png" alt="">
                    <span>系统配置</span>
                    <i></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- 左边导航栏结束 -->
    <!-- 右边开始 -->
    <div class="mainr fix">
        <!-- 右边头部开始 -->
        <div class="mainr-top fix">
            <div class="mainr-top-nav fix">
                <ul>
                    <li><a href="#">简体中文</a></li>
                    <li>/&nbsp;<a href="#">后台首页</a></li>
                </ul>
            </div>
            <div class="mainr-top-info fix">
                <div class="mainr-top-info1 mainr-top-lang">
                    <span>简体中文</span>
                    <i class="caret"></i>
                    <div class="mainr-top-list mainr-top-list1">
                        <a href="#">繁体中文</a>
                    </div>
                </div>
                <div class="mainr-top-info1 mainr-top-user">
                    <span>admin</span>
                    <i class="caret"></i>
                    <div class="mainr-top-list mainr-top-list2">
                        <a href="<?php echo U('Login/login_out');?>">退出</a>
                    </div>
                </div>
            </div>
        </div>
         <!-- iframe标签引用 -->
        <div id="right-content" class="right-content">
            <div class="content">
                <div id="page_content">
                    <iframe id="menuFrame" name="menuFrame" src="" style="overflow:visible;" scrolling="yes" frameborder="no" width="100%" height="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- 右边结束 -->
    <!-- 右边头部结束 -->
    <script type="text/javascript">
        $(document).ready(function(){
            //初始化
            if(($("#menuFrame").attr("src")) == ""){
                $("#menuFrame").attr("src","<?php echo U('Index/welcome');?>");
            }

            //站点语言切换以及退出操作
            $('.mainr-top-lang').click(function(){
                $('.mainr-top-list1').toggle(200);
            });
            $('.mainr-top-user').click(function(){
                $('.mainr-top-list2').toggle(200);
            });
        });
        function addSrc(id){
            var src = $("#"+id).attr("name");
            $("#menuFrame").attr("src" ,src);
        }
    </script>
</body>
</html>