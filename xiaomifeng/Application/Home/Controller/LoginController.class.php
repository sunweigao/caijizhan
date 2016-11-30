<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    /**
     * [index description]
     * @Author    Liujingwei
     * @DateTime  2016-10-20
     * @copyright [copyright]
     * @license   [license]
     * @version   [version]
     * @return    [type]      [description]
     * 前台登陆页面
     */
    public function index(){
      $this->display("Login/index");
      
    }
    //登录验证
    public function login(){
      $user_obj = D('user');
      $data = $user_obj->create();
      $user_arr = $user_obj->where("u_name = '{$data['u_name']}'&&pwd = md5('{$data['pwd']}')")->find();
      if ($user_arr) {
        session('user_id',$user_arr['a_id']);
        session('user_name',$user_arr['u_name']);
        $this->success('登陆成功',__MODULE__.'/Index/index',1);
      }else{
        $this->error('登陆失败');
      }
    }
    /**
     * [details description]
     * @Author    Liujingwei
     * @DateTime  2016-10-20
     * @copyright [copyright] 
     * @license   [license]
     * @version   [version]
     * @前台注册页
     */
    public function register()
    {
      $this->display();
    }
    public function res(){
      $User = M("User"); // 实例化User对象
      $data = I('post.');
      $data['pwd'] = md5($data['pwd']);
      $data['time'] = date("Y-m-d H:i:s",time());
      $list = $User->add($data);
      if($list){
            $this->success("注册成功",__CONTROLLER__."/index");
      }
      else
      {
          $this->error("注册失败,请重新注册",__CONTROLLER__."/register");
      }
    }
     /**
     * [details description]
     * @Author    Liujingwei
     * @DateTime  2016-10-20
     * @copyright [copyright]
     * @license   [license]
     * @version   [version]
     * @前台点赞
     */
    public function weight()
    {
     $this->display("Login/weight"); 
    }
    public function wei(){
      $user_obj = D('user');
      $data = I('post.');
      $data['pwd'] = md5($data['pwd']);
      $User = D('user');
      $y = $User->where('phone='.$data['phone'])->save($data);
      if ($y) {
        // echo 1;die;
        $this->success('修改成功',__MODULE__.'/Index/index',1);
      }else{
        $this->error('修改失败');
      }
    }
    /**
     * [likedesc description]
     * @Author    Liujingwei
     * @DateTime  2016-10-20
     * @copyright [copyright]
     * @license   [license]
     * @version   [version]
     * @前台取消点赞
     */
    public function likedesc()
    {
      
    }
  /**
   * [comment description]
   * @Author    Liujingwei
   * @DateTime  2016-10-20
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @前台评论入库
   */
  public function comment()
  {   
      
  }
  /**
   * [tell description]
   * @Author    Liujingwei
   * @DateTime  2016-10-20
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @评论
   */
  public function tell(){
  
  }
  public function type()
  {
        

  }
  public function phone(){
    $to = I('post.phoneNum');
    $code = rand(1000,9999);
    $url = "http://api.k780.com:88/";
    $content = urlencode('code='.$code);
    $curlPost = "app=sms.send&tempid=50753&param=".$content."&phone=".$to."&appkey=20374&sign=9c81e8a62dd7dd0fa1ae6cf4d43e3df3&format=json";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    $return_str = curl_exec($curl);
    curl_close($curl);
    echo $code;
  }


}
