
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quiz</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="namamapel"></a>
  </div>

  <!-- Content Row -->

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

<?php $this->load->view('murid/v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {
  $("#namamapel").text('Mapel : ' +localStorage.getItem('nama_mapel'));
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  $('input.timepicker').timepicki();
  var no = 1;
  



    data_tabel = $('#example1').DataTable({
                destroy: true,
                "ajax":
                {
                  "dataSrc": "dataQuiz",
                  "url": "http://localhost/e_rapot/S_quiz/slcQuiz", // URL file untuk proses select datanya
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
                      if (row.status == 1) {
                        var html2 = '<span class="badge badge-pill badge-primary">Berlangsung</span>'
                      }else {
                        var html2 = '<span class="badge badge-pill badge-danger">Selesai</span>'
                      }
                      return html2
                    }
                  },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      if (row.status == 1) {
                        var html2 = '<button class="btn btn-outline-primary btn-sm" onClick="aksiNext(\'' + row.kode_quiz + '\')"> KERJAKAN!! </button> '
                      }else {
                        var html2 = '<span class="badge badge-pill badge-danger">Selesai</span>'
                      }
                      return html2
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

function aksiNext(id){
  localStorage.setItem('kode_quiz', id);
  window.location.href = "<?php echo base_url('S_quiz/kerjakanQuiz'); ?>";
}

function aksiLihatScore(id){
  localStorage.setItem('kode_quiz', id);
  window.location.href = "<?php echo base_url('S_quiz/scoreQuiz'); ?>";
}




</script>
