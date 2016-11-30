<?php
	namespace Admin\Model;
	use Think\Model;
	class CategoryModel extends Model 
	{
	    protected $tableName = 'category'; 
	    public function data_sel()
	    {
	    	return M('category')->select();
	    }
	}
	
?>