
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hasil Quiz</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="namamapel"></a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-12">

    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Quiz</6>
          </div>
          <div class="card-body">

            <div id="loadSoal">

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
  $("#namamapel").text('Mapel : ' +localStorage.getItem('nama_mapel'))
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  $('input.timepicker').timepicki();
  var noR = 1;
  var no = 1;
  var data_tabel = '';
  var kode_quiz = localStorage.getItem('kode_quiz');
  var html = '';

  $.ajax({
    url : 'http://localhost/e_rapot/S_quiz/detailHasil',
    method: 'GET',
    data: {kode_quiz : kode_quiz},
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.jmlSoal);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

  $.ajax({
    url : 'http://localhost/e_rapot/S_quiz/loadHasilQuiz',
    method: 'GET',
    data : {kode_quiz : kode_quiz},
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataQuiz);
      $.each(data.dataQuiz, function(idx, obj){
        if (obj.kategori == 1) {
          if (obj.ket == 1) {
            html += '<div class="card border-success">';
            html += '<div class="card-body">';
            html += '<b><p class="card-text">'+no +'.'+obj.soal + '</p> </b>';
            html += '<br>';
            html += '<div class="row">';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'A') {
              html += '<h5> <span class="badge badge-pill badge-success">  A. ' + obj.sa + ' </span> </h5>';
            }else {
              html += '<p> <label class=""> A. ' + obj.sa + ' </label> </p>';
            }
            html += '</div>';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'C') {
              html += '<p> <span class="badge badge-pill badge-success"> <label class=""> C. ' + obj.sc + ' </label> </span> </p>';
            }else {
              html += '<p> <label class=""> C. ' + obj.sc + ' </label> </p>';
            }
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'B') {
              html += '<p> <span class="badge badge-pill badge-success"> <label class=""> B. ' + obj.sb + ' </label> </span> </p>';
            }else {
              html += '<p> <label class=""> B. ' + obj.sb + ' </label> </p>';
            }
            html += '</div>';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'D') {
              html += '<p> <span class="badge badge-pill badge-success"> <label class=""> D. ' + obj.sd + ' </label> </span> </p>';
            }else {
              html += '<p> <label class=""> D. ' + obj.sd + ' </label> </p>';
            }
            html += '</div>';
            html += '</div>';

            html += '</div>';
            html += '</div>';
            html += '<br>';
            no++;
          }else {
            html += '<div class="card border-danger">';
            html += '<div class="card-body">';
            html += '<b><p class="card-text">'+no +'.'+obj.soal + '</p> </b>';
            html += '<br>';
            html += '<div class="row">';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'A') {
              html += '<h5> <span class="badge badge-pill badge-danger">  A. ' + obj.sa + ' </span> </h5>';
            }else if(obj.kunci == 'A'){
              html += '<h5> <span class="badge badge-pill badge-success">  A. ' + obj.sa + ' </span> </h5>';
            }else {
              html += '<p> <label class=""> A. ' + obj.sa + ' </label> </p>';
            }
            html += '</div>';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'C') {
              html += '<h5> <span class="badge badge-pill badge-danger"> <label class=""> C. ' + obj.sc + ' </label> </span> </h5>';
            }else if(obj.kunci == 'C'){
              html += '<h5> <span class="badge badge-pill badge-success"> <label class=""> C. ' + obj.sc + ' </label> </span> </h5>';
            }else {
              html += '<p> <label class=""> C. ' + obj.sc + ' </label> </p>';
            }
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'B') {
              html += '<h5> <span class="badge badge-pill badge-danger"> <label class=""> B. ' + obj.sb + ' </label> </span> </h5>';
            }else if(obj.kunci == 'B'){
              html += '<h5> <span class="badge badge-pill badge-success"> <label class=""> B. ' + obj.sb + ' </label> </span> </h5>';
            }else {
              html += '<p> <label class=""> B. ' + obj.sb + ' </label> </p>';
            }
            html += '</div>';
            html += '<div class="col-sm-6">';
            if (obj.jawaban == 'D') {
              html += '<h5> <span class="badge badge-pill badge-danger"> <label class=""> D. ' + obj.sd + ' </label> </span> </h5>';
            }else if(obj.kunci == 'D') {
              html += '<h5> <span class="badge badge-pill badge-success"> <label class=""> D. ' + obj.sd + ' </label> </span> </h5>';
            }else {
              html += '<p> <label class=""> D. ' + obj.sd + ' </label> </p>';
            }
            html += '</div>';
            html += '</div>';

            html += '</div>';
            html += '</div>';
            html += '<br>';
            no++;
          }

        }else {
          html += '<div class="card">';
          html += '<div class="card-body">';
          html += '<b><p class="card-text">'+no +'.'+obj.soal + '</p> </b>';
          html += '<br>';
          html += '<div class="form-group">';
          html += '<label for="deskripsi">Jawaban</label>';
          html += '<textarea class="form-control" rows="3" disabled>'+ obj.jawaban +'</textarea>';
          html += '</div>';
          html += '</div>';
          html += '</div>';
          html += '<br>';

          no++;
        }

        $('#loadSoal').html(html);

      });
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });


});




</script>
