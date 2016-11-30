<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class UpdateController extends CommonController 
{ 
   /**
    * [index description]
    * @Author    Liujingwei
    * @DateTime  2016-10-21
    * @copyright [copyright]
    * @license   [license]
    * @version   [version]
    * @return    [type]      [description]
    * 修改密码
    */
   public function index(){
     $this->display();
   }
   public function cha(){
   	$id=I('post._id');
   	$pwd=md5(I('post.oldpass'));
   	$res=M('user')->where("a_id='$id' and pwd='$pwd'")->select();
    if($res){
      echo 1;
    }else{
      echo 0;
    } 
    }
    public function add(){
     $id=I('post.id');
     $pwd=md5(I('post.newpass'));
     $arr['pwd']=$pwd;
     $res=M('user')->where("a_id='$id'")->save($arr);
     //var_dump($res);die;
     if($res){
     	echo 1;
     }
    }
}