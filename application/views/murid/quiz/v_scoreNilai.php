<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hasil Quiz</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="namamapel"></a>
  </div>

  <!-- Content Row -->
  <div class="text-center">
    <p class="lead text-gray-800">Score Pilihan Ganda</p>
    <h1 class="mx-auto" data-text="404" style="font-size:100px" id="score"></h1>

    <p class="mb-0">Jumlah Soal Pilihan Ganda : <b id="jmlSoal"></b></p>
    <p class="mb-0">Soal benar : <b id="soalBenar"></b></p>
    <p class="mb-0">Tidak dijawab : <b id="tdkJawab"></b></p>
    <button class="btn btn-primary" style="margin-top : 30px" onclick="lihatJawaban()">Lihat Jawaban</button>
  </div>


</div>
<!-- /.container-fluid -->

<?php $this->load->view('murid/v_footer'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#namamapel").text('Mapel : ' + localStorage.getItem('nama_mapel'))
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    $('input.timepicker').timepicki();
    var noR = 1;
    var no = 1;
    var data_tabel = '';
    var kode_quiz = localStorage.getItem('kode_quiz');
    var html = '';

    $.ajax({
      url: 'http://localhost/e_rapot/S_quiz/detailHasil',
      method: 'GET',
      data: {
        kode_quiz: kode_quiz
      },
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(data) {
        $('#jmlSoal').text(data.jmlSoal);
        $('#soalBenar').text(data.soalBenar);
        $('#tdkJawab').text(data.tdkJwb);
        $('#score').text(data.total);
      },
      error: function(errorThrown) {
        console.log(errorThrown);
      }
    });




  });

  function lihatJawaban() {
    window.location.href = "<?php echo base_url('S_quiz/hasilQuiz'); ?>";
  }
</script>