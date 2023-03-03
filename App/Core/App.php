<?php

class App{
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];
	
	public function __construct(){
		$url = $this->Coba();
		
		//Cek apakah controller yang di request ada
		
		if($url == NULL){
			$url = [$this->controller];
		}
		
		if(file_exists('../app/controllers/'.$url[0].'.php')){
			$this->controller = $url[0];
			unset($url[0]);
		}
		
		//Memanggil controller
		
		require_once '../app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;
		
		//Cek apakah method ada di dalam class controller
		
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		//Mengisi parameter method dengan url jika ada
		
		if(!empty($url)){
			$this->params = array_values($url);
		}
		
		//Menjalankan Controller dan method, Serta mengirimkan parameter jika ada
		
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
	public function Coba(){
		if(isset($_GET['url'])){
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}