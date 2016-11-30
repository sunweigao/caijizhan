<?php
namespace Home\Controller;
use Think\Controller;
use Org\Net\Http;
header("content-type:text/html;charset=utf-8");

class IndexController extends Controller {
	  /**
     * [index description]
     * 前台展示页面
     */
    public function index(){
        
        //实例化一个空model
        $Dao = M();
        //查询推荐
        $choose = "select * from cate2 order by like_num desc limit 14";
        $chooseList=$Dao->query($choose);
        //最新笑话
        $new = "select * from cate2 order by add_time desc limit 10";
        $newList = $Dao->query($new);
        //热评
        $this->assign('chooseList',$chooseList);
        $this->assign('newList',$newList);
        // 上部广告
        $db = D('nav');
        $nav['nav_status'] = '0';                         // 广告状态
        $time = date("Y-m-d H:i:s",time());               // 当前时间
        $start['nav_starttime'] = array('ELT',$time);     // 开始时间
        $end['nav_endtime'] = array('EGT',$time);         // 结束时间
        $width['width_main'] = '0';
        $data = $db->where($nav)->where($start)->where($end)->join('width ON width.width_id = nav.width_id')
                ->where($width)->order('nav_id desc')->limit(1)->select();
        $this->assign('data',$data[0]);

        //最新的文章
        $table="qs";
        $arr=D('qs')->sell($table);
       
      	$this->assign('arr',$arr[0]);
        // print_r($arr);die;
        $this->assign('str',$arr[1]);
      	$this->display();
    }
   
   
  
    public function email(){
      $e=I('post.e');
      $TextArea1=I('post.TextArea1');
      if(sendMail('18610981664@163.com',$e,$TextArea1)){
            echo '1';
        }
        else{
            echo '0';
        }
    }
    //开心一刻
    public function kaixin()
    {
        $list=M('category')->select();
        $this->assign('list',$list);
        //zuixin
        $newList=M('cate2')->order("add_time",desc)->limit('20')->select();
        $this->assign('newList',$newList);
        //实例化一个空model
        $Dao = M();
        //查询推荐
        $sql = "select * from cate2 order by like_num desc limit 20";
        $cateList=$Dao->query($sql);
        $this->assign('cateList',$cateList);
        $this->display();
    }
    //查询相应的分类
    public function cate()
    {
        $id = $_GET['id'];
        $cateList =M('cate2')->where("category_id='$id'")->select();
        $this->assign('cateList',$cateList);
        //实例化一个空model
        $Dao = M();
        //查询推荐
        $sql = "select * from cate2 order by like_num desc limit 20";
        $cateList=$Dao->query($sql);
        $this->assign('cateList',$cateList);
        $this->display('dd');
    }
    //查询相应的内容
    public function joke()
    {
        $id = $_GET['id'];
        $name = $_GET['name'];
        //查询joke
        $jokeList =M('joke')->where("cate_id='$id'")->select();
        // print_r($jokeList);die;
        $this->assign('jokeList',$jokeList);
        $this->assign('name',$name);
        $this->assign('id',$id);
        //查询cate表
        $cate = M('cate2')->where("id='$id'")->select();
        $this->assign('cate',$cate);
        //实例化一个空model
        $Dao = M();
        //查询推荐
        $sql = "select * from cate2 order by like_num desc limit 20";
        $cateList=$Dao->query($sql);
        $this->assign('cateList',$cateList);
        //上一篇id name
        $id1=$id+1;$id2=$id-1;
        $before =M('cate2')->where("id='$id2'")->select();
        //下一篇id name
        $next =M('cate2')->where("id='$id1'")->select();
        $this->assign('before',$before);
        $this->assign('next',$next);
        //分类
        $list=M('category')->select();
        $this->assign('list',$list);
        $this->display('joke');
    }
    //点赞
    public function like()
    {
        $id = $_GET['id'];
        var_dump($id);die;
        //$username = $_GET['username'];
        $result=M('cate2')->where("id='$id'")->setInc('like_num'); // 用户的积分加1
        exit(json_encode($result));
    }
  
// echo substr_replace('abcdef', '###', 1); //输出 a###
// echo substr_replace('abcdef', '###', 1, 2); //输出 a###def
// echo substr_replace('abcdef', '###', -3, 2);  //输出 abc###f
// echo substr_replace('abcdef', '###', 1, -2);  //输出 a###ef 
//$list[$key]['name']=str_replace($name,"<font color='#ff290c'>$name</font>",$val['name']);
 
   //笑话下载
   public function upload()
   {
        $id = $_GET['id'];
        $path = 'Happy/'.$id.'.txt';
        $content = M('joke')->where("id='$id'")->select();
        //var_dump($content[0]['content']);die;
        $res =  file_put_contents($path,$content[0]['content']);
        if(!file_exists($path)){
          $this -> error( '文件不存在' );
        }
          if($res){
            $filename = realpath($path);//文件名称
            $name = rand(1,9999999999).'.txt';
            //Header( "Content-type:   application/octet-stream ");
            header( 'Content-Type:txt/doc');
            Header( "Accept-Ranges:   bytes ");
            Header( "Accept-Length: " .filesize($filename));
            header("Content-Disposition:attachment; filename={$name}"); //发送描述文件的头信息，附件和            echo file_get_contents($filename);
            readfile($filename); 
          }else{
              $this -> error( '下载失败' );
        }  
    }

/**
 * 糗事百科
 */

   //糗事趣闻
   public function qs()
   {
        //分页 
        $table = 'qs'; 
        $arr=D('qs')->sell($table);
        $page=$_GET['page']?$_GET['page']:1;
        $this->assign('page',$page);
        $this->assign('arr',$arr[0]);
        $this->assign('str',$arr[1]);
        $this->display();
   }

   //糗事趣闻下载
   public function xiazai()
   {
      
      //$date = $res['qstext'];
      $qsid = $_GET['qsid'];
     // echo $qsid;
           if( $qsid == 0 ){
              $this -> error( '文件不存在' );
           }
           $url='Txt/'.$qsid.'.txt';
           //$db_file = M( 'qs' );
           //$condition [ 'qsid' ] = $qsid;
           $file_result = M('qs')->where("qsid='$qsid'")->select();
           $re =  file_put_contents($url,$file_result[0]['qstext']);
           if(!file_exists($url)){
                  $this -> error( '文件路径不存在' );
           }
          // echo $url;die;
          $re =  file_put_contents($url,$file_result[0]['qstext']);
          //echo $re;die;
          if ($re) {
             //print "成功";
             $filename=realpath($url);  //文件名
             $date=date("Ymd-H:i:m");
             Header( "Content-type:   application/octet-stream ");
             Header( "Accept-Ranges:   bytes ");
             Header( "Accept-Length: " .filesize($filename));
             header( "Content-Disposition:   attachment;   filename= {$date}.doc");
             echo file_get_contents($filename);
             readfile($filename); 
          }else{
            print  "失败";
          }
   }
   //糗事详情页
   public function qsxq()
   {
      $qsid = $_GET['qsid'];
      $last = $this->last();
      //print_r($last);die;
      $next = $this->next();
      //访问量
      $res = M('qs')->where("qsid = $qsid")->setInc('qscomment');
      //var_dump($res);die;
      $data = M('qs')->where("qsid='$qsid'")->select();
      //var_dump($data);die;
      //最热门笑话
      $hot = M('qs')->order('qslike desc')->limit(3)->select();
      //最好笑糗图
      $tuhot = M('qsimg')->order('imglike desc')->limit(3)->select();
     // var_dump($hot);die;
      $this->assign('data',$data);
      $this->assign('last',$last);
      $this->assign('next',$next);
      $this->assign('hot',$hot);
      $this->assign('tuhot',$tuhot);
      $this->display();
   }
  


   /**
     * 上一篇
     */
     public function last(){
        //接收本篇章的qsid
        $qsid = I("get.qsid");
        //查询数据
        $qs = M('qs');
        $arr = $qs->select();
        //定义一个空数组
        $arr1 = array();
        //循环数据库查询出来的数据
        foreach($arr as $k=>$v){
            $arr1['qsid']=$v['qsid'];
            if($qsid==$arr1['qsid']){
             //判断如果不是第一条 就让他的K减1 根据得出的结果里的qsid查询数据库
                if($k!=0){
                    $key = $k-1;
                    $arr1['qsid']=$arr[$key]['qsid'];
                    $data = $qs
                        ->where("qsid='{$arr1['qsid']}'")
                        ->find();
                }
            }
        }
       // print_R($data);
        // die;
        return $data;
    }

    /**
     * 同理下一篇
     * @return function [description]
     */
    public function next(){
        $qsid = I("get.qsid");
        $qs = M('qs');
        $arr = $qs->select();
        $arr1 = array();
        foreach($arr as $k=>$v){
            $arr1['qsid']=$v['qsid'];
            if($qsid==$arr1['qsid']){
                $count = count($arr)-1;
                if($k!=$count){
                    $key = $k+1;
                    $arr1['qsid']=$arr[$key]['qsid'];
                    $data = $qs
                        ->where("qsid='{$arr1['qsid']}'")
                        ->find();
                }
            }
        }
        return $data;
    }

    //逗图 
    public function doutu()
    {
        $table = 'qsimg';
        $arr=D('qs')->sell($table);
        $page=$_GET['page']?$_GET['page']:1;
        // print_r($arr);die;
        //var_dump($arr[0]);die;
        $this->assign('page',$page);
        $this->assign('arr',$arr[0]);
        $this->assign('str',$arr[1]);
        $this->display();
    }

    //图片下载
    public function imgxz()
    {
        //获取
        $url = $_GET['imgurl'];
        $filename =date("YmdHis");
        $res = $this->GrabImage($url,$filename);
        if($res){
          print "OK";
        }else{
          print "NO";
        }
    }

    /**
     * 通过图片的远程url，下载到本地
     * @param: $url为图片远程链接
     * @param: $filename为下载图片后保存的文件名
     */
    function GrabImage($url,$filename) {
               
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, $v);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        $content = curl_exec($ch);
        $curlinfo = curl_getinfo($ch);
        //echo "string";
        //print_r($curlinfo);
        //关闭连接
        curl_close($ch);
            if ($curlinfo['http_code'] == 200) {
              if ($curlinfo['content_type'] == 'image/jpeg') {
                    $exf = '.jpg';
              }elseif ($curlinfo['content_type'] == 'image/png') {
                    $exf = '.png';
              }elseif ($curlinfo['content_type'] == 'image/gif') {
                    $exf = '.gif';
              }
              //存放图片的路径及图片名称 
              //$filename = date("YmdHis") . uniqid() . $exf;//这里默认是当前文件夹，可以加路径的 可以改为
              $filepath = 'Txt/'.$filename. $exf;
             // file_put_contents($filepath, $content);//同样这里就可以改为$res = file_put_contents($filepath, $content);
              if(file_put_contents($filepath, $content)){
                return true;
              }else{
                return false;
              }
          }

       } 

       //图片的一键下载
       public function allxz()
       {
          set_time_limit(0);
          $table = 'qsimg';
          $arr=M('qsimg')->select();
          $val=array();
          foreach ($arr as $key => $v) {
             $val[$key]=$v['imgurl'];
          }
        
          foreach($val as $imagesURL) {
              $filepath = 'Txt/'.basename($imagesURL);
              file_put_contents($filepath, file_get_contents($imagesURL));
              //print_r(file_get_contents($imagesURL))."</br>";
          }
          $this->display('qsimg');;
       }
        /**
         * 搜索
         * @return [type] [description]
         */
        public function search()
        { 
                $name= $_POST['edtSearch'];
                // echo $name;die;
                // 实例化一个空模型，没有对应任何数据表
                $Dao = M();
                //或者使用 $Dao = new Model();
                $Model = M('category');
                $list = $Model->query("select * from joke where content like '%$name%'");
                $list=$Model->join('cate2 on category.id = cate2.category_id', 'left')->join('joke on cate2.id = joke.cate_id', 'left')->limit(25)->select();
                // print_r($list);die;
                //推荐笑话
                $sql = "select * from cate2 order by like_num desc limit 20";
                $cateList=$Dao->query($sql);
                //笑话分类
                $lists=M('category')->select();
                $this->assign('lists',$lists);
                

                $this->assign('cateList',$cateList); 
                $this->assign('list',$list);

                $this->display();
        }
     
      /**
       * 评论
       * @return [type] [description]
       */
        public function pinlun()
    {
        
        $content= $_GET['sendText'];
        // var_dump($content);die
        $id=$_GET['psid'];
        echo $id;die;
        $time=date('Y-m-d H:i:s',time());
        // print_R($data);die;
        $User = M("comment"); // 实例化User对象

        $data['qsid'] = $id;
        $data['art_comment'] = $content;
        $data['comment_time']=$time;
        $list=$User->add($data);
        if($list)
        {
            echo $list;    
        } 
    }
    /**
     * 登陆
     * @return [type] [description]
     */
    public function login()
    {
        $this->display();
    }

  }
  

