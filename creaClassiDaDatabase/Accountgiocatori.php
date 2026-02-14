<?php

/* 
*  ClassName: Accountgiocatori
*  Generated: 2026-02-14 11:29:04
*  Author: Andrea Carminati
*  Table: accountgiocatori
*  Database: burraco
*/

define("ACCOUNTGIOCATORI_TABLE","accountgiocatori");

class Accountgiocatori extends DBObject
{
	protected $idgiocatore;
	protected $idcompagno;
	protected $nome;
	protected $cognome;
	protected $email;
	protected $password;

	// Class Constructor
	public function __construct() {
		parent::__construct(ACCOUNTGIOCATORI_TABLE);
        $this->primaryKey="idgiocatore";
		return $this;
	}
	//Getter methods
	function getidgiocatore(){
		return $this->idgiocatore;
	}

	function getidcompagno(){
		return $this->idcompagno;
	}

	function getnome(){
		return $this->nome;
	}

	function getcognome(){
		return $this->cognome;
	}

	function getemail(){
		return $this->email;
	}

	function getpassword(){
		return $this->password;
	}


	//Setter methods
	function setidgiocatore($value){
		$this->idgiocatore=$value;
	}

	function setidcompagno($value){
		$this->idcompagno=$value;
	}

	function setnome($value){
		$this->nome=$value;
	}

	function setcognome($value){
		$this->cognome=$value;
	}

	function setemail($value){
		$this->email=$value;
	}

	function setpassword($value){
		$this->password=$value;
	}

}