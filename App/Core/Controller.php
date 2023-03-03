<?php

class Controller{
	public function view($view, $data = []){
		require_once "../app/views/".$view.".php";
	}	
	public function model($model){
		require_once "../app/models/".$model.".php";
		$model = new $model;
		return $model;
	}		
	public function trim_me($s,$max) {
		if (strlen($s) > $max) {
			$s = substr($s, 0, $max - 3) . '...';
		}
		return $s;
	}
}