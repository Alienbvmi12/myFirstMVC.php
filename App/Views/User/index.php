<br>
	<div class="container">
		<div class="mt-4 bg-light rounded p-5">
		<?php Flasher::flash();?>
			<!-- Button trigger modal -->
		  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_tambah" id="tamdat">
			  Tambah data user+
		  </button>
		  <form class="input-group mt-3" style="width : 600px;" action="<?=BASE_URL;?>User/prepSearch" method="post">
			<input class="form-control" type="search" placeholder="Search" id="key" name="key"  value="<?php if(isset($data['key']))print $data['key'];?>">
			<button class="btn btn-outline-success" type="submit">Search</button>
		  </form>
		  <br>
		  <h1 class="display-4">Halaman List User</h1>
		  <br>
		<ul class="list-group aha">
			<?php foreach($data['users'] as $user):?>
				<li class="list-group-item align-items-center"
				style="width : 600px;">
				<?=$user['nama'];?>
				<a href="<?=BASE_URL;?>User/hapus/<?=$user['id'];?>" class="badge bg-danger" style="text-decoration : none;" onclick="return confirm('Yakin mau hapus <?=$user['nama'];?>')">Delete</a>
				<a href="<?=BASE_URL;?>User/edit/<?=$user['id'];?>" class="badge bg-warning munmodal" style="text-decoration : none;" data-bs-toggle="modal" data-bs-target="#form_tambah" data-id="<?=$user['id'];?>">Edit</a>
				<a href="<?=BASE_URL;?>User/detail/<?=$user['id'];?>" class="badge bg-primary" style="text-decoration : none;">Detail</a>
				</li>
			<?php endforeach;?>
		</ul>
		</div>
	</div>
	
<!-- Modal -->
<div class="modal fade" id="form_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodal">Tambah data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=BASE_URL;?>User/tambah" method="post" id="formtambah">
		<input type="hidden" name="id" id="id">
		<div class="mb-3">
			<label for="nama" class="form-label">Name</label>
			<input type="search" class="form-control" id="nama" name="nama" required>
			<p class="form-label text-danger" id="nama-check"></p>
		</div>
		<div class="mb-3">
			<label for="email" class="form-label">Email</label>
			<input type="search" class="form-control" id="email" name="email" required>
			<p class="form-label text-danger" id="email-check"></p>
		</div>
		<div class="mb-3">
			<label for="username" class="form-label">Username</label>
			<input type="search" class="form-control" id="username" name="username" required>
			<p class="form-label text-danger" id="username-check"></p>
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary " onclick="formcheck()" id="sumpit">Save changes</button>
		</form>
      </div>
    </div>
  </div>
</div>

<script src="<?= BASE_URL;?>public/Assets/js/other/User/Form.js"></script>