<?php

class Home extends Controller{
	public function index(){
		$data['page_title'] = "Homepage";
		$this->view('../template/head', $data);
		$this->view('home/index', $data);
		$this->view('../template/foot');
	}
	
}