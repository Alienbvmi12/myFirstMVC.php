<?php

class User_model{
	protected $db;
	
	public function __construct(){
		$this->db = new Koneksi_db('Mvc_wpu');
	}
	public function getAllName(){
		$this->db->query("select * from users");
		return $this->db->resultSetAll();
	}
	public function getDetailById($id){
		$this->db->query("select * from users where id=:id");
		$this->db->bind("id", $id);
		return $this->db->resultSetSingle();
	}
	public function tambahUser($data){
		$query = "insert into users values('', :nama, :username, :email)";
		
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		
		$this->db->execute();
		
		return $this->db->rowCount();
	}
	
	public function hapusUser($id){
		$query = "delete from users where id=:id";
		
		$this->db->query($query);
		$this->db->bind('id', $id);
		
		$this->db->execute();
		
		return $this->db->rowCount();
	}
	
	public function ubahUser($data){
		$query = "update users set nama = :nama, 
					username = :username, 
					email = :email where id = :id";
		
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('id', $data['id']);
		
		$this->db->execute();
		
		return $this->db->rowCount();
	}
	
	public function getSearch($key){
		$this->db->query("select * from users where nama like :nama");
		$this->db->bind('nama', "%{$key}%");
		
		$this->db->execute();
		
		return $this->db->resultSetAll();
	}
	
}