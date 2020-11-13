<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Materi</h1> 
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Mata Pelajaran :  <?php echo $nama_mapel; ?> </a>
  </div>

  <!-- Content Row -->
  <?php echo $this->session->flashdata('message'); ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Materi</h6>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo base_url('G_materi/aksiUploadMateri') ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama_materi">Nama Materi</label>
              <input type="text" name="namaMateri" class="form-control" id="nama_materi" placeholder="Masukkan Nama Materi">
            </div>
            <input type="hidden" name="idKls" id="idKls">
            <div class="form-group">
              <label for="nama_materi">Upload Materi</label>
              <div class="custom-file">
                <input type="file" name="fileMateri" class="custom-file-input" id="inputGroupFile01"/>
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>


        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form> 
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Materi</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Materi</th>
                  <th>Nama File</th>
                  <th>Tipe File</th>
                  <th>Ukuran File</th>
                  <th>Download</th>
                  <th>Hapus</th>
                </tr>
              </thead>
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

<?php $this->load->view('guru/v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {

  var no = 1;
  var data_tabel = '';
  var idKls = localStorage.getItem('codeKls');
  $('#nama_kls').text(localStorage.getItem('nama_kls'));

  $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    $('#idKls').val(localStorage.getItem('codeKls'));

    data_tabel = $('#example1').DataTable({
                destroy: true,
                "ajax":
                {
                  "dataSrc": "dataMateri",
                  "url": "http://localhost/e_rapot/G_materi/slcMateri", // URL file untuk proses select datanya
                  "data" : {idKls : idKls},
                  "type": "GET"
                },
                "columns": [
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html  = no++;
                      return html
                    }
                  },
                  { "data": "nama_materi" },
                  { "data": "nama_file" }, // Tampilkan nis
                  { "data": "tipe_file" },
                  { "data": "ukuran_file" },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html1 = '<a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('G_materi/aksiDownload/')?>'+ row.nama_file +'"> Download </button> ';
                      return html1
                    }
                  },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html1 = '<button class="btn btn-outline-danger btn-sm" onClick="aksiHapus('+ row.id +')"> Hapus </button> ';
                      return html1
                    }
                  },
                ],
              });

});

function aksiDownload(nama){

  window.location.href = "<?php echo base_url('G_materi/aksiDownload') ?>?nama_file="+nama;
}

function aksiHapus(id){
  Swal.fire({
  title: 'Are you sure?',
  text: "Apakah anda yakin sudah mengerjakan semua soal?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url : 'http://localhost/e_rapot/G_materi/hpsMtr',
        method: 'POST',
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        data: {id : id},
        success: function(data){
          if (data.status = 'success') {
            Swal.fire({
              position: 'top',
              type: 'success',
              title: 'Berhasil di Hapus',
              showConfirmButton: false,
              timer: 1500
            });
            setTimeout(function(){
               window.location.href = "<?php echo base_url('G_materi/inputMateri'); ?>";
            }, 1500);

          }
        },
        error: function( errorThrown ){
          console.log(errorThrown)
        }
      });
    }
  });
}



</script>
