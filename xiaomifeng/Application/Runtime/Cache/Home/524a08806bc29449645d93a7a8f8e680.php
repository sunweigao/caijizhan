<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>注册</title>
  <link rel="stylesheet" href="/xiaomifeng/Public/Home/css/login/common.css">
  <link rel="stylesheet" href="/xiaomifeng/Public/Home/css/login/ej_class.css">
  <link rel="stylesheet" href="/xiaomifeng/Public/Home/css/login/login.css">
</head>
<body>  
<div class="w_978 fl_l ma_t10 bor">
  <div class="ej_l_title bor_t">用户注册</div>
  <div class="reg fl_l">
  <form method="post" action="/xiaomifeng/index.php/Home/Login/res" onsubmit="return fun()">
    <table width="700" border="0" cellspacing="0" cellpadding="0" class="lg_t">
      <tr>
        <td width="53%" class="te_r">用户名：</td>
        <td width="47%"><input type="text" name="u_name" id="username" class="inputgray" onblur="checkUser();" /><span id="s_name"></span></td>
      </tr>
      <tr>
        <td class="te_r">设置密码：</td>
        <td><input type="text" name="pwd" id="pass" class="inputgray" onblur="checkPass();"/><span id="s_pass"></span></td>
      </tr>
      <tr>
        <td class="te_r">确认密码：</td>
        <td><input type="text" id="pass2" class="inputgray" onblur="checkPwd();"/><span id="s_pass2"></span></td>
      </tr> 
      <tr>
        <td class="te_r">电话：</td>
        <td><input type="text" name="phone" id="phone" class="inputgray" onblur="checkPhone();"/><span id="s_phone"></span></td>
      </tr>
      <tr>
        <td class="te_r">手机验证码：</td>
        <td><input type="text" id="phonetoken" class="inputgray" onblur="checkCode();" /><input type="button" class="btn" onclick="code()" value="获取手机验证码"><span id="s_token"></span></td>
      </tr>            
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" value="注册新用户" class="btn font14" /></td>
      </tr>
    </table>
  </form>
  </div>
  </div>
</body>
</html>
<script src="/xiaomifeng/Public/Home/js/jq.js"></script>
<script type="text/javascript">
var str = '';
  function fun() {
    return checkUser()&&checkPass()&&checkPwd()&&checkPhone();
  }

  // 用户名
  function checkUser() {
    reg = /^[A-Za-z]{6,12}$/;
    username = $('#username').val();
    if(username==''){
      $("#s_name").html("用户名不能为空");
      return false;
    }else if (reg.test(username)){
      $("#s_name").html("");
      return true;
    }else{
      $("#s_name").html("账号6-12个字符");
      return false;
    }
  }

  // 密码
  function checkPass() {
    pass = $('#pass').val();
    reg = /^\w{6,18}$/;
    if(pass==''){
      $("#s_pass").html("密码不能为空");
      return false;
    }else if(reg.test(pass)){
      $("#s_pass").html("");
      return true;
    }else{
      $("#s_pass").html("密码:必须是6-18位");
    }
  }

  // 确认密码
  function checkPwd() {
    pass = $('#pass').val();
    pwd = $('#pass2').val();
    if(pwd==''){
      $("#s_pass2").html("确认密码不能为空");
      return false;
    }else if(pass != pwd){
      $("#s_pass2").html("两次输入不一致");
      return false;
    }else{
      $("#s_pass2").html("");
      return true;
    }
  }

  // 发送验证码
  function code() {
      var phone = $("#phone").val();
      $.post("/xiaomifeng/index.php/Home/Login/phone",{
        phoneNum:phone
      },function(data){
        str = data
      })
      return str;
    }

  // 手机号
  function checkPhone () {
     var phone = $("#phone").val();
     var reg = /^[1][358]\d{9}$/
     if(phone==''){
      $("#s_phone").html("手机号不能为空");
      return false;
    }else if(reg.test(phone)){
      $("#s_phone").html("");
      return true;
    }else if(phone.length>11){
      $("#s_phone").html("超出手机号位数");
      return false;
    }else if(phone.length<11){
      $("#s_phone").html("手机号位数不够");
      return false;
    }else{
      $("#s_phone").html("手机格式不对");
      return false;
    }
  }

  // function checkCode () {
  //   var token = $("#phonetoken").val();
  //   var yur = str.substr(4);
  //   if(yur==''){
  //     $("#s_token").html("请先获取验证码");
  //     return false;
  //   }else if(token==''){
  //     $("#s_token").html("验证码不能为空");
  //     return false;
  //   }else if(token!=yur){
  //    //alert(str+"验证码是："+token)
  //     $("#s_token").html("验证码不正确，请重新获取验证码是");
  //     return false;
  //   }else{
  //     $("#s_token").html("");
  //     return true;
  //   }
  // }
</script>