<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html >
 <head>
    <meta charset="UTF-8">
    <title></title>
	    <link rel="stylesheet" type="text/css" href="/xiaomifeng/Public/Admin/css/common.css"/>
	    <link rel="stylesheet" type="text/css" href="/xiaomifeng/Public/Admin/css/main.css"/>
	    <script type="text/javascript" src="/xiaomifeng/Public/Admin/js/libs/modernizr.min.js"></script>
</head><!--外部样式模版head-->

<body id="ti">
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo U('Index/Index');?>">首页</a></li>
               
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo $_COOKIE['uname']?></a></li>
                <li><a href="<?php echo U('Update/index');?>">修改密码</a></li>
                <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
</div><!--头部模版header-->
<div   class="container clearfix">
<div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Opus/con');?>"><i class="icon-font">&#xe008;</i>采集管理</a></li>
                       
                        <li><a href="<?php echo U('Cation/Index');?>"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="<?php echo U('Index/comment');?>"><i class="icon-font">&#xe012;</i>文章管理</a></li>
                        <!--<li><a href="<?php echo U('Opus/opus_con');?>"><i class="icon-font">&#xe033;</i>广告管理</a></li>-->
                        <li><a href="<?php echo U('Nav/index');?>"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                        <li><a href="<?php echo U('User/index');?>"><i class="icon-font">&#xe033;</i>用户管理</a></li>
                        <li><a href="<?php echo U('Type/types');?>"><i class="icon-font">&#xe033;</i>分类</a></li>
                        <li><a href="<?php echo U('Com/comment');?>"><i class="icon-font">&#xe033;</i>评论管理</a>
                        <li><a href="<?php echo U('Keyword/word');?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;替换关键字</a></li>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div><!--左侧模版left-->   
    <!--/sidebar-->
    <div  class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/Index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">添加关键字</span></div>
        </div>
       
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                     
                        <a href="javascript:void(0)" id="delall"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                      评论关键字:<input type="text" name="u_name">
                      <input type="submit" value="添加">
                        <br/>
                    </table>
                </div>
            </form>
        </div>
    </div>
    

    <!--/main-->
</div>
</body>
</html>