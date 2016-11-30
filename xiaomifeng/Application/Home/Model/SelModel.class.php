<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Model;
use Think\Model;
class SelModel extends Model {
    function sel_pro(){
        return $this->Table('aaa')->count();
    }
    function sele($page_size,$page_limit){
        return $this->Table('aaa')->limit($page_limit,$page_size)->select();
    }
}