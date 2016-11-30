<?php

namespace Admin\Controller;

use Think\Controller;

header('content-type:text/html;charset=utf-8');

/**
* 
*/
class UserController extends CommonController
{
	public function index()
	{
		$db = D('user');
		$count = $db->count();      // 查询满足要求的总记录数
		$Page       = new \Think\Page($count,2);                                    // 实例化分页类 传入总记录数和每页显示的记录数(2)
		$show       = $Page->show();                                                // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $db->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);                                                 // 赋值数据集
		$this->assign('page',$show);
		$this->display('User/index');
	}
	 public function del()//删除数据
    {
    	// echo 1;die;
        $id=I('get.id');
        $db=D('user');
        $re=$db->delete($id);
        // echo $db->_sql();die;
        echo $id;
    }
    public function delall(){
    $id=I('get.id');
    $db=D('Opus');
    $re=$db->del($id);
    echo 1;
  }
}
