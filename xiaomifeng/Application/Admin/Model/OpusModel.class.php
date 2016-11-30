<?php
namespace Admin\Model;
use Think\Model;
class OpusModel extends Model 
	{
		protected $tableName = 'article'; 
		public function selall($where)
		{
            $count=M('article')->count();
	        $page_size=5;
	        $page_num=ceil($count/$page_size);
	        $page=$_GET['page']?$_GET['page']:1;
	        $page_limit=($page-1)*$page_size;
	        $last=$page-1<=1?1:$page-1;
	        $next=$page+1>=$page_num?$page_num:$page+1;
			$arr=M('article')->alias('a')->join('category c on a.cate_id=c.cate_id ')->where($where)->limit($page_limit,$page_size)->select();
			$count=M('article')->count();

			 $first="<a href='javascript:void(0)' onclick='fun(1)'>首页</a>";
	        $last="<a href='javascript:void(0)' onclick='fun($last)'>上一页</a>";
	        for ($i=1; $i <=$page_num ; $i++) { 
	            $page_i.="<a href='javascript:void(0)' onclick='fun($i)'>$i</a>"."&nbsp;&nbsp;&nbsp;&nbsp;";
	        }
	        $next="<a href='javascript:void(0)' onclick='fun($next)'>下一页</a>";
	        $end="<a href='javascript:void(0)' onclick='fun($page_num)'>尾页</a>";
	        $str='';
	        $str.=$first.$last.$page_i.$next.$end;
	        return $arr=array($arr,$str);
			
			//return M('blog_article')->select();
		}
		public function checktype($type,$tian)
		{
			$rs=M('article');
			if ($type=='分类') 
			{
				$where="c.cate_name like '%$tian%'";
			}else if ($type=='标题') {
				$where="a.title like '%$tian%'";
			}else{
				$where="a.author like'%$tian%'";
			}
			return $arr=$rs->alias('a')->join('category c on a.cate_id=c.cate_id ')->where($where)->select();
		}

		public function del($id)
		{
			return M('article')->delete($id);
		}
		public function art_save($data)
		{
			return M('article')->save($data);
		}
		
	}
	
?>