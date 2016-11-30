<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class OpusController extends CommonController 
{ 
  /**
   * [con description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function con()//作品管理展示
  {
      //查询笑话集一级分类
      $categoryList = D('category')->select();
      $this->assign('categoryList', $categoryList);
//        $arr=D('Opus')->selall(); //调用M层分页方法
//        // var_dump($obj);die;
//           for($i=0;$i<count($arr['0']);$i++)
//           {
//            if (Strlen($arr['0'][$i]['title'])>9) {
//              $arr['0'][$i]['title']=substr_replace($arr['0'][$i]['title'], '...', 9);//substr_replace(‘从什么中替换’,’替换成谁’,从第几位开始)  必须添加判断否则超过9位字符串的位置被替换成了... 没超过9位的字符串后面也会跟着...
//            }
//           }
//        $page=$_GET['page']?$_GET['page']:1;
//        $this->assign('page',$page);
//        $this->assign('data',$arr['0']);
//        $this->assign('str',$arr['1']);
      $this->display('list');
  }
    public function cate()
    {
        $id=I("get.id");
        //查询笑话集二级分类
        $cateList = D('cate2')->where("category_id=".$id)->select();
        exit(json_encode($cateList));
        $this->assign('cateList', $cateList);
    }
  /**
   * [add_Opu description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   */
  public function add_Opu()//作品添加
  {
    $this->display();
  }
  /**
   * [add description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   */
  public function add()//作品添加填写
  {
    $cate_data=D('Category')->data_sel();
    $this->assign('cate_data',$cate_data);
    $this->display();
  }
  /**
   * [insert description]
   * @Author    Liujingwei
   * @DateTime  2016-10-20
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function insert()//作品添加入库
  {
    $data=I('post.');
    $data['content']=I('post.content','','stripslashes');
    $data['art_desc']=I('post.art_desc');
     $upload = new \Think\Upload();// 实例化上传类    
     $upload->maxSize   =     11111111 ;// 设置附件上传大小    
     $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
     $img_src=$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件 
     $upload->rootPath  = "./";    
     $info   =   $upload->upload();    
     if(!$info) 
     {     
      $this->error($upload->getError());
     }
     else
     {
          $file=$info['source_img']['savepath'].$info['source_img']['savename'];
          $image = new \Think\Image(); 
          //var_dump($image);die;
          $image->open($file);//找到原图保存路径要有./的路径 入库时去掉点   // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
          $image->thumb(150, 150)->save('./Public/thumb/'.$info['source_img']['savename']);
          $data['thumb_img']='/Public/thumb/'.$info['source_img']['savename'];
          $data['source_img']=substr($file,1);
          $data['add_time']=date('Y-m-d H:i:s');
          $re=M('article')->add($data);
          if ($re>0)
          {
     
            echo "<script>location='".U('Opus/con')."';</script>";             
          }
          else
          {
            $this->error('新增失败');
          }
     }    
  }
  /**
   * [checktype description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function checktype()//根据下拉条件输入关键字查询相关数据
  {
     $type=I('get.type');
     $tian=I('get.tian');
     //var_dump($tian);die;
     if (!empty($tian)) 
     {
        $data=D('Opus')->checktype($type,$tian);
        if ($data) 
        {
            $this->assign('data',$data);
            $this->display('list');  
        }else
        {
          echo -1;
        } 
     }
     else
     {
      echo "0";
     } 
  }
  /**
   * [del description]
   * @Author    Liujingwei
   * @DateTime  2016-10-20
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function del()//删除数据
  {
    $id=I('get.id');
    $db=D('Opus');
    $re=$db->del($id);
    echo $id;
  }
  public function delall(){
    $id=I('get.id');
    $db=D('Opus');
    $re=$db->del($id);
    echo 1;
  }
  /**
   * [save_art description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function save_art()//修改博文填写修改信息页面
  {
    $id=I('get.id');
    $db=D('Opus');
    $where="art_id=$id";
    $data=$db->selall($where);//查询出单条数据的3维数组因为M曾包含返回值分页字符串
    $cate_data=D('Category')->data_sel();//查询出分类信息的二维数组
    // var_dump($cate_data);die;
    // dump($data);die;

    $this->assign('cate_data',$cate_data);
    $this->assign('v',$data['0']['0']);
    $this->assign('id',$id);
    $this->display('save_art');
  }
  public function chang()
  {
      $id=I('get.id');
      //$is_delete=M('blog_article')->where("art_id=$id");
      //echo $is_delete;die;
      $arr=M('article')->where("art_id=".$id)->find();
      $arr['content']=I('post.content','','stripslashes');
      $is_delete=$arr["is_delete"];
      if($is_delete){
        $is_delete=0;
      }else{
        $is_delete=1;
      }
      $data['is_delete']=$is_delete;//不加引号$is_delete
      $data['art_id']=$id;
      $re=D('Opus')->art_save($data);//执行修改 
      //echo M('blog_article')->where("art_id=$id")->find();
      if($is_delete=='0'){
        echo "前台已显示";
       }else{
        echo "<span style='color: red; font-weight: bold'>前台未显示</span>";
      }
  }
  public function save_art_pro()
  {
     $id=$_POST['art_id'];
     $data=I('post.');
     $upload = new \Think\Upload();// 实例化上传类    
     $upload->maxSize   =     11111111 ;// 设置附件上传大小    
     $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
     $img_src=$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件 
     $upload->rootPath  = "./";    
     $info   =   $upload->upload(); 
    
          $file=$info['source_img']['savepath'].$info['source_img']['savename'];
          $image = new \Think\Image(); 
          //var_dump($image);die;
          $image->open($file);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
          $image->thumb(150, 150)->save('./Public/thumb/'.$info['source_img']['savename']);
          $data['thumb_img']='/Public/thumb/'.$info['source_img']['savename'];
          $data['source_img']=substr($file,1);
          $data['title']=$_POST['title'];
          $data['content']=$_POST['content'];
          $data['author']=$_POST['author'];
          $data['art_desc']=I('post.art_desc');
          /*$data['source_img']=$_POST['source_img'];*/
          $data['cate_id']=$_POST['cate_id'];
          $data['add_time']=date('Y-m-d H:i:s');
          $data['is_delete']=1;

          $re=M('article')->where("art_id=".$id)->save($data);
         
          if ($re>0)
          {
              echo "<script>location='".U('Opus/opus_con')."';</script>";             

          }
          else
          {
            $this->error('修改失败');
          }
    }
    public function show_title()
    {

      $id=$_GET['id'];

      $data=M('article')->where("art_id=$id")->find();
     
      for($i=0;$i<count($data);$i++)
       {
        if (Strlen($data['title'])>9) {
          $data['title']=substr_replace($data['title'], '...', 9);//substr_replace(‘从什么中替换’,’替换成谁’,从第几位开始)  必须添加判断否则超过9位字符串的位置被替换成了... 没超过9位的字符串后面也会跟着...
         
        }
        
       }
      $this->assign('data',$data);
      $this->display();

    }
    public function zengdian()
    {
      //接收点赞文章ID
      $art_id = I('get.art_id');
      $res = M('article')->where("art_id = $art_id")->setInc('clicks'); 
      
      //echo $res;
      if($res)
      {
        echo 1;
      }else
      {
        echo 0;
      }
    }
   public function zengzan()
    {
      //接收点赞文章ID
      $art_id = I('get.art_id');
      $res = M('article')->where("art_id = $art_id")->setInc('praises'); 
      
      //echo $res;
      if($res)
      {
        echo 1;
      }else
      {
        echo 0;
      }
    }
}
