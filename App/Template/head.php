<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['page_title'];?></title>
	<link rel="stylesheet" href="<?= BASE_URL;?>public/Assets/css/other/other.css">
	<link rel="stylesheet" href="<?= BASE_URL;?>public/Assets/css/bootstrap/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?= BASE_URL;?>public/Assets/js/jquery/jquery-3.5.1.min.js"></script>
	<style>
	img{width : 200px;}

	.wider{
		width: 284px;
	}
	.wider-cover{
		height : 200px;
		overflow  : hidden;
	}
	@media only screen and (max-width: 1400px){
		.wider{
			width: 239px;
		}
	}
	@media only screen and (max-width: 1199.5px){
		.wider{
			width: 194px;
		}
	}
	@media only screen and (max-width: 991.5px){
		.wider{
			width: 284px;
		}
	}
	@media only screen and (max-width: 767.5px){
		.wider{
			width: 398px;
		}
	}
	@media only screen and (max-width: 575.5px){
		.wider{
			width: 100%;
		}
	}
	
	</style>
</head>
<body onresize="run.anime();run.user();">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
	  <div class="container-fluid">
		<a class="navbar-brand" href="<?=BASE_URL?>">Alien_bvmi12</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarScroll">
		  <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASE_URL;?>Series/search/+/1">Anime</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?= BASE_URL;?>User">Users</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" onclick="trap()" id="trap" style="cursor : pointer;">Trap</a>
			</li>
		  </ul>
		  <form class="d-flex" action="<?=BASE_URL;?>Search/prepSearch" method="post" role="search">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key" value="<?php if(isset($data['key'])){print $data['key'];}?>">
			<button class="btn btn-outline-success" type="submit">Search</button>
		  </form>
		</div>
	  </div>
	</nav>
	