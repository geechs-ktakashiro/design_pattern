<?php

interface popcorn {
	public function get_price();
}

//コンポーネント
class popcorn_basic implements popcorn {
	public function get_price() {
		return 500;
	}
}

abstract class  popcorn_flavor implements popcorn {
	protected $money;

	function __construct(popcorn  $popcorn) {
		$this->popcorn = $popcorn;
	}  
	public function get_price() {
		return $this->popcorn->get_price() + $this->money;
	}
}  

//デコレーター
class solt_flavor extends popcorn_flavor {
	protected $money = 100;
	function __construct(popcorn $popcorn) {
		parent::__construct($popcorn);
	}
}

class cheese_flavor extends popcorn_flavor {
	protected $money = 1050;
	function __construct(popcorn $popcorn) {
		parent::__construct($popcorn);
	}
}
class choco_flavor extends popcorn_flavor {
	protected $money = 220;
	function __construct(popcorn $popcorn) {
		parent::__construct($popcorn);
	}
}


$popcorn = new popcorn_basic();
$popcorn = new choco_flavor($popcorn);
$popcorn = new solt_flavor($popcorn);
$popcorn = new cheese_flavor($popcorn);
echo $popcorn->get_price();



?>