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

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/Index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-step">&gt;</span><span>修改密码</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form class="form-horizontal" role="form">
                 <input type="hidden" id='u_id' value="<?php echo $_COOKIE['id']?>">
                 <div class=".container" style="width:250%;">
      <div class="form-group">
        <label for="oldpass" class="col-sm-2 control-label">旧密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" style="width:250px;" id="oldpass" placeholder="Old Password"><span id="oldpassTip" style="display:none;color:red;"></span>
        </div>
      </div>
      <div class="form-group">
        <label for="newpass" class="col-sm-2 control-label">新密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" style="width:250px;" id="newpass" placeholder="New Password"><span id="newpassTip" style="display:none;color:red;"></span>
        </div>
      </div>
      <div class="form-group">
        <label for="newpassAgain" class="col-sm-2 control-label">再次确认新密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" style="width:250px;" id="newpassAgain" placeholder="Again New Password"><span id="newpassAgainTip" style="display:none;color:red;"></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">  </label>
         <button type="submit" class="btn btn-primary" id="submit" style="text-align:center;">确认修改</button>
      </div>
        </div>
                </form>
            <div id="modifySuccess" class="alert alert-success alert-dismissable" style="width:50%;margin-left:40%;display:none;">
          <strong>Success!</strong> 你已成功修改密码！
        </div>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script type="text/javascript" charset="utf-8" src="/xiaomifeng/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/xiaomifeng/Public/ueditor/ueditor.all.min.js"> </script>

<script src="/xiaomifeng/Public/Admin/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var error = false;
        var id=$('#u_id').val();
        $("#oldpass").blur(function(){

            var oldpass = $("#oldpass").val();
            if(oldpass =='') {
                showError('oldpass', '密码不能为空');
                error = true;
                return;
            }

            $.post("<?php echo U('cha');?>", {id:id,oldpass:oldpass}, function(data){
                if(data) {
                    $("#oldpass").css({"border-color":"green"});
                    $("#oldpassTip").css({"display":"none"});
                } else {
                    showError('oldpass', '密码错误');
                    error = true;
                }
            });
        });

        $("#newpass").blur(function(){
            var newpass = $("#newpass").val();
            if(newpass == '') {
                showError('newpass', '新密码不能为空');
                error = true;
            }
            else {
                $("#newpass").css({"border-color":"green"});
                $("#newpassTip").css({"display":"none"});
            }
        });

        $("#newpassAgain").blur(function(){
            var newpass = $("#newpass").val();
            if(newpass == '') {
                showError('newpass', '新密码不能为空');
                error = true;
                return;
            }

            var newpassAgain = $("#newpassAgain").val();
            if(newpassAgain != newpass) {
                showError('newpassAgain', '与输入的新密码不一致');
                error = true;
            }
            else {
                $("#newpassAgain").css({"border-color":"green"});
                $("#newpassAgainTip").css({"display":"none"});
            }
        });
        
        $("#submit").click(function(event){
            $("#username").blur();
            $("#oldpass").blur();
            $("#newpass").blur();
            $("#newpassAgain").blur();

            if(!error) {
                var username = $("#username").val();            
                var newpass = $("#newpass").val();
                $.post("<?php echo U('add');?>", {id:id, newpass:newpass}, function(data) {
                    $("#modifySuccess").css({'display':'inline'});
                });
            }

            event.preventDefault();
            return false;
        });
    });

    function showError(formSpan, errorText) {
        $("#" + formSpan).css({"border-color":"red"});
        $("#" + formSpan + "Tip").empty();
        $("#" + formSpan + "Tip").append(errorText);;
        $("#" + formSpan + "Tip").css({"display":"inline"});
    }
</script>