<?php

namespace Admin\Controller;

use Think\Controller;

header('content-type:text/html;charset=utf-8');

/**
* 
*/
class NavController extends CommonController
{
	public function index()
	{
		$db = D('nav');                                                             // 实例化nav对象
		$count = $db->join('width ON width.width_id = nav.width_id')->count();      // 查询满足要求的总记录数
		$Page       = new \Think\Page($count,4);                                    // 实例化分页类 传入总记录数和每页显示的记录数(2)
		$show       = $Page->show();                                                // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $db->join('width ON width.width_id = nav.width_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);                                                 // 赋值数据集
		$this->assign('page',$show);                                                 // 赋值分页输出
		$this->display('Nav/index');
	}
	// 添加广告
	public function navAdd()
	{
		// 实例化width表
		$db = D('width');
		// 判断开启的状态
		$data = $db->where("width_status='0'")->select();
		$this->assign('data',$data);
		$this->display('Nav/add');
	}
	 public function del()//删除数据
    {
    	// echo 1;die;
        $id=I('get.id');
        $db=D('nav');
        $re=$db->delete($id);
        // echo $db->_sql();die;
        echo $id;
    }
	public function insert()
	{
		$data = I('post.');
		$upload = new \Think\Upload();                                                       // 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');                         // 设置附件上传类型    
		$upload->savePath  =     './Public/Uploads/Nav/';                                   // 设置附件上传目录        
		$upload->rootPath  =     "./";                                                           // 上传文件
		 $info   =   $upload->upload();    
		if(!$info) {
		    // 上传错误提示错误信息        
			$this->error($upload->getError());    
		}else{
			$file=$info['nav_image']['savepath'].$info['nav_image']['savename'];
			$image = new \Think\Image(); 
	        $image->open($file);                                                              //找到原图保存路径要有./的路径 入库时去掉点   
	        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
	        $image->thumb(150, 150)->save('./Public/thumb/'.$info['nav_image']['savename']);
	        $data['nav_img']='/thumb/'.$info['nav_image']['savename'];
	        $data['nav_image']=substr($file,8);
			// 上传成功        
			$re=M('nav')->add($data);
            if ($re>0)
            {
                echo "<script>location='".U('Nav/index')."';</script>";             
            } else {
            	$this->error('新增失败');
            }    
		}
	}
}
