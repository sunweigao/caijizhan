<?php
namespace Admin\Controller;
use Think\Controller;
class TypeController extends Controller 
{  
	  public function types()
	  {
			$re=M('category');
		    $arr=$re->select();
		    // var_dump($arr);die;
		    $this->assign('arr',$arr);
		    $this->display('types');  
	  }
}