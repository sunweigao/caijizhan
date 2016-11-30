<?php

	interface Fruit

	{

	    const MAX_WEIGHT = 5;   //此处不用声明，就是一个静态常量

	    function setName($name);

	    function getName();

	}

	//实现接口

	class Apple implements Fruit

	{

	    private $name;

	    function getName() {

	        return $this->name;

	    }

	    function setName($_name) {

	        $this->name = $_name;

	    }

	}
	$apple = new Apple(); //创建对象

	$apple->setName("苹果");

	echo "创建了一个" . $apple->getName();

	echo "<br />";

	echo "MAX_GRADE is " . Apple::MAX_WEIGHT;   //静态常量

	?>