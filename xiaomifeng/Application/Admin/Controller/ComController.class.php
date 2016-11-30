<?php
namespace Admin\Controller;
use Think\Controller;
class ComController extends CommonController 
{  
  public function comment()
  {
		 // $User = M("comment"); 
		 // $data = $User->select();
		 // print_r($data);die;
		 $arr=M('comment')->alias('a')->join('qs c on a.qsid=c.qsid ')->select();
		 // $count=M('article')->count();
		 // print_r($arr);die;
		 $this->assign('arr',$arr);
  		 $this->display();
  }
  /**
   * 删除
   * @return [type] [description]
   */
  public function del(){
   $c_id=I('get.c_id');
   $res=M('comment')->where("c_id='$c_id'")->delete();
   if($res){
    echo $c_id;
   }
  }
}