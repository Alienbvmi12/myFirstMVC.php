<?php

class User extends Controller{
	public function index(){
		$data['page_title'] = "List User";
		$data['users'] = $this->model('User_model')->getAllName();
		$this->view('../template/head', $data);
		$this->view('User/index', $data);
		$this->view('../template/foot');
	}
	
	public function detail($id){
		$data['page_title'] = "Profil User";
		$data['users'] = $this->model('User_model')->getDetailById($id);
		$this->view('../template/head', $data);
		$this->view('User/detail', $data);
		$this->view('../template/foot');
	}
	
	public function tambah(){
		if($this->model('User_model')->tambahUser($_POST) > 0){
			Flasher::setFlash("Berhasil!!", "Tambah user", "success");
			header("location:".BASE_URL."User");
		}
		else{
			Flasher::setFlash("Gagal!!", "Tambah user", "danger");
			header("location:".BASE_URL."User");
		}
	}
	
	public function hapus($id, $miss = false){
		if($this->model('User_model')->hapusUser($id) > 0){
			Flasher::setFlash("Berhasil!!", "Hapus user", "success");
			header("location:".BASE_URL."User");
		}
		else{
			Flasher::setFlash("Gagal!!", "Hapus user", "danger");
			header("location:".BASE_URL."User");
		}
	}
	
	public function ubah(){
		if($this->model('User_model')->ubahUser($_POST) > 0){
			Flasher::setFlash("Berhasil!!", "Edit user", "success");
			header("location:".BASE_URL."User");
		}
		else{
			Flasher::setFlash("Gagal!!", "Edit user", "danger");
			header("location:".BASE_URL."User");
		}
	}
	
	public function getData(){
		echo json_encode($this->model('User_model')->getDetailById($_POST['id']));
	}
	
	public function prepSearch(){
		$_POST['key'] = str_replace(' ', "(Ini_Spasi)", $_POST['key']);
		header("location:".BASE_URL."User/search/{$_POST['key']}");
	}
	
	public function search($key = NULL){
		if(!$key == NULL){
			$key = str_replace('(Ini_Spasi)', ' ', $key);
		}
		$data['page_title'] = "List User";
		$data['users'] = $this->model('User_model')->getSearch($key);
		$data['key'] = $key;
		$this->view('../template/head', $data);
		$this->view('User/index', $data);
		$this->view('../template/foot');
	}
	
}