<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Wopop</title>
<link href="/xiaomifeng/Public/Admin/Wopop_files/style_log.css" rel="stylesheet" type="text/css">
<!--< link rel="stylesheet" type="text/css" href="/xiaomifeng/Public/Admin/Wopop_files/style.css">
<link rel="stylesheet" type="text/css" href="/xiaomifeng/Public/Admin/Wopop_files/userpanel.css">
<link rel="stylesheet" type="text/css" href="/xiaomifeng/Public/Admin/Wopop_files/jquery.ui.all.css">
 -->
</head>

<body class="login" mycollectionplug="bind">
<div class="login_m">
<div class="login_logo"><img src="/xiaomifeng/Public/Admin/Wopop_files/logo.png" width="196" height="46"></div>
<div class="login_boder">
<form action="<?php echo U('up');?>" method="post" onsubmit="return call()">
<div class="login_padding" id="login_model">

  <h2>USERNAME</h2>
  <label>
    <input type="text" id="username" name="username" class="txt_input txt_input2" onfocus="if (value ==&#39;Your name&#39;){value =&#39;&#39;}"  value="Your name" onblur="check1()"><span id="a1"></span>

      </label>
  <h2>PASSWORD</h2>
  <label>
    <input type="password" name="pwd" id="userpwd" class="txt_input" onfocus="if (value ==&#39;******&#39;){value =&#39;&#39;}" value="******" onblur="check2()">
    <span id= "a2"></span>
  </label>
 
  <div class="rem_sub">
  <div class="rem_sub_l">
  <input type="checkbox" name="checkbox" id="save_me">
   <label for="checkbox">Remember me</label>
   </div>
    <label>
      <input type="submit" class="sub_button" name="button" id="but" value="SIGN-IN" style="opacity: 0.7;">
    </label>
  </div>
</div>
</form>

<!-- <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div> -->

<div id="forget_model" class="login_padding" style="display:none">
<br>

   <h1>Forgot password</h1>
   <br>
   <div class="forget_model_h2">(Please enter your registered email below and the system will automatically reset users’ password and send it to user’s registered email address.)</div>
    <label>
    <input type="text" id="usrmail" class="txt_input txt_input2">
   </label>

 
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
     <input type="submit" class="sub_buttons" name="button" id="Retrievenow" value="Retrieve now" style="opacity: 0.7;">
     　　　
     <input type="submit" class="sub_button" name="button" id="denglou" value="Return" style="opacity: 0.7;">　　
    
    </label>
  </div>
</div>
<script src="/xiaomifeng/Public/Admin/js/jquery-1.7.2.js"></script>


<!--login_padding  Sign up end-->
</div><!--login_boder end-->
</div><!--login_m end-->
 <br> <br>
<!-- <p align="center"> More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p> -->
<script>
  // $('#but').click(function(){
  //     var username=$("username").value;
  //      var  pwd=$('userpwd').value; 
  //        $.ajax({
  //          type: "GET",
  //          url: "U('index')",
  //          data: { username:username,pwd:pwd },
  //          dataType:'jsonp',
  //          success:function($search){ 
            
  //         })
  //     })
</script>
<script>
  function $(id)
  {
    return document.getElementById(id);
  }
  /**
   * 验证姓名
   * @return {[type]} [description]
   */
  function check1()
  {
      var username=$("username").value;
      // alert(username);
      var reg=/^[a-z_]([a-z]|[0-9])|[\u4e00-\u9fa5]{6,12}$/;
      if(username=="")
      {
          $("a1").innerHTML='用户名不能为空';
          return false;
      }
      if(username!="")
      {
          if(reg.test(username))
          {
              $("a1").innerHTML='√';
              return true;
          }
          else
          {
              $("a1").innerHTML='用户名必须数字.字母.汉字由6-12位构成';
              return false;
          }
      }
      else
      {
        $("a1").innerHTML="√";
        $("a1").style.color="green";
        return true;
      }
  }

    /**
     * 验证密码
     * @return {[type]} [description]
     */
      function check2()
      {
          var  pwd=$('userpwd').value;
          var  reg=/^([a-z]|[0-9]){6,}$/i
          if(pwd=="")
          {
              $("a2").innerHTML='密码不能为空';
              return false;
          }
          if(pwd!="")
          {
            if(reg.test(pwd))
            {
                $("a2").innerHTML='√';
                return true;
            }
            else
            {
                $("a2").innerHTML='密码必须为6-18位';
                return false;
            }
          }
          else
          {
            $("a2").innerHTML="√";
            $("a2").style.color="green";
            return true;
          }
      }

    function call()
      {
        if(check1()&check2())
        {
          return true;
        }else
        {
          return false;
        }
        
      }
</script>

</body></html>