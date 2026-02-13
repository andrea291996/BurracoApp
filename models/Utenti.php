<?php

/* 
*  ClassName: Utenti
*  Generated: 2026-01-28 16:13:43
*  Author: Andrea Carminati NUOVO
*  Table: utenti
*  Database: oop
*/

define("UTENTI_TABLE","utenti");

class Utenti extends DBObject
{
	protected $uid;
	protected $nome;
	protected $cognome;
	protected $data_nascita;

	// Class Constructor
	public function __construct() {
		parent::__construct(UTENTI_TABLE);
        $this->primaryKey="uid";
		return $this;
	}
	//Getter methods
	function getuid(){
		return $this->uid;
	}

	function getnome(){
		return $this->nome;
	}

	function getcognome(){
		return $this->cognome;
	}

	function getdata_nascita(){
		return $this->data_nascita;
	}


	//Setter methods
	function setuid($value){
		$this->uid=$value;
	}

	function setnome($value){
		$this->nome=$value;
	}

	function setcognome($value){
		$this->cognome=$value;
	}

	function setdata_nascita($value){
		$this->data_nascita=$value;
	}

}