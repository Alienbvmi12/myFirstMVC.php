<?php

class Search extends Controller{
	public function index($key = NULL){
		$rawKey = $key;
		if(!$key == NULL){
			$key = str_replace('-', ' ', $key);
		}
		$data['page_title'] = "Search";
		$data['anime'] = $this->model('Series_model')->getSearch($key, 0);
		$data['user'] = $this->model('User_model')->getSearch($key, 0);
		$data['key'] = $key;
		$data['rawkey'] = $rawKey;
		$this->view('../template/head', $data);
		$this->view('Search/index', $data);
		$this->view('../template/foot');
	}
	public function prepSearch(){
		$_POST['key'] = str_replace(' ', "-", $_POST['key']);
		header("location:".BASE_URL."Search/index/{$_POST['key']}");
	}
}