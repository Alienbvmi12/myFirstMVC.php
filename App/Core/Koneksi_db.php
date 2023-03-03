<?php

class Koneksi_db{
	private $host = HOST;
	private $username = USERNAME;
	private $password = PASSWORD;
	private $database = DATABASE;
	private $dbh, $stm;
	private $option = [
		PDO::ATTR_PERSISTENT => true,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	];
	
	public function __construct($database = DATABASE){
		$this->database = $database;
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->database;
		try{
			$this->dbh = new PDO($dsn, $this->username, $this->password, $this->option);
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	
	public function query($query){
		$this->stm = $this->dbh->prepare($query);	
	}
	
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
				$type = PDO::PARAM_STR;
			}
		}
		$this->stm->bindValue($param, $value, $type);
	}
	
	public function execute(){
		$this->stm->execute();
	}

	public function resultSetAll(){
		$this->stm->execute();
		return $this->stm->fetchAll(PDO::FETCH_ASSOC);
	}
	public function resultSetSingle(){
		$this->stm-> execute();
		return $this->stm->fetch(PDO::FETCH_ASSOC);
	}
	public function rowCount(){
		return $this->stm->rowCount();
	}
}

