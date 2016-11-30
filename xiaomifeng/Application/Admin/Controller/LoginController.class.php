<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller 
{  
  public function Index()
  {
  	$this->display();
  }

  public function up()
  {
  	$user=I('post.username');
  	$pwd=md5(I('post.pwd'));
  	$admin_data=M('user')->where("u_name='$user' and pwd='$pwd'")->select();
    //var_dump($admin_data);die;
  	if ($admin_data) 
  	{
  		cookie('uname',$admin_data[0]['u_name']);
      cookie('id',$admin_data[0]['a_id']);
      redirect(U('Index/index'));
  	}
  	else
  	{
      redirect(U('Login/index'));
  	}
  }
  public function logout()
  {
    header('content-type:text/html;charset=utf-8');
    session(null);
    cookie(null);
    echo "<script>location='".U('Login/Index')."';</script>";
  }
}

