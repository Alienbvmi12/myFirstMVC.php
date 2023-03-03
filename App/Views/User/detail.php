<div class="container">
	<div class="mt-4 bg-light rounded p-5">
		<div class="card" style="width: 18rem;">
		  <img src="<?=BASE_URL?>Public/Assets/img/lumine.jpg" class="card-img-top">
		  <div class="card-body">
			<h5 class="card-title"><?=$data['users']['nama']?></h5>
			<p class="card-subtitle mb-1"><?=$data['users']['username']?></p>
			<p class="card-subtitle mb-4"><?=$data['users']['email']?></p>
			<a href="<?=BASE_URL?>User" class="btn btn-link">Back</a>
		  </div>
		</div>
	</div>
</div>