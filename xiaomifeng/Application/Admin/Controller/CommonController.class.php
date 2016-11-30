<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller 
{  
  public function __construct()
  {
    // dump(ini_get('session.cookie_lifetime',3600));
   // echo ini_get('session.cookie_lifetime');

 // echo $_GET['PHPSESSID'];

  	parent::__construct();
  	$cookie = cookie('uname');
    //var_dump($adm_cookie);die;
  	// $adm_session = session('uname') ;
  	if (empty($cookie))
    {
  		echo "<script>alert('请先登录');location='".U('Login/index')."';</script>"; 
  	}	
  } 
}

