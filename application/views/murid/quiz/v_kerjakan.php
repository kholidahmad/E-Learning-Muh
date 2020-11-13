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
          <h6 class="m-0 font-weight-bold text-primary">KERJAKAN DENGAN TELITI DAN JUJUR !!!!!!</6>
        </div>
        <div class="card-body">

          <div id="loadSoal">

          </div>

        </div>
        <div class="card-footer text-right">
          <button type="button" class="btn btn-primary" id="savechecklist" name="button">SELESAI</button>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('murid/v_footer'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#namamapel").text('Mapel : ' + localStorage.getItem('nama_mapel'))
    // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    // $('input.timepicker').timepicki();
    var noR = 1;
    var no = 1;
    var data_tabel = '';
    var kode_quiz = localStorage.getItem('kode_quiz');
    var html = '';
    $.ajax({
      url: 'http://localhost/e_rapot/S_quiz/loadSoalMurid',
      method: 'GET',
      data: {
        kode_quiz: kode_quiz
      },
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(data) {
        console.log(data.dataQuiz);
        if (data.cekKode == 'y') {
          if (data.cekKerjakan == 'y') {
            window.location.href = "<?php echo base_url('S_quiz/scoreQuiz'); ?>";
          } else {
            $.each(data.dataQuiz, function(idx, obj) {
      
              if (obj.kategori == 1) {

                html += '<div class="card" >';
                html += '<div class="card-body">';
                html += '<b><p class="card-text">' + no + '.' + obj.soal + '</p> </b>';
                html += '<br>';
                html += '<div class="row">';
                html += '<div class="col-sm-6">';
                html += '<p> <div class="custom-control custom-radio"> <input type="radio" class="custom-control-input" id="customRadio\'' + noR + '\'" name="\'' + obj.kode_soal + '\'" value="' + obj.kode_soal + '-A"><label class="custom-control-label" for="customRadio\'' + noR + '\'"> A. ' + obj.sa + ' </label> </div> </p>';
                noR++;
                html += '</div>';
                html += '<div class="col-sm-6">';
                html += '<p> <div class="custom-control custom-radio"> <input type="radio" class="custom-control-input" id="customRadio\'' + noR + '\'" name="\'' + obj.kode_soal + '\'" value="' + obj.kode_soal + '-C"><label class="custom-control-label" for="customRadio\'' + noR + '\'"> C. ' + obj.sc + ' </label> </div> </p>';
                noR++;
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-sm-6">';
                html += '<p> <div class="custom-control custom-radio"> <input type="radio" class="custom-control-input" id="customRadio\'' + noR + '\'" name="\'' + obj.kode_soal + '\'" value="' + obj.kode_soal + '-B"><label class="custom-control-label" for="customRadio\'' + noR + '\'"> B. ' + obj.sb + ' </label> </div> </p>';
                noR++;
                html += '</div>';
                html += '<div class="col-sm-6">';
                html += '<p> <div class="custom-control custom-radio"> <input type="radio" class="custom-control-input" id="customRadio\'' + noR + '\'" name="\'' + obj.kode_soal + '\'" value="' + obj.kode_soal + '-D"><label class="custom-control-label" for="customRadio\'' + noR + '\'"> D. ' + obj.sd + ' </label> </div> </p>';
                noR++;
                html += '</div>';
                html += '</div>';

                html += '</div>';
                html += '</div>';
                html += '<br>';

                no++;
              } else {
                html += '<div class="card" >';
                html += '<div class="card-body">';
                html += '<b><p class="card-text">' + no + '.' + obj.soal + '</p> </b>';
                html += '<br>';
                html += '<div class="form-group">';
                html += '<label for="deskripsi">Jawab</label>';
                html += '<textarea class="form-control" id="' + obj.kode_soal + '" rows="3" placeholder="Masukkan Jawaban"></textarea>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<br>';

                no++;
              }

              $('#loadSoal').html(html);

            });

          }
        } else {
          window.location.href = "<?php echo base_url('S_quiz/scoreQuiz'); ?>";
        }

      },
      error: function(errorThrown) {
        console.log(errorThrown);
      }
    });


  });

  // $("#btnSaveQuiz").click(function(e){
  //   e.preventDefault()
  //   tinyMCE.triggerSave();
  //   var nama_quiz = $("#nama_quiz").val();
  //   var tglFinish = $("#datemask").val();
  //   var timeFinish = $('input.timepicker').val();
  //
  //   $.ajax({
  //     url : 'http://localhost/e_rapot/G_quiz/tmbQuiz',
  //     method: 'POST',
  //     dataType: 'json',
  //     contentType: 'application/x-www-form-urlencoded',
  //     data: {nama_quiz : nama_quiz, tglFinish : tglFinish, timeFinish : timeFinish, idKls : localStorage.getItem('codeKls')},
  //     success: function(data){
  //       Swal.fire({
  //         position: 'top',
  //         type: 'success',
  //         title: 'Data berhasil ditambahkan',
  //         showConfirmButton: false,
  //         timer: 1500
  //       });
  //       setTimeout(function(){
  //          window.location.href = "<?php echo base_url('G_quiz/inputQuiz'); ?>";
  //       }, 1500);
  //     },
  //     error: function( errorThrown ){
  //       console.log(errorThrown);
  //     }
  //   });
  //
  // });
  //
  // function aksiSoal(id){
  //   localStorage.setItem('kode_quiz', id);
  //   window.location.href = "<?php echo base_url('S_quiz/kerjakanQuiz'); ?>";
  // }
  $('#savechecklist').click(function() {
    Swal.fire({
      title: 'Are you sure?',
      text: "Apakah anda yakin sudah mengerjakan semua soal?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Selesai!'
    }).then((result) => {
      if (result.value) {
        var pilGan;
        var the_essay;
        //the_value = jQuery('input:radio:checked').val();
        //the_value = jQuery('input[name=macro]:radio:checked').val();
        pilGan = getChecklistItems();
        the_essay = getChecklistItemsEssay();
        console.log(pilGan);
        console.log(the_essay);
        $.ajax({
          url: 'http://localhost/e_rapot/S_quiz/kirimJwb',
          method: 'POST',
          dataType: 'json',
          contentType: 'application/x-www-form-urlencoded',
          data: {
            pilGan: pilGan,
            the_essay: the_essay,
            kode_quiz: localStorage.getItem('kode_quiz')
          },
          success: function(data) {
            if (data.status = 'success') {
              Swal.fire({
                position: 'top',
                type: 'success',
                title: 'Anda Telah Selesai Mengerjakan QUIZ!!!',
                showConfirmButton: false,
                timer: 1500
              });
              setTimeout(function() {
                window.location.href = "<?php echo base_url('S_quiz/scoreQuiz'); ?>";
              }, 1500);

            }
          },
          error: function(errorThrown) {
            console.log(errorThrown)
          }
        });
      }
    });
  });

  function getChecklistItems() {
    var result =
      $("input:radio:checked").get();

    var columns = $.map(result, function(element) {
      return $(element).attr("value");
    });

    return columns.join("|");
  }

  function getChecklistItemsEssay() {
    var result =
      $("textarea").get();

    var columns = $.map(result, function(element) {
      return $(element).attr("id") + '~' + $(element).val();
    });

    return columns.join("|");
  }
</script>