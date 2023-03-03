const BASE_URL = "http://localhost/Mvc_wpu/";

function trap(){
	alert('Masuk perangkap kamu!!');
	alert('Close aku dong');
	alert('Kenapa?');
	alert('Kok masih ada?');
	alert('Kasian');
	trap();
}

function setWidth(renUser, renAnime){
	let setWidth = {};
	setWidth.anime = function(){
		if(screen.width > 1199){
			if(renAnime > 4){
				$(".over").css("height", "1000px");
			}
			else{
				$(".over").css("height", "580px");
			}
			$(".over").css("overflow", "hidden");
		}
		else if(screen.width <= 1199 && screen.width >= 992){
			if(renAnime > 4){
				$(".over").css("height", "1000px");
			}
			else{
				$(".over").css("height", "580px");
			}
			$(".over").css("overflow", "hidden");
		}
		else if(screen.width <= 991 && screen.width >= 768){
			if(renAnime > 2){
				$(".over").css("height", "1000px");
				$(".over").css("overflow", "scroll");
			}
			else{
				$(".over").css("height", "600px");
				$(".over").css("overflow", "hidden");
			}
		}
		else if(screen.width <= 767){
			if(renAnime > 1){
				$(".over").css("height", "1000px");
				$(".over").css("overflow", "scroll");
			}
			else{
				$(".over").css("height", "600px");
				$(".over").css("overflow", "scroll");
			}
		}
	}
	setWidth.user = function(){
		if(screen.width > 1199){
			if(renUser > 4){
				$(".overuser").css("height", "1000px");
			}
			else{
				$(".overuser").css("height", "580px");
			}
			$(".overuser").css("overflow", "hidden");
		}
		else if(screen.width <= 1199 && screen.width >= 992){
			if(renUser > 4){
				$(".overuser").css("height", "1000px");
			}
			else{
				$(".overuser").css("height", "580px");
			}
			$(".overuser").css("overflow", "hidden");
		}
		else if(screen.width <= 991 && screen.width >= 768){
			if(renUser > 2){
				$(".overuser").css("height", "1000px");
				$(".overuser").css("overflow", "scroll");
			}
			else{
				$(".overuser").css("height", "600px");
				$(".overuser").css("overflow", "hidden");
			}
		}
		else if(screen.width <= 767){
			if(renUser > 1){
				$(".overuser").css("height", "1000px");
				$(".overuser").css("overflow", "scroll");
			}
			else{
				$(".overuser").css("height", "600px");
				$(".overuser").css("overflow", "scroll");
			}
		}
	}
	return setWidth;
}

let run = setWidth(renUser, renAnime);

run.anime();
run.user();