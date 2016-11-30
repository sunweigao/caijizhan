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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/Index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">分类管理</span></div>
        </div>
       
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('Cation/c_add');?>"><i class="icon-font"></i>新增分类</a>
                        <a id="batchDel" href="javascript:void(0)" onclick="delall()"><i class="icon-font"></i>批量删除</a>
                        
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%">
                                <input class="allChoose" id="check_all" type="checkbox">
                                <span>全选</span>
                            </th>
                            <th>ID</th>
                            <th>分类</th>
                            <th>操作</th>
                        </tr>
                        
                        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr id="k_<?php echo ($v["cate_id"]); ?>" name="k_<?php echo ($v["art_id"]); ?>">
                            <td class="tc">
                                <input type="checkbox" name="xuan" value="<?php echo ($v["cate_id"]); ?>">
                            </td>
                            <td><?php echo ($v["cate_id"]); ?></td>    
                            <td><?php echo ($v["cate_name"]); ?></td>
                           
                            <td>
                                
                                <a class="link-del" href="javascript:void(0)" id="<?php echo ($v["cate_id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                        
                    </table>
                   <!--  <div class="list-page"><?php echo ($str); ?>当前为<?php echo ($page); ?>页</div> -->
                </div>
            </form>
        </div>
    </div>
    

    <!--/main-->
</div>
</body>
</html>
<script src="/xiaomifeng/Public/Admin/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
    $('#check_all').click(function(){
        $(":checkbox").each(function(){
            $(this).attr('checked',!$(this).attr('checked'));
        })
      })
    $('.link-del').click(function(){
       var id=$(this).attr('id');
       //alert(id);
       $.ajax({  
            type:'GET',  
            url:'<?php echo U('del');?>',  
            data:{ 
                id:id,   
            },  
            success:function(msg){  
                if(msg){  
                 //alert(1);
                 $('#k_'+msg).remove();
                }   
     }
    })
    });
    function checktype() {
       var tian=document.getElementById('tian').value
       var ajax = new XMLHttpRequest();
       ajax.onreadystatechange = function() {
           if (ajax.readyState == 4 && ajax.status == 200) {
               var response = ajax.responseText;
               if (ajax.responseText==0) 
                {
                    alert('请填写要查询的关键字')
                }else if (ajax.responseText==-1) 
                {
                    alert("没有相关数据,请重新输入")
                }else
                {
                    document.getElementById('ti').innerHTML=response
                }
           }
       };
       ajax.open('get','<?php echo U('Cation/checktype');?>?tian='+tian);
       ajax.send();
    }
    function del(id) {      
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
            if (ajax.readyState == 4 && ajax.status == 200) 
            {
                var response = ajax.responseText; 
                
                      document.getElementById('k_'+id).remove();
                
                  
            }
        }
        ajax.open('get', "<?php echo U('Opus/del');?>?id="+id);
        ajax.send();
    }
    function delall() {
        var xuan=document.getElementsByName('xuan')
        var arr=Array();
        var j=0;
        for (var i = 0; i < xuan.length; i++) 
        {
            if (xuan[i].checked==true) 
            {
                arr[j]=xuan[i].value;
                j++;
            }
        }
        str=arr.join(',')
       
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() 
        {
            if (ajax.readyState == 4 && ajax.status == 200) 
            {
                    var response = ajax.responseText;   
                for (var i = 0; i < arr.length; i++)
                {   //长度应该小于被选数组的长度                {
                    document.getElementById('k_'+arr[i]).remove()//arr[i]数组中循环键值得到的值 从arr[j]=xuan[i].value;得到
                }
            }
        };
        ajax.open('get', "<?php echo U('Opus/del');?>?id="+str);
        ajax.send();
    }
    function change(id) {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById('zhi'+id).innerHTML=ajax.responseText;
            }
        };
        ajax.open('get', "<?php echo U('Opus/chang');?>?id="+id);
        ajax.send();
    }
     function fun(page){
        var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4){
                document.getElementById('ti').innerHTML=ajax.responseText;
            }
        }
        //ajax.open('get',"<?php echo U('Opus/opus_con');?>page="+page);
        ajax.open('get',"<?php echo U('Cation/index');?>?page="+page);
        ajax.send();
    }
    // function checkall() {
    //   var xuan=document.getElementsByName('xuan')
    //   var check_all=document.getElementById('check_all')
    //   if (check_all.checked==true) 
    //   {
    //     for(i in xuan){

    //         xuan[i].checked=true;
    //     }
        
    //   }else {
    //     for(i in xuan){
    //       xuan[i].checked=false;
    //     }
    //   }
        
    // }

</script>