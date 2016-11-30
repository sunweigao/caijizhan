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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/Index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">笑话采集</span></div>
        </div>
        <!--<div class="search-wrap">-->
            <!--<div class="search-content">-->
                <!--<form action="/jscss/admin/design/index" method="post">-->
                    <!--<table class="search-tab">-->
                        <!--<tr>-->
                            <!--<th width="120"><a id="click"><i class="icon-font"></i>   点击采集分类</a></th>-->
                        <!--</tr>-->

                    <!--</table>-->
                <!--</form>-->
            <!--</div>-->
        <!--</div>-->

        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120"><h3><a><i class="icon-font"></i>  采集笑话</a></h3>   </th>
                        </tr>
                        <tr>
                            <th width="120">请先选择分类:</th>
                            <td>
                                <select name="search-sort" id="type" class="cate">
                                    <option value="">==请选择==</option>
                                    <?php if(is_array($categoryList)): foreach($categoryList as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>" class="url1" id="<?php echo ($val["url"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                                <!--<select class="region" name="country[]" style="background-color:#f6f6f6;">-->
                                    <!--<option value="0" selected="selected">请选择...</option>-->
                                    <!--<?php foreach($region as $key=>$val){?>-->
                                    <!--<option value="<?php echo $val['region_id']?>"><?php echo $val['region_name']?></option>-->
                                    <!--<?php }?>-->
                                <!--</select>-->
                            </td>
                            <!--<th width="70">标题:</th>-->
                            <!--<td><input class="common-text" placeholder="关键字" name="keywords" value="" id="tian" type="text"></td>-->
                            <!--<td><input class="btn btn-primary btn2" name="sub" value="查询" type="button" onclick="checktype()"></td>-->
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    

    <!--/main-->
</div>
</body>
</html>
<script src="/xiaomifeng/Public/Admin/js/jquery-1.7.2.js"></script>
<script src="/xiaomifeng/Public/Admin/js/jquery-2.1.1.min.js"></script>
<script>
    //采集
    $(document).on('click','#click',function(){
        var url ="http://www.xiao.com/practical/blog1/public/python/kaixinyike.py";
        $.get(url,function(result){
            if(result){
                str='<font color="green">      采集成功</font>'
                $("#click").after(str)
            }
        })
    })
    //查询分类
    $(document).on('change','.cate',function(){
        var id=$(this).val();
        var _this=$(this);
        var url="<?php echo U('Opus/cate');?>"
        $.get(url,{id:id},function(result){
            if(result.length)
            {
                str = '<select name="search-sort" id="type" class="cate2"><option value="">==请选择==</option>';
                //str = '<select class="region" name="country[]" style="background-color:#f6f6f6;"><option value="0" selected="selected">请选择...</option>';
                $(result).each(function(k,v){
                    str+="<option value="+v.id+" id="+ v.url+" class='url'>"+v.name+"</option>";
                })
                str+="</select>";
                _this.nextAll().remove();
                _this.after(str);
            }
        },'json');
    })
    //笑话采集
    $(document).on('change','.cate2',function(){
        var id=$(this).val();
        var path=$(".url").attr("id");
        var url ="http://www.xiao.com/practical/blog1/public/python/content.py";
        //location.href=url+'?id='+id+'&path='+path
        $.get(url,{id:id,path:path},function(result){
            if(result){
                str='<font color="green">      采集成功</font>'
                $(".cate2").after(str)
            }
        })
    })


    //反选
    $('#check_all').click(function(){
        $(":checkbox").each(function(){
            $(this).attr('checked',!$(this).attr('checked'));
        })
      })
    //单删
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
     //批删
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

    function checktype() {

       var type=document.getElementById('type').value
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
       ajax.open('get','<?php echo U('Opus/checktype');?>?type='+type+'&&tian='+tian);
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
        ajax.open('get',"<?php echo U('Opus/con');?>?page="+page);
        ajax.send();
    }
    
   b=0 
    function zengdian(id)
    {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(ajax.readyState==4 )
            { 

              if(ajax.responseText)
              {
                  var count = document.getElementById('zengdian_'+id).innerHTML;
                  var c = parseInt(count);
                 b= document.getElementById('zengdian_'+id).innerHTML=c+1;
                  
                  
              }
            }
        }
        ajax.open('get',"<?php echo U('Opus/zengdian');?>?art_id="+id);
        ajax.send(null);
    }
   
 a=0 
    function zengzan(id)
    {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(ajax.readyState==4 )
            { 

              if(ajax.responseText)
              {
                  var count = document.getElementById('zengzan_'+id).innerHTML;
                  var c = parseInt(count);
                 a= document.getElementById('zengzan_'+id).innerHTML=c+1;
                  
                  
              }
            }
        }
        ajax.open('get',"<?php echo U('Opus/zengzan');?>?art_id="+id);
        ajax.send(null);
    }
</script>