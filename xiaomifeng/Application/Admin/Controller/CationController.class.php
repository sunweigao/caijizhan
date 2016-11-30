<?php
namespace Admin\Controller;
use Think\Controller;
class CationController extends CommonController 
{  
  public function Index()
  {
  	$obj=D('Cation')->cate(); //调用M层分页方法
    $page=$_GET['page']?$_GET['page']:1;
    $this->assign('page',$page);  
    $this->assign('data',$obj['0']);    
    $this->assign('str',$obj['1']); 
    $this->display('index');  

  }
  public function del(){
    $id=I('get.id');
    $res=M('category')->where("cate_id='$id'")->delete();
    if($res){
      echo $id;
    }
  }
  /**
   * [c_add description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function c_add()//作品添加填写
  {
    
    $this->display();
  }
  /**
   * [c_name description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function c_name()//验证分类名称唯一性
  {
      $type_name=I('get.type_name');
      $data=M('category')->where("cate_name='$type_name'")->find();
      //echo $data;die;
      if ($data) {
         echo 0;
      }else
      {
         $type['cate_name']=$type_name;
          $add=M('category')->add($type);
          if ($add) 
          {
            echo 1;
          }
        
      }
  }
  
}
