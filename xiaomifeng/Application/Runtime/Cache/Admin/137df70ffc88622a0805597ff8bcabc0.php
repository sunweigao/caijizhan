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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/Index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Nav/index');?>">广告管理</a><span class="crumb-step">&gt;</span><span>新增广告</span></div>
        </div>
         <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('Nav/insert');?>" method="post" id="myform" name="myform" enctype="multipart/form-data" onsubmit="return fun()">
               
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="nav_name" size="50" value="" type="text" onblur="checkTitle()"> <span id='s_title'></span>
                                </td>
                               
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>网址：</th>
                                <td>
                                    <input class="common-text required" id="href" name="nav_href" size="50" value="" type="text" onblur="checkHref()"> <span id='s_href'></span>
                                </td>
                            </tr>
                            <tr>
                                <th>作者：</th>
                                <td><input type="hidden" name="username" value="<?php echo $_COOKIE['uname']?>"><span class="common-text" name="username" size="50" ><?php echo $_COOKIE['uname']?></span></td>
                            </tr>
                            <tr>
                                <th>选择图片：</th>
                                <td>
                                        <input type="file" name="nav_image">
                                 </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>开始时间</th>
                                <td>
                                    <input class="common-text required" id="starttime" name="nav_starttime" size="50" value="" type="text" onblur="checkStarttime()"> <span id='s_starttime'></span>
                                </td>
                               
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>结束时间</th>
                                <td>
                                    <input class="common-text required" id="endtime" name="nav_endtime" size="50" value="" type="text" onblur="checkEndtime()"> <span id='s_endtime'></span>
                                </td>
                               
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序</th>
                                <td>
                                    <input class="common-text required" id="limit" name="nav_limit" size="50" value="" type="text" onblur="checkLimit()"> <span id='s_limit'></span>
                                </td>
                               
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>是否展示</th>
                                <td>
                                    <input type="radio" name="nav_status" id="" value="0" checked="checked">是
                                    <input type="radio" name="nav_status" id="" value="1">否
                                    <span id='s_t'></span>
                                </td>
                               
                            </tr>
                             <th width="120"><i class="require-red">*</i>位置</th>
                           <td>
                               <select name="width_id" id="">
                                <?php if(is_array($data)): foreach($data as $key=>$cv): ?><option value="<?php echo ($cv["width_id"]); ?>">
                                    	<?php echo ($cv["width_width"]); ?>px x <?php echo ($cv["width_light"]); ?>px 
                                    	<?php if($cv["width_main"] == '0'): ?>上部
                                    	<?php else: ?>
                                    		下部<?php endif; ?>
                                    </option><?php endforeach; endif; ?>
                                </select>
                            </td>
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
<script src="/xiaomifeng/Public/Admin/js/jquery-1.7.2.js"></script>
<script type="text/javascript">

	// 表单提交事件
	function fun (){
		return checkTitle()&&checkHref()&&checkStarttime()&&checkEndtime();
	}

	// 标题验证
	function checkTitle () {
		var title = $("#title").val();
		if(title==''){
			$("#s_title").html("<font color='red'>提示：标题不能为空</font>");
			return false;
		}else{
			$("#s_title").html("<font color='green'>√</font>");
			return true;
		}
	}

	// 验证网址
	function checkHref () {
		var href = $("#href").val();
		if(href==''){
			$("#s_href").html("<font color='red'>提示：网址不能为空</font>");
			return false;
		}else{
			$("#s_href").html("<font color='green'>√</font>");
			return true;
		}
	}

	// 验证开始时间
	function checkStarttime () {
		var starttime = $("#starttime").val();
		if(starttime==''){
			$("#s_starttime").html("<font color='red'>提示：开始时间不能为空</font>");
			return false;
		}else{
			$("#s_starttime").html("<font color='green'>√</font>");
			return true;
		}
	}

	// 验证结束时间
	function checkEndtime () {
		var endtime = $("#endtime").val();
		if(endtime==''){
			$("#s_endtime").html("<font color='red'>提示：结束时间不能为空</font>");
			return false;
		}else{
			$("#s_endtime").html("<font color='green'>√</font>");
			return true;
		}
	}
	// 验证排序
	function checkLimit () {
		var limit = $("#limit").val();
		var reg = /^\d{0,}$/;
		if(limit==''){
			$("#s_limit").html("<font color='red'>提示：排序不能为空</font>");
			return false;
		}else if(reg.test(limit)){
			$("#s_limit").html("<font color='green'>√</font>");
			return true;
		}else{
			$("#s_limit").html("<font color='red'>提示：排序必须是数字</font>");
			return false;
		}
	}

</script>