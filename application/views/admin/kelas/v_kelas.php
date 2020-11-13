<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="modal fade tmbMapelModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" >
        <div class="modal-body">

            <div class="row">
              <div class="col-md-12">


                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama Mapel" required>
                </div>

              </div>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btnSaveKelas">Save Data</button>
        </div>

        </form>

      </div>
    </div>
  </div>

  <!---========================================== Edit Modal ---------------------------------->
  <div class="modal fade editTugasModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Mapel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" >
        <div class="modal-body">
          <input type="hidden" name="" id="kodeQuiz">
          <div class="form-group">
              <label for="nama_materi">Nama Mapel</label>
              <input type="text" name="namaMateri" class="form-control" id="nama_mapelEdit" placeholder="Masukkan Nama Mapel">
            </div>
            <input type="hidden" name="idKls" id="idMapel">
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btnEditQuiz">Edit</button>
        </div>

        </form>

      </div>
    </div>
  </div>


<!--
  -------------------------------- Modal Daftar Guru ------------------------------------------------------ -->
  <div class="modal fade" id="bootstrap-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" >
        <div class="modal-body">

            <div id="demo-modal">

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btnSaveMapel">Save Data</button>
        </div>

        </form>

      </div>
    </div>
  </div>
  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">

      <h1 class="h3 mb-2 text-gray-800">Kelas</h1>
<br>
          <div class="ui right aligned grid">
            <div class="">

                <button type="button" class="btn btn-sm btn-primary mb-2" id="tmbMapelModal" name="button" data-toggle="modal" data-target=".tmbMapelModal"> <b> + </b>Tambah Kelas</button>

            </div>
          </div>




          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kelas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Kelas</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/v_footer'); ?>
<script type="text/javascript">
// Material Select Initialization

$('.select2').select2();

$('#nip').inputmask();
$('#tglLahir').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
$('[data-mask]').inputmask();

var table = null;
var no = 1;
$(document).ready(function() {

  $.ajax({
    url : 'http://localhost/e_rapot/A_guru/first_read',
    method: 'GET',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {},
    success: function(data){
      $('#password').val(data.pwdGuru);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });




tabel = $('#example1').DataTable({

            "ajax":
            {
              "dataSrc": "dataKelas",
              "url": "http://localhost/e_rapot/A_kelas/loadKelas", // URL file untuk proses select datanya
              "type": "GET"
            },

            // "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = no++;
                  return html
                }
              },
              { "data": "nama_kls" }, // Tampilkan nis

              // { "render": function ( data, type, row ) {  // Tampilkan jenis kelamin
              //     var html = ""
              //     if(row.jenis_kelamin == 1){ // Jika jenis kelaminnya 1
              //       html = 'Laki-laki' // Set laki-laki
              //     }else{ // Jika bukan 1
              //       html = 'Perempuan' // Set perempuan
              //     }
              //     return html; // Tampilkan jenis kelaminnya
              //   }
              // },
               // Tampilkan alamat
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = '<button class="btn btn-outline-secondary btn-sm" onClick="loadDynamicContentModal(\'' + row.kode_kls + '\')"> Daftar Guru <i class="far fa-id-card" style="font-size: 20px; margin-top: 5px"></i> </button> ';
                  html += '<button class="btn btn-outline-primary btn-sm" onClick="aksiTambah(\'' + row.kode_kls + '\')"> Tambah <i class="fas fa-plus" style="font-size: 20px; margin-top: 5px"></i> </button> ';
                  html += '<button class="btn btn-outline-success btn-sm" onClick="aksiEditKelas(\'' + row.kode_kls + '\')"> Edit Mapel <i class="fas fa-edit" style="font-size: 20px; margin-top: 5px"></i> </button> ';
                  html += '<button class="btn btn-outline-danger btn-sm" onClick="aksiHapus(\'' + row.kode_kls + '\' , \'' + row.nama_kls + '\')"> Hapus <i class="fas fa-trash" style="font-size: 20px; margin-top: 5px"></i> </button> ';
                  return html
                }
              },
            ],
          });
});


$("#btnSaveKelas").click(function(e){
  e.preventDefault()
  var nama = $("#nama").val();
  $.ajax({
    url : 'http://localhost/e_rapot/A_kelas/tmbKelas',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {nama : nama},
    success: function(data){
      Swal.fire({
        position: 'top',
        type: 'success',
        title: 'Data berhasil ditambahkan',
        showConfirmButton: false,
        timer: 1500
      });
      setTimeout(function(){
         window.location.href = "<?php echo base_url('A_kelas'); ?>";
      }, 1500);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});

function aksiHapus(data, nama){
  var id = data;
  var namaGuru = nama;
  Swal.fire({
  title: 'Are you sure?',
  text: "Apakah kamu ingin menhapus Kelas " + namaGuru + "!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url : "http://localhost/e_rapot/A_kelas/deleteKelas",
        method: 'POST',
        dataType: 'json',
        data: {id : id},
        contentType: 'application/x-www-form-urlencoded',
        success: function(data){
          Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
          setTimeout(function(){
             window.location.href = "<?php echo base_url('A_kelas'); ?>";
          }, 1100);

        },
        error: function( errorThrown ){
          console.log( errorThrown);

        }

      });

    }
  });

}

function loadDynamicContentModal(id){
  var options = {
			modal: true,
			height:300,
			width:500
		};
	$('#demo-modal').load('http://localhost/e_rapot/A_kelas/modalGuru?id='+id, function() {
		$('#bootstrap-modal').modal({show:true});
    });
}

function aksiTambah(id){
  localStorage.setItem('codeKls', id);
  window.location.href = "<?php echo base_url('A_kelas/tambah'); ?>";
}

function aksiEditKelas(id){
  $.ajax({
    url : "http://localhost/e_rapot/A_kelas/loadEditKelas",
    method: 'POST',
    dataType: 'json',
    data: {kode_kelas : id},
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataEdit)
      // console.log(data.dataEdit['nip'])
      $("#nama_mapelEdit").val(data.dataEdit['nama_kls']);
      $("#idMapel").val(data.dataEdit['kode_kls']);
      $('.editTugasModal').modal({show:true});

    },
    error: function( errorThrown ){
      console.log( errorThrown);

    }

  });  
}

$("#btnEditQuiz").click(function(e){
  e.preventDefault()
  var nama_kelas = $("#nama_mapelEdit").val();
  var kode_kls = $("#idMapel").val();
  $.ajax({
    url : 'http://localhost/e_rapot/A_kelas/editKelas',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {nama_kelas : nama_kelas, kode_kls : kode_kls},
    success: function(data){
      Swal.fire({
        position: 'top',
        type: 'success',
        title: 'Data berhasil diedit',
        showConfirmButton: false,
        timer: 1500
      });
      setTimeout(function(){
         location.reload();
      }, 1500);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});









</script>
