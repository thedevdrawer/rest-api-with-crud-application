<?php
//class
abstract class Employees {
	//properties
	public $companyName;
	public $contactInfo;
	public $title;
	public $name;
	private $state;
	private $allowedStates = [
		'California', 'New York', 'Florida', 'Mississippi'
	];
	//remove $title from construct
	public function __construct($name, $title){
		$this->companyName = 'Acme Company';
		$this->contactInfo['email'] = 'test@example.com';
		$this->contactInfo['phone'] = '123-456-7890';
		$this->contactInfo['fax'] = '123-456-7899';
		$this->title = $title;
		$this->name = $name;
	}

	/*
	abstract
	1 remove the __constructor inheritance in person->getPerson

	2 add abstraction class, developer and design class, and welcome method to employees, add to person as string

	3 Abstraction classes are important when you need child classes to define a method. Usually it is used when the parent class is inherited by multiple child classes like we did with person, developer, and designer

	*/
	abstract public function welcome() : string;

	public function __destruct(){
		//echo 'The employee named '.$this->name.' has a title of '.$this->title.' in '.$this->state.'<br>';
	}

	//methods
	public function setEmployee($email, $phone, $fax) {
		$this->contactInfo['email'] = $email;
		$this->contactInfo['phone'] = $phone;
		$this->contactInfo['fax'] = $fax;
	}
}