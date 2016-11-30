<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController 
{  
  public function Index()
  {
  	
  	$this->display();

  }
  public function comment(){
  	$res = M('comment c')->join("article a on c.art_id=a.art_id")->order("c_id desc")->limit(10)->select();
  	$this->assign('res',$res);
  	$this->display();
  }
  public function del(){
   $c_id=I('get.c_id');
   $res=M('comment')->where("c_id='$c_id'")->delete();
   if($res){
    echo $c_id;
   }
  }
   public function delall(){
    $id=I('get.id');
    $res=M('comment')->delete($id);
    echo 1;
  }
}

