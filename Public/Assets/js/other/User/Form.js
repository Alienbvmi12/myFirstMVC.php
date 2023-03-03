  function formcheck(){
	 const nama = document.getElementById("nama");
	 const email = document.getElementById("email");
	 const username = document.getElementById("username");
	 if(!nama.checkValidity() || !email.checkValidity() || !username.checkValidity()){
		 if(!nama.checkValidity()){
			document.getElementById("nama-check").innerHTML = "<small>"+nama.validationMessage+"</small>";
		 }
		 else{
			document.getElementById("nama-check").innerHTML = "";
		 }
		 if(!email.checkValidity()){
			document.getElementById("email-check").innerHTML = "<small>"+email.validationMessage+"</small>";
		 }
		 else{
			document.getElementById("email-check").innerHTML = "";
		 }
		 if(!username.checkValidity()){
			document.getElementById("username-check").innerHTML = "<small>"+username.validationMessage+"</small>";
		 } 
		 else{
			document.getElementById("username-check").innerHTML = "";
		 } 
	 }
	 else{
		$("#formtambah").submit();
	 }
 }
 
 //Untuk mengubah elemen modal
 $('#tamdat').on('click', function(){
	 $('#judulmodal').html('Tambah Data');
	 $("#sumpit").html('Confirm');
	 $('#nama').val('');
	 $('#email').val('');
	 $('#username').val('');
	 $('#id').val('');
	 $(".modal-body form").attr('action', 'http://localhost/Mvc_wpu/User/tambah');
 });
 
 $(".munmodal").on('click', function(){
	 $("#judulmodal").html('Ubah data User');
	 $("#sumpit").html('Save and Changes');
	 $(".modal-body form").attr('action', 'http://localhost/Mvc_wpu/public/User/ubah');
	 
	 const id = $(this).data('id');
	 
	 $.ajax({
		 method: 'post',
		 url: 'http://localhost/Mvc_wpu/public/User/getData',
		 data: {id : id},
		 dataType : 'json',
		 success: function(data){
			 console.log(data);
			 $('#nama').val(data.nama);
			 $('#email').val(data.email);
			 $('#username').val(data.username);
			 $('#id').val(data.id);
		 }
	 });
 });