	<br>
	<div class="container">
		<div class="mt-4 mb-4 bg-light rounded p-5" style="height : 80rem;">
		<?php Flasher::flash();?>
		  <h1 class="display-4">Halaman List Anime</h1>
		   <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#form_tambah_anime" id="tamdat">
			  Tambah anime+
		  </button>
		  <br>
		    <form class="input-group mt-3" style="width : 600px;" action="<?=BASE_URL;?>Series/prepSearch" method="post">
			<input class="form-control" type="search" placeholder="Search" id="key" name="key" value="<?php if(isset($data['key']))print $data['key'];?>">
			<input type="hidden" placeholder="Search" id="page" name="page" value="0">
			<button class="btn btn-outline-success" type="submit">Search</button>
		  </form>
		  <br>
		<?php foreach($data['animes'] as $anime):?>
		<div class="card m-2 wider" style="float : left;">
			<div class="wider-cover">
			<img src="<?=BASE_URL?>Public/Assets/img/lumine.jpg" class="card-img-top wider">
			</div>
		  <div class="card-body">
			<h5 class="card-title" style="height : 50px; overflow:hidden;"><?=$anime['judul'];?></h5>
			<p class="card-subtitle mb-1">Episodes: <?=$anime['jumlah_episode'];?></p>
			<p class="card-subtitle mb-4" style="height : 70px; overflow : hidden;" 
			id="wsp<?=$anime['no'];?>"><?=$this->trim_me($anime['deskripsi'], 50);?></p>
			
			<a href="<?=BASE_URL;?>Series/hapus/<?=$anime['no'];?>" class="badge bg-danger" style="text-decoration : none;" onclick="return confirm('Yakin mau hapus <?=$anime['judul'];?>')">Delete</a>
			<a href="<?=BASE_URL;?>Series/edit/<?=$anime['no'];?>" class="badge bg-warning munmodal" style="text-decoration : none;" data-bs-toggle="modal" data-bs-target="#form_tambah_anime" data-no="<?=$anime['no'];?>">Edit</a>
			
		  </div>
		</div>
		 <?php endforeach;?>
		</div>
	</div>
	
		<!-- Modal -->
	<div class="modal fade" id="form_tambah_anime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content" >
		  <div class="modal-header">
			<h5 class="modal-title" id="judulmodal">Tambah data</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form action="<?=BASE_URL;?>Series/tambah" method="post" id="formtambah">
			<input type="hidden" name="no" id="no">
			<div class="mb-3">
				<label for="nama" class="form-label">Judul</label>
				<textarea class="form-control" id="judul" name="judul" required></textarea>
				<p class="form-label text-danger" id="judul-check"></p>
			</div>
			<div class="mb-3">
				<label for="nama" class="form-label">Jumlah episode</label>
				<input type="number" class="form-control" id="jumlah_episode" name="jumlah_episode" required>
				<p class="form-label text-danger" id="jumlah_episode-check"></p>
			</div>
			<div class="mb-3">
				<label for="nama" class="form-label">Kategori</label>
				<select class="form-control" id="kategori" name="kategori" required>
					<?php foreach($data['kategori'] as $kat):?>
						<option value="<?=$kat['kode_kategori'];?>"><?=$kat['nama_kategori'];?></option>
					<?php endforeach;?>
				</select>
				<p class="form-label text-danger" id="kategori-check"></p>
			</div>
			<div class="mb-3">
				<label for="nama" class="form-label">Deskripsi</label>
				<textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
				<p class="form-label text-danger" id="deskripsi-check"></p>
			</div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary " id="sumpit">Save changes</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
<script src="<?= BASE_URL;?>public/Assets/js/other/Series/Form.js"></script>