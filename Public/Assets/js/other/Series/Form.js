
 
 //Untuk mengubah elemen modal
 $('#tamdat').on('click', function(){
	 $('#judulmodal').html('Tambah Anime');
	 $("#sumpit").html('Confirm');
	 $('#judul').val('');
	 $('#jumlah_episode').val('');
	 $('#kategori').val('');
	 $('#no').val('');
	 $('#deskripsi').val('');
	 $(".modal-body form").attr('action', 'http://localhost/Mvc_wpu/Series/tambah');
 });
 
 $(".munmodal").on('click', function(){
	 $("#judulmodal").html('Ubah info Anime');
	 $("#sumpit").html('Save and Changes');
	 $(".modal-body form").attr('action', 'http://localhost/Mvc_wpu/Series/ubah');
	 
	 const no = $(this).data('no');
	 
	 $.ajax({
		 method: 'post',
		 url: 'http://localhost/Mvc_wpu/public/Series/getData',
		 data: {no : no},
		 dataType : 'json',
		 success: function(data){
			 console.log(data);
			 $('#judul').val(data.judul);
			 $('#jumlah_episode').val(data.jumlah_episode);
			 $('#kategori').val(data.kategori);
			 $('#no').val(data.no);
			 $('#deskripsi').val(data.deskripsi);
		 }
	 });
 });