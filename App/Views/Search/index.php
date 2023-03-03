	<div class="container mt-5">
		<div class="mt-4 bg-light rounded p-5 over">
		  <h3 class="display-4">Anime result for "<?=$data['key'];?>"</h3>
		  <hr>
		  <br>
		<?php 
		$ren = 0;
		foreach($data['anime'] as $anime):
			if($ren <= 7){?>
			<div class="card m-2 wider" style=" float : left;  height : 330px;">
			<div class="card-img-top wider-cover">
				<img src="<?=BASE_URL?>Public/Assets/img/lumine.jpg" class="wider">
			</div>
			  <div class="card-body">
				<h6 class="card-title" style="height : 60px; overflow:hidden;"><?=$anime['judul'];?></h6>
				<p class="card-subtitle mb-1">Episodes: <?=$anime['jumlah_episode'];?></p>
			  </div>
			</div>
		<?php
			$ren++;}
			else{ 
				print '<a href="'.BASE_URL.'/Series/search/'.$data['rawkey'].'"><button class="btn btn-link mt-4"><h3>More...</h3></button></a>';
				break;
			};
		endforeach;?>
		</div>
		<br>
		<a class="m-3 btn btn-link" href="<?=BASE_URL;?>Series/search/<?=$data['rawkey'];?>/1"><h2>More result of "<?=$data['key'];?>"</h2></a>
	</div>
	
	<script>var renAnime = <?=$ren;?></script>
	<br>
	
	<div class="container">
		<div class="mt-4 bg-light rounded p-5 overuser">
		  <h3 class="display-4">User result for "<?=$data['key'];?>"</h3>
		  <hr>
		  <br>
		<?php 
		$ren = 0;
		foreach($data['user'] as $user):
			if($ren <= 7){?>
			<div class="card m-2 wider" style="float : left;  height : 300px;" >
				<div class="card-img-top wider-cover">
				<img src="<?=BASE_URL?>Public/Assets/img/lumine.jpg" class="wider">
			</div>
			  <div class="card-body">
				<h6 class="card-title" style="overflow:hidden;"><?=$user['nama'];?></h6><small>
				<small><p class="card-subtitle mb-1"><?=$user['username'];?></p></small>
				<small><p class="card-subtitle mb-1"><?=$user['email'];?></p></small></small>
			  </div>
			</div>
		<?php
			$ren++;}
			else break;
		endforeach;?>
		</div>
	</div>
	
	<script>var renUser = <?=$ren;?></script>
	

	
	
	
	