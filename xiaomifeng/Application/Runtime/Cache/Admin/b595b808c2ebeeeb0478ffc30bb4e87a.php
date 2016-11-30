<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <title></title>
	    <link rel="stylesheet" type="text/css" href="/xiaomifeng/Public/Admin/css/common.css"/>
	    <link rel="stylesheet" type="text/css" href="/xiaomifeng/Public/Admin/css/main.css"/>
	    <script type="text/javascript" src="/xiaomifeng/Public/Admin/js/libs/modernizr.min.js"></script>
</head><!--外部样式模版head-->
<body>
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
<div class="container clearfix">
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
    <div class="main-wrap">
        
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">                    
                    <a href="<?php echo U('Opus/opus_con_add');?>"><i class="icon-font">&#xe005;</i>一键采集</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">Apache/2.4.10 (Win64) PHP/5.5</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
                    </li>
                    <li>
                        <label class="res-lab">静静设计-版本</label><span class="res-info">v-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info"><?php echo date('Y-m-d H:i:s')?></span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info">www.liu.com[ 127.0.0.1 ]</span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info">127.0.0.1</span>
                    </li>
                </ul>
            </div>
        </div>
    <!--/main-->
</div>
</body>
</html>