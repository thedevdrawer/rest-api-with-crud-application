<?php
//1 add interface
Interface Employee {
	public function welcome() : string;
}

//3 extending interfaces
Interface Employee2 extends Employee {
	public function bye();
}

Trait Wave {
	public function wave(){
		return $this->name.' just waved to you.<br>';
	}
}

class Developer implements Employee {
	use Wave; //you can call multiple traits if you have them by adding a comma
	public $name;
	public function __construct($name) {
		$this -> name = $name;
	}
	public function welcome() : string {
		return 'Hello, my name is '. $this->name.', I am a developer.<br>';
	}

	public function bye() {
		return 'Bye now.<br>'.$this->wave();
	}
}

//1 you can use extends and implements at the same time
//2 add Developer extends Employees, will not change what we have here but you can use functions from another class by extending it here as well