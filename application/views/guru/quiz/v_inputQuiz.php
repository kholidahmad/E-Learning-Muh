<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quiz</h1>
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
          <input type="hidden" name="" id="kodeQuiz">
          <div class="form-group">
              <label for="nama_materi">Nama Quiz</label>
              <input type="text" name="namaMateri" class="form-control" id="nama_quizEdit" placeholder="Masukkan Nama Materi">
            </div>
            <input type="hidden" name="idKls" id="idKls">
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
                    <input type="text" class="form-control timepicker" id="timeFinishEdit">
                  <!-- /.input group -->
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btnEditQuiz">Edit</button>
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
          <h6 class="m-0 font-weight-bold text-primary">Input Quiz</6>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="nama_materi">Nama Quiz</label>
              <input type="text" name="namaMateri" class="form-control" id="nama_quiz" placeholder="Masukkan Nama Materi">
            </div>
            <input type="hidden" name="idKls" id="idKls">
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
          <button type="submit" class="btn btn-primary" id="btnSaveQuiz"> Kirim </button>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Quiz</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Quiz</th>
                  <th>Tanggal Finish</th>
                  <th>Time Finish</th>
                  <th>Soal</th>
                  <th>Jwb Siswa</th>
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

  $('#idKls').val(localStorage.getItem('codeKls'));
  var idKls = localStorage.getItem('codeKls');
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  $('#datemaskEdit').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  $('input.timepicker').timepicki();
  var no = 1;
  var data_tabel = '';
  $('#nama_kls').text(localStorage.getItem('nama_kls'));


  $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });



    data_tabel = $('#example1').DataTable({
                destroy: true,
                "ajax":
                {
                  "dataSrc": "dataQuiz",
                  "url": "http://localhost/e_rapot/G_quiz/slcQuiz", // URL file untuk proses select datanya
                  "data" : {idKls : idKls},
                  "type": "GET"
                },
                "columns": [
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html  = no++;
                      return html
                    }
                  },
                  { "data": "nama_quiz" },
                  { "data": "tgl_finish" }, // Tampilkan nis
                  { "data": "time_finish" },

                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html1  = '<button class="btn btn-outline-primary btn-sm" onClick="aksiSoal(\'' + row.kode_quiz + '\')">  Soal  </button> ';
                      return html1
                    }
                  },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html1  = '<button class="btn btn-outline-primary btn-sm" onClick="aksiJawaban(\'' + row.kode_quiz + '\')">  Jawaban </button> ';
                      return html1
                    }
                  },
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
                      var html1  = '<button class="btn btn-outline-warning btn-sm" onClick="aksiEditQuiz(\'' + row.kode_quiz + '\')">  Edit  </button> ';
                      html1  += '<button class="btn btn-outline-danger btn-sm" onClick="aksiHapusQuiz(\'' + row.kode_quiz + '\')">  Hapus  </button> ';
                      return html1
                    }
                  },
                ],
              });

});

$("#btnSaveQuiz").click(function(e){
  e.preventDefault()
  tinyMCE.triggerSave();
  var nama_quiz = $("#nama_quiz").val();
  var tglFinish = $("#datemask").val();
  var timeFinish = $('input.timepicker').val();

  $.ajax({
    url : 'http://localhost/e_rapot/G_quiz/tmbQuiz',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {nama_quiz : nama_quiz, tglFinish : tglFinish, timeFinish : timeFinish, idKls : localStorage.getItem('codeKls')},
    success: function(data){
      Swal.fire({
        position: 'top',
        type: 'success',
        title: 'Data berhasil ditambahkan',
        showConfirmButton: false,
        timer: 1500
      });
      setTimeout(function(){
         window.location.href = "<?php echo base_url('G_quiz/inputQuiz'); ?>";
      }, 1500);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});

function aksiSoal(id){
  localStorage.setItem('kode_quiz', id);
  window.location.href = "<?php echo base_url('G_quiz/soalQuiz'); ?>";
}

function aksiJawaban(id){
  localStorage.setItem('kode_quiz', id);
  window.location.href = "<?php echo base_url('G_quiz/jwbSiswa'); ?>";
}


function aksiEditQuiz(id){
  $.ajax({
    url : "http://localhost/e_rapot/G_quiz/loadEditQuiz",
    method: 'POST',
    dataType: 'json',
    data: {kode_quiz : id},
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataEdit)
      // console.log(data.dataEdit['nip'])
      $("#nama_quizEdit").val(data.dataEdit['nama_quiz']);
      $("#datemaskEdit").val(data.dataEdit['tgl_finish']);
      $("#timeFinishEdit").val(data.dataEdit['time_finish']);
      $('#kodeQuiz').val(id);
      $('.editTugasModal').modal({show:true});

    },
    error: function( errorThrown ){
      console.log( errorThrown);

    }

  });  
}

$("#btnEditQuiz").click(function(e){
  e.preventDefault()
  var nama_quiz = $("#nama_quizEdit").val();
  var tglFinish = $("#datemaskEdit").val();
  var timeFinish = $('#timeFinishEdit').val();
  var kode_quiz = $('#kodeQuiz').val();
  $.ajax({
    url : 'http://localhost/e_rapot/G_quiz/editQuiz',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {nama_quiz : nama_quiz, tglFinish : tglFinish, timeFinish : timeFinish, kode_quiz : kode_quiz},
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


function aksiHapusQuiz(id){
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
        url : 'http://localhost/e_rapot/G_quiz/hpsQuiz',
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
               window.location.href = "<?php echo base_url('G_quiz/inputQuiz'); ?>";
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
