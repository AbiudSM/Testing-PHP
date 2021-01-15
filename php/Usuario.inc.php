<?php

/**
	
 */
class Usuario{
	private $idUsuario;
	private $name;
	private $email;
	private $password;
	private $date;

	public function __construct($idUsuario, $name, $email, $password, $date){
		$this -> idUsuario = $idUsuario;
		$this -> name = $name;
		$this -> email = $email;
		$this -> password = $password;
		$this -> date = $date;
	}

	# GETTERS
	public function getIdUsuario(){
		return $this -> id;
	}

	public function getName(){
		return $this -> nombre;
	}

	public function getEmail(){
		return $this -> email;
	}

	public function getPassword(){
		return $this -> password;
	}

	public function getDate(){
		return $this -> date(format);
	}


	#SETTERS
	public function setName($name){
		return $this -> nombre;
	}

	public function setEmail($email){
		return $this -> email;
	}

	public function setPassword($password){
		return $this -> password;
	}
}