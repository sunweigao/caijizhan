<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html >
 <head>
    <meta charset="UTF-8">
    <title></title>
	    <link rel="stylesheet" type="text/css" href="/practical/blog1/Public/Admin/css/common.css"/>
	    <link rel="stylesheet" type="text/css" href="/practical/blog1/Public/Admin/css/main.css"/>
	    <script type="text/javascript" src="/practical/blog1/Public/Admin/js/libs/modernizr.min.js"></script>
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
                     
                        <a href="javascript:void(0)" id="delall"><i class="icon-font"></i>批量删除</a>
                        
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%">
                                <input class="allChoose" id="check_all" type="checkbox" >
                                <span>全选</span>
                            </th>
                            <th>文章标题</th>
                            <th>评论内容</th>
                            <th>评论时间</th>
                            <th>操作</th>
                        </tr>
                        
                        <?php if(is_array($res)): foreach($res as $key=>$v): ?><tr id="k_<?php echo ($v["c_id"]); ?>" name="k_<?php echo ($v["c_id"]); ?>">
                            <td class="tc">
                                <input type="checkbox" name="xuan" value="<?php echo ($v["c_id"]); ?>">
                            </td>
                            <td><?php echo ($v["title"]); ?></td> 
                            <td><?php echo ($v["art_comment"]); ?></td>    
                            <td><?php echo ($v["comment_time"]); ?></td>
                           
                            <td>
                                
                                <a class="link-del" href="javascript:void(0)" id="<?php echo ($v["c_id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                        
                    </table>
                </div>
            </form>
        </div>
    </div>
    

    <!--/main-->
</div>
</body>
</html>
<script src="/practical/blog1/Public/Admin/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
    $('.link-del').click(function(){
       var id=$(this).attr('id');
       //alert(id);
       $.ajax({  
            type:'GET',  
            url:'<?php echo U('del');?>',  
            data:{ 
                c_id:id,   
            },  
            success:function(msg){  
                if(msg){  
                 //alert(1);
                 $('#k_'+msg).remove();
                }   
     }
    })
    });
    $('#delall').click(function(){
        var box=$("input[name=xuan]:checked");
        var i=box.length;
        if(!i){
         alert('至少选择一项');
         return;
        }
        if(confirm("确定要删除所选项目？")) {
        var checkedList = new Array();
        $("input[name='xuan']:checked").each(function() {
        checkedList.push($(this).val());
        });
        //alert(checkedList);
        $.ajax({  
                type:'GET',  
                url:"<?php echo U('delall');?>",  
                data:{   
                    id:checkedList.toString()  
                },
                dataType:'json',  
                success:function(msg){
                var count=checkedList.length;
                for(var i=0;i<count;i++){
                 $('#k_'+checkedList[i]).remove();   
                }        
                }  
            }) 
        }
      })
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
        ajax.open('get',"<?php echo U('Opus/opus_con');?>?page="+page);
        ajax.send();
    }
    $('#check_all').click(function(){
        $(":checkbox").each(function(){
            $(this).attr('checked',!$(this).attr('checked'));
        })
      })

</script>