<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>登陆</title>
  <link rel="stylesheet" href="/xiaomifeng/Public/Home/css/login/common.css">
  <link rel="stylesheet" href="/xiaomifeng/Public/Home/css/login/ej_class.css">
  <link rel="stylesheet" href="/xiaomifeng/Public/Home/css/login/login.css">
</head>
<body>  
<div class="w_978 fl_l ma_t10 bor">
  <div class="ej_l_title bor_t">用户登陆</div>
  <div class="reg fl_l">
  <form method="post" action="/xiaomifeng/index.php/Home/Login/login" onsubmit="return fun()">
    <table width="700" border="0" cellspacing="0" cellpadding="0" class="lg_t">
      <tr>
        <td width="53%" class="te_r">用户名：</td>
        <td width="47%"><input type="text" name="u_name" id="username" placeholder='用户名/手机' class="inputgray" onblur="checkUser();" /><span id="s_name"></span></td>
      </tr>
      <tr>
        <td class="te_r">密码：</td>
        <td><input type="text" name="pwd" id="pass" class="inputgray" placeholder='密码' onblur="checkPass();"/><span id="s_pass"></span></td>
      </tr>          
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" value="登陆老用户" class="btn font14" /><a href="/xiaomifeng/index.php/Home/Login/weight">忘记密码</a></td>
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
    return checkUser()&&checkPass()&&checkPwd()&&checkPhone()&&checkCode();
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

</script>