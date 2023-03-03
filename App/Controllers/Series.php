<?php 

class Series extends Controller{
	protected  $tb = "anime",
			 $ctn = "Series";
			 
	public function index($genre = 'action', $judul = 'One Punch Man'){
		$data['page_title'] = "Anime";
		$data['animes'] = $this->model('Series_model')->anime();
		$data['kategori'] = $this->model('Series_model')->getKategori();
		$this->view('../template/head', $data);
		$this->view('Series/index', $data);
		$this->view('../template/foot');
	}
	public function tambah(){
		if($this->model('Series_model')->tambahAnime($_POST) > 0){
			Flasher::setFlash("Berhasil!!", "Tambah ".$this->tb, "success");
			header("location:".BASE_URL.$this->ctn);
		}
		else{
			Flasher::setFlash("Gagal!!", "Tambah ".$this->tb, "danger");
			header("location:".BASE_URL.$this->ctn);
		}
	}
	
	public function hapus($id, $miss = false){
		if($this->model('Series_model')->hapusAnime($id) > 0){
			Flasher::setFlash("Berhasil!!", "Hapus ".$this->tb, "success");
			header("location:".BASE_URL.$this->ctn);
		}
		else{
			Flasher::setFlash("Gagal!!", "Hapus ".$this->tb, "danger");
			header("location:".BASE_URL.$this->ctn);
		}
	}
	
	public function ubah(){
		if($this->model('Series_model')->ubahAnime($_POST) > 0){
			Flasher::setFlash("Berhasil!!", "Edit ".$this->tb, "success");
			header("location:".BASE_URL.$this->ctn);
		}
		else{
			Flasher::setFlash("Gagal!!", "Edit ".$this->tb, "danger");
			header("location:".BASE_URL.$this->ctn);
		}
	}
	public function getData(){
		echo json_encode($this->model('Series_model')->getDetailById($_POST['no']));
	}
	
	public function prepSearch(){
		$_POST['key'] = str_replace(' ', "-", $_POST['key']);
		header("location:".BASE_URL."Series/search/{$_POST['key']}/1");
	}
	
	public function search($key = NULL, $page = 1){
		if(!$key == NULL){
			$key = str_replace('-', ' ', $key);
		}
		$page_index = ($page-1) * 10;
		$data['page_title'] = "Anime";
		$data['animes'] = $this->model('Series_model')->getSearch($key, $page_index);
		$data['key'] = $key;
		$this->view('../template/head', $data);
		$this->view('Series/index', $data);
		$this->pagination($page, $this->model('Series_model')->countRow($key), $key);
		$this->view('../template/foot');
	}
	
	public function pagination($page, $number_of_result, $search){
		$number_of_page = ceil($number_of_result / 10);
		$pagen = $page-1;
		$pagep = $page+1;
		if($page == 1) $pagen = 1;
		if($page == $number_of_page) $pagep = $number_of_page;
		echo '
		<br>
		<center>
		<a class="btn btn-outline-primary" href="'.BASE_URL.'Series/search/'.$search.'/'.$pagen.'" style="border-radius : 50px;">&lt;</a>
		<div class="btn-group" role="group" aria-label="Basic example" id="butang">';
		if($number_of_page <= 3){
			for($pagem = 1; $pagem<= $number_of_page; $pagem++){ 
				if($pagem == $page){
					self::butt($pagem, $search);
				}
				else{
					self::butto($pagem, $search);
				}
			}
		}
		else{
			for($pagem = 1; $pagem<= $number_of_page; $pagem++){ 
				if($page <= 2){
					for($pagem = 1; $pagem<= $number_of_page; $pagem++){ 
						if($pagem <= 3){
							if($pagem == $page){
								self::butt($pagem, $search);
							}
							else{
								self::butto($pagem, $search);
							}
						}
					}
					echo "<button class=\"btn btn-outline-primary\">...</button>";
					self::butto($number_of_page, $search);
				}
				else if($page >= $number_of_page-1){
				self::butto(1, $search);
					echo "<button class=\"btn btn-outline-primary\">...</button>";
					for($pagem = $page-1; $pagem<= $number_of_page; $pagem++){ 
						if($pagem <= $page+1){
							if($pagem == $page){
								self::butt($pagem, $search);
							}
							else{
								self::butto($pagem, $search);
							}
						}
					}	
				}
				else if($page >= 3){
					self::butto(1, $search);
					echo "<button class=\"btn btn-outline-primary\">...</button>";
					for($pagem = $page-1; $pagem<= $number_of_page; $pagem++){ 
						if($pagem <= $page+1){
							if($pagem == $page){
								self::butt($pagem, $search);
							}
							else{
								self::butto($pagem, $search);
							}
						}
					}
					echo "<button class=\"btn btn-outline-primary\">...</button>";
					self::butto($number_of_page, $search);
				}
			}
		}
		echo '</div>
		<a class="btn btn-outline-primary" href="'.BASE_URL.'Series/search/'.$search.'/'.$pagep.'" style="border-radius : 50px;">&gt;</a>
		</center>
		<br>
		<br>
		<br>';
	}

	public function butt($pagem, $search){
		echo "
		<a class=\"btn btn-primary\" id=\"butang".$pagem."\">".$pagem."</a>";
	}

	public function butto($pagem, $search){
		echo "<a class=\"btn btn-outline-primary\" href=\"".BASE_URL."Series/search/{$search}/{$pagem}\" id=\"butang".$pagem."\">".$pagem."</a>";
	}
}