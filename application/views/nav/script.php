<script type="text/javascript">

 function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function upLogo(){
	$('#upload').on('click', function () {
        var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: 'http://localhost/ci/index.php/welcome/upload', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                $('#msg').html(response); // display success response from the server
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });
    });
    }

function sw1() {
    Swal.fire({
    	title: 'Tambah warna baru',
		html:
		  	'<form method="post" class="form-user">'+
		    '<input id="s1" name="kode" class="swal2-input" placeholder="Kode Warna">' +
		    '<input id="s2" name="label" class="swal2-input" placeholder="Label Warna">'+
		    '</form>',
		showCancelButton: true,
		confirmButtonText: 'Simpan',
		cancelButtonText: 'Batal',
		cancelButtonColor: 'red',
		showLoaderOnConfirm: true
    }).then(result => {
  	if (result.value) {
  		var data = $('.form-user').serialize();
  		var ab = $('#s2').val();
  		var aa = $('#s1').val();
  		// alert(ab + " " + aa);
		$.ajax({
        	url: 'http://localhost/Portal/Custom/saveWarna',
            type: 'POST',
            data: {kode: aa, label: ab},
            error: function() {
           		Swal.fire('Kesalahan !!','Koneksi ke server gagal !!', "error");
           		console.log(data);
           	},
           	success: function() {
                Swal.fire({
                 	title: 'Sukses',
                 	text: 'Warna berhasil disimpan !!',
                 	type: "success",
                 	timer: 3000
                 });
				$("#warna").load('<?php echo base_url('Custom/ewarna')?>');
      //           setTimeout(function() 
  				// {
    		// 	location.reload();  //Refresh page
  				// }, 100);
           }
        });
  	}
	else{
		Swal.fire('Kesalahan !!','Warna tidak disimpan !!', "error");
	}
	})
}

function nama() {
    Swal.fire({
    	title: 'Ganti Nama Sekolah',
		html:
		  	'<form method="post" class="form-user">'+
		    '<input id="s1" name="kode" class="swal2-input" placeholder="Nama Sekolah">' +
		    '</form>',
		showCancelButton: true,
		confirmButtonText: 'Perbaharui',
		cancelButtonText: 'Batal',
		cancelButtonColor: 'red',
		showLoaderOnConfirm: true
    }).then(result => {
  	if (result.value) {
  		var data = $('.form-user').serialize();
  		var ab = $('#s2').val();
  		var aa = $('#s1').val();
  		// alert(ab + " " + aa);
		$.ajax({
        	url: 'http://localhost/Portal/Custom/upNama',
            type: 'POST',
            data: {kode: aa},
            error: function() {
           		Swal.fire('Kesalahan !!','Koneksi ke server gagal !!', "error");
           		console.log(data);
           	},
           	success: function() {
                Swal.fire({
                 	title: 'Sukses',
                 	text: 'Nama Sekolah berhasil disimpan !!',
                 	type: "success",
                 	timer: 3000
                 });
				getSek();
           }
        });
  	}
	else{
		Swal.fire('Kesalahan !!','Nama Sekolah tidak disimpan !!', "error");
	}
	})
}

function delWarna(ab, aa) {
    Swal.fire({
    	title: 'Hapus Warna',
    	text: 'Apakah anda ingin menghapus warna ini ( ' + aa + ' ) ?',
    	type: "question",
		showCancelButton: true,
		confirmButtonText: 'Ya, Hapus',
		cancelButtonText: 'Batal',
		cancelButtonColor: 'red',
		showLoaderOnConfirm: true
    }).then(result => {
  	if (result.value) {
  		// alert(ab + " " + aa);
		$.ajax({
        	url: 'http://localhost/Portal/Custom/remWarna',
            type: 'POST',
            data: {id: ab,},
            error: function() {
           		// alert('Something is wrong');
           		Swal.fire('Kesalahan !!','Koneksi ke server gagal !!', "error");
           	},
           	success: function() {
                Swal.fire({
                 	title: 'Sukses',
                 	text: 'Warna berhasil dihapus !!',
                 	type: "success",
                 	timer: 3000
                 });
                $("#warna").load('<?php echo base_url('Custom/ewarna')?>');
      //           setTimeout(function() 
  				// {
    		// 	location.reload();  //Refresh page
  				// }, 100);
           }
        });
  	}
  	else{
		Swal.fire('Kesalahan !!','Warna tidak jadi dihapus !!', "error");
	}
	})
}

         function hps(a) {
          Swal.fire({
            title: 'Hapus Siswa',
            text: 'Apakah anda ingin menghapus siswa ini ?',
            type: "question",
          showCancelButton: true,
          confirmButtonText: 'Ya, Hapus',
          cancelButtonText: 'Batal',
          cancelButtonColor: 'red',
          showLoaderOnConfirm: true
          }).then(result => {
          if (result.value) {
            // alert(ab + " " + aa);
          $.ajax({
                url: 'http://localhost/Portal/Custom/siswahapu',
                  type: 'POST',
                  data: {id: a},
                  error: function() {
                    // alert('Something is wrong');
                    Swal.fire('Kesalahan !!','Koneksi ke server gagal !!', "error");
                  },
                  success: function() {
                      Swal.fire({
                        title: 'Sukses',
                        text: 'Siswa berhasil dihapus !!',
                        type: "success",
                        timer: 3000
                       });
                      location.reload()
            //           setTimeout(function() 
                // {
              //  location.reload();  //Refresh page
                // }, 100);
                 }
              });
          }
          else{
          Swal.fire('Kesalahan !!','SIswa tidak jadi dihapus !!', "error");
        }
        })
      }

</script>

