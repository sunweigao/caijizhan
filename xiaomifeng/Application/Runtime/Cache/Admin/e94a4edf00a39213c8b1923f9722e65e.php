<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <title></title>
	    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
	    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
	    <script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
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
                <li><a href="#">博主:<?php echo $_COOKIE['uname']?></a></li>
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
                        <li><a href="<?php echo U('Opus/con');?>"><i class="icon-font">&#xe008;</i>博文管理</a></li>
                       
                        <li><a href="<?php echo U('Cation/Index');?>"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="<?php echo U('Index/comment');?>"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <!--<li><a href="<?php echo U('Opus/opus_con');?>"><i class="icon-font">&#xe033;</i>广告管理</a></li>-->
                    </ul>
                </li>
                
            </ul>
        </div>
    </div><!--左侧模版left-->   
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/Index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Opus/opus_con');?>">博文管理</a><span class="crumb-step">&gt;</span><span>新增博文</span></div>
        </div>
         <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('Opus/insert');?>" method="post" id="myform" name="myform" enctype="multipart/form-data" onsubmit="return check()">
               
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                           <td>
                               <select name="cate_id" id="">
                                <?php if(is_array($cate_data)): foreach($cate_data as $key=>$cv): ?><option value="<?php echo ($cv["cate_id"]); ?>"><?php echo ($cv["cate_name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text" onblur="shititle()"> <span id='s_t'></span>
                                </td>
                               
                            </tr>
                            <tr>
                                <th>作者：</th>
                                <td><input class="common-text" name="author" size="50" value="<?php echo $_COOKIE['uname']?>" type="text"></td>
                            </tr>
      <!--                       <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="smallimg" id="" type="file"><input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/></td>
                            </tr> -->
                            <tr>
                                <th>选择图片：</th>
                                <td>
                                        <input type="file" name="source_img">
                                 </td>
                            </tr>
                            </tr>

                            <tr>
                                <th>简短介绍</th>
                                <td><textarea name="art_desc" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="2"></textarea></td>
                            </tr>
                             <tr>
                                <th>内容</th>
                                <td><textarea name="content" class="common-textarea" id="my_editor" cols="30" style="width: 98%;" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>

<script type="text/javascript">
    var ue = UE.getEditor('my_editor');//百度编辑器
    function shititle () {
        var title=document.getElementById('title').value;
        var s_t=document.getElementById('s_t');
        if (title!='')
         {
            s_t.innerHTML='';
            return true;
        }
        else
        {
            s_t.innerHTML='标题不能为空';
            
            return false;
        }
    }
    function check () 
    {
        if (shiJtitle()==true) 
        {
            return true;    
        }else
        {
            return false;
        }
    }

</script>