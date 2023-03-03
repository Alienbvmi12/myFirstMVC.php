<?php

class Series_model{
	protected $db;
	
	public function __construct(){
		$this->db = new Koneksi_db('anime');
	}
	public function anime(){
		$this->db->query("select * from list");
		return $this->db->resultSetAll();
	}
	
	public function getDetailById($no){
		$this->db->query("select * from list where no=:no");
		$this->db->bind("no", $no);
		return $this->db->resultSetSingle();
	}
	
	public function tambahAnime($data){
		$query = "insert into list values('', :judul, :kategori, :jumlah_episode, :deskripsi, '')";
		
		$this->db->query($query);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('kategori', $data['kategori']);
		$this->db->bind('jumlah_episode', $data['jumlah_episode']);
		$this->db->bind('deskripsi', $data['deskripsi']);
		
		$this->db->execute();
		
		return $this->db->rowCount();
	}
	
	public function hapusAnime($id){
		$query = "delete from list where no=:no";
		
		$this->db->query($query);
		$this->db->bind('no', $id);
		
		$this->db->execute();
		
		return $this->db->rowCount();
	}
	
	public function ubahAnime($data){
		$query = "update list set judul= :judul, kategori = :kategori, jumlah_episode = :jumlah_episode, deskripsi = :deskripsi where no = :no";
		
		$this->db->query($query);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('kategori', $data['kategori']);
		$this->db->bind('jumlah_episode', $data['jumlah_episode']);
		$this->db->bind('deskripsi', $data['deskripsi']);
		$this->db->bind('no', $data['no']);
		
		$this->db->execute();
		
		return $this->db->rowCount();
	}
	
	public function getSearch($key, $page){
		$this->db->query("select * from list where judul like :judul limit {$page},8");
		$this->db->bind('judul', "%{$key}%");
		//$this->db->bind('page', $page);
		
		$this->db->execute();
		
		return $this->db->resultSetAll();
	}
	
	public function getKategori(){
		$this->db->query("select * from kategori");
		$this->db->execute();
		return $this->db->resultSetAll();
	}
	
	public function countRow($key){
		$this->db->query("select * from list where judul like :judul");
		$this->db->bind('judul', "%{$key}%");
		$this->db->execute();
		return $this->db->rowCount();
	}
}
