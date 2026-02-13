<?php

/* 
*  ClassName: Account
*  Generated: 2026-01-28 16:13:43
*  Author: Andrea Carminati NUOVO
*  Table: account
*  Database: oop
*/

define("ACCOUNT_TABLE","account");

class Account extends DBObject
{
	protected $aid;
	protected $username;
	protected $password;
	protected $email;
	protected $active=1;
	protected $uid;

	// Class Constructor
	public function __construct() {
		parent::__construct(ACCOUNT_TABLE);
        $this->primaryKey="aid";
		return $this;
	}
	//Getter methods
	function getaid(){
		return $this->aid;
	}

	function getusername(){
		return $this->username;
	}

	function getpassword(){
		return $this->password;
	}

	function getemail(){
		return $this->email;
	}

	function getactive(){
		return $this->active;
	}

	function getuid(){
		return $this->uid;
	}


	//Setter methods
	function setaid($value){
		$this->aid=$value;
	}

	function setusername($value){
		$this->username=$value;
	}

	function setpassword($value){
		$this->password=$value;
	}

	function setemail($value){
		$this->email=$value;
	}

	function setactive($value){
		$this->active=$value;
	}

	function setuid($value){
		$this->uid=$value;
	}

}