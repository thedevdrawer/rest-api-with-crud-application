<?php
include 'class.employees.php';
//class
class Person extends Employees {
	//methods
	public function getPerson() {
		//loading for employees class
		echo '1. Hello, my name is '.$this->name.'. I work for '.$this->companyName.' as a '.$this->title.'.';
		echo '<br>';

		//4
		parent::__construct('Test Person', 'Quality Control');

		//5
		$this->companyName = 'Test';

		//once done, you cannot use this to refer to a parent method, you must now refer to it using parent::

		//you can use the final keyword to prevent this from happening, you can prevent inheritance using this on your class, show on the parent
		//loading from getPerson method
		echo '2. Hello, my name is '.$this->name.'. I work for '.$this->companyName.' as a '.$this->title.'.';
		echo '<br>';
	}

	public function welcome() : string {
		//return 'Hello, my name is '. $this->name.'<br>';
	}

}

// after abstraction
/*
remove for interface
class Developer extends Employees {
	public function welcome() : string {
		return 'Hello, my name is '. $this->name.', I am a developer.<br>';
	}
}
*/

class Designer extends Employees {
	public function welcome() : string {
		return 'Hello, my name is '. $this->name.', I am a designer.<br>';
	}
}