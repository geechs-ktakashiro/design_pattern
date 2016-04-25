<?php
//state class
interface State { 
	public function getState();
	public function nextState();
}


//ConcreteState
class BaseState {
	static protected $span=0;
	public function getState(){
		return get_class($this);
	}
	public function time_fly($days){
		self::$span += $days;
	}
	public function nextState(){
		switch(true) {
			case self::$span < 7:
			//このnewをシングルトンでかく
			return new new_arrive();
			break;
			case self::$span >= 7 && self::$span < 14:
			return new usual();
			break;
			case self::$span <= 14 :
			return new dead_line();
			break;
			
		}
	}
}

class new_arrive extends BaseState implements State {
}

class usual extends BaseState implements State {
} 

class dead_line extends BaseState implements State {	
} 


//Context
class item_cycle {
	private $state;
	public function __construct() {
		$this->state = new new_arrive();
	}
	public function getState() {
		$this->state = $this->state->nextState();
		echo $this->state->getState().PHP_EOL;
	}

	public function time_fly($days) {
		$this->state->time_fly($days);
	}
}

$item = new item_cycle();
$item->getState();
$item->time_fly(7);
$item->getState();
$item->time_fly(7);
$item->getState();






