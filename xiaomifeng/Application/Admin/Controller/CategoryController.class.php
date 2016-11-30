<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController 
{ 
	public function cate()
  {
    $re=M('category')
    $arr=$re->select();
    $this-assign($arr);

  }
  
}