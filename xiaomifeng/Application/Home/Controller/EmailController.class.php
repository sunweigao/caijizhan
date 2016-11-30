<?php
namespace Home\Controller;
use Think\Controller;
class EmailController extends Controller {
     
    public function send(){
        if(sendMail('1091371645@qq.com','你好!邮件标题','这是一篇测试邮件正文！')){
            echo '发送成功！';
        }
        else{
            echo '发送失败！';
        }
    }
    
}	