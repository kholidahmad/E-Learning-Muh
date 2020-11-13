<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Mata Pelajaran :  <?php echo $nama_mapel; ?> /  <span > <b id="nama_kls"></b></span></a>
  </div>


  <!---========================================== Edit Modal ---------------------------------->
  <div class="modal fade editTugasModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Tugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" >
        <div class="modal-body">
          <div class="form-group">
              <label for="nama_materi">Nama Tugas</label>
              <input type="text" name="namaMateri" class="form-control" id="nama_tugasEdit" placeholder="Masukkan Nama Tugas">
            </div>
            <input type="hidden" name="kodeTugas" id="kodeTugas">
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="deskripsiEdit" rows="3" placeholder="Masukkan Deskripsi Tugas"></textarea>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="nama_materi">Finish</label>
                  <input type="text" class="form-control" id="datemaskEdit" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Time Finish</label>
                    <input type="text" id="timeFinishEdit" class="form-control timepicker">
                  <!-- /.input group -->
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btnEditTugas">Edit</button>
        </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Tugas</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="nama_materi">Nama Tugas</label>
              <input type="text" name="namaMateri" class="form-control" id="nama_tugas" placeholder="Masukkan Nama Tugas">
            </div>
            <input type="hidden" name="idKls" id="idKls">
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" rows="3" placeholder="Masukkan Deskripsi Tugas"></textarea>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="nama_materi">Finish</label>
                  <input type="text" class="form-control" id="datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Time Finish</label>
                    <input type="text" class="form-control timepicker">
                  <!-- /.input group -->
                </div>
              </div>
            </div>



        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary" id="btnSaveTugas"> Kirim </button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Upload Murid</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tugas</th>
                  <th>Tanggal Finish</th>
                  <th>Time Finish</th>
                  <th>Status</th>
                  <th>Aksi</th>
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
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
  $('#datemaskEdit').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
  $('input.timepicker').timepicki();
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
                  "dataSrc": "dataTugas",
                  "url": "http://localhost/e_rapot/G_tugas/slcTugas", // URL file untuk proses select datanya
                  "data" : {idKls : idKls},
                  "type": "GET"
                },
                "columns": [
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html  = no++;
                      return html
                    }
                  },
                  { "data": "nama_tugas" },
                  { "data": "tgl_finish" }, // Tampilkan nis
                  { "data": "time_finish" },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      if (row.status == 1) {
                        var html2 = '<span class="badge badge-pill badge-primary">Berlangsung</span>'
                      }else {
                        var html2 = '<span class="badge badge-pill badge-danger">Selesai</span>'
                      }
                      return html2
                    }
                  },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html1  = '<button class="btn btn-outline-primary btn-sm" onClick="aksiUploadTugas(\'' + row.kode_tugas + '\')">  Upload Murid  </button> ';
                      html1  += '<button class="btn btn-outline-warning btn-sm" onClick="aksiEditTugas(\'' + row.kode_tugas + '\')">  Edit  </button> ';
                      html1  += '<button class="btn btn-outline-danger btn-sm" onClick="aksiHapusTugas(\'' + row.kode_tugas + '\')">  Hapus  </button> ';
                      return html1
                    }
                  },
                ],
              });

});

$("#btnSaveTugas").click(function(e){
  e.preventDefault()
  tinyMCE.triggerSave();
  var nama_tugas = $("#nama_tugas").val();
  var deskripsi = $("#deskripsi").val();
  var tglFinish = $("#datemask").val();
  var timeFinish = $('input.timepicker').val();

  $.ajax({
    url : 'http://localhost/e_rapot/G_tugas/tmbTugas',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {nama_tugas : nama_tugas, deskripsi : deskripsi, tglFinish : tglFinish, timeFinish : timeFinish, idKls : localStorage.getItem('codeKls')},
    success: function(data){
      Swal.fire({
        position: 'top',
        type: 'success',
        title: 'Data berhasil ditambahkan',
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

function aksiUploadTugas(id){
  localStorage.setItem('kode_tugas', id);
  window.location.href = "<?php echo base_url('G_tugas/slcUploadTugas'); ?>";
}

function aksiEditTugas(id){
  $.ajax({
    url : "http://localhost/e_rapot/G_tugas/loadEditTugas",
    method: 'POST',
    dataType: 'json',
    data: {kode_tugas : id},
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataEdit)
      // console.log(data.dataEdit['nip'])
      $("#nama_tugasEdit").val(data.dataEdit['nama_tugas']);
      tinymce.get("deskripsiEdit").setContent(data.dataEdit['deskripsi']);
      $("#datemaskEdit").val(data.dataEdit['tgl_finish']);
      $("#timeFinishEdit").val(data.dataEdit['time_finish']);
      $('#kodeTugas').val(id);
      $('.editTugasModal').modal({show:true});

    },
    error: function( errorThrown ){
      console.log( errorThrown);

    }

  });  
}

$("#btnEditTugas").click(function(e){
  e.preventDefault()
  tinyMCE.triggerSave();
  var nama_tugas = $("#nama_tugasEdit").val();
  var deskripsi = $("#deskripsiEdit").val();
  var tglFinish = $("#datemaskEdit").val();
  var timeFinish = $('#timeFinishEdit').val();
  var kode_tugas = $('#kodeTugas').val();
  $.ajax({
    url : 'http://localhost/e_rapot/G_tugas/editTugas',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {nama_tugas : nama_tugas, deskripsi : deskripsi, tglFinish : tglFinish, timeFinish : timeFinish, kode_tugas : kode_tugas},
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



function aksiHapusTugas(id){
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
        url : 'http://localhost/e_rapot/G_tugas/hpsTgs',
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
               window.location.href = "<?php echo base_url('G_tugas/inputTugas'); ?>";
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
