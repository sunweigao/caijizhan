<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Model;
use Think\Model;
class QsModel extends Model { 

   function sell($table)
    {
            $count=M($table)->count();
            $page_size=20;
            $page_num=ceil($count/$page_size);

            $page=$_GET['page']?$_GET['page']:1;

            $page_limit=($page-1)*$page_size;
            $last=$page-1<=1?1:$page-1;
            $next=$page+1>=$page_num?$page_num:$page+1;
            $arr=M($table)->where($where)->limit($page_limit,$page_size)->select();
            $count=M($table)->count();

           $first= "<a href='javascript:void(0)'' onclick='fun($last)'><span class='page first-page'>«</span></a>";
         for ($i=1; $i <=$page_num ; $i++) { 
            $page_i .= "<a href='javascript:void(0)'  onclick='fun($i)'><span>$i</span></a>";
         } 
           $next = "<a href='javascript:void(0)'  onclick='fun($next)' ><span class='page last-page'>»</span></a></div>";
            $str='';
            $str.=$first.$page_i.$next;
            return $arr=array($arr,$str);
    }
}