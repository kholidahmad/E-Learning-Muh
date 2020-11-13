<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Soal</h1>
    
  </div>
<!--
  <!-- Page Heading -->
  <div class="modal fade tmbGuruModalExel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?php echo base_url('G_quiz/form') ?>" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_materi">Upload Data Soal</label>
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="inputGroupFile01"/>
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>

          <input type="hidden" name="kode_quiz" id="kode_quiz">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="preview" value="Preview">
        </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Content Row -->
  
  <div class="row">
    <div class="col-lg-12">

           
          <div class="ui right aligned grid">
    <div class="">
         <button type="button" class="btn btn-sm btn-primary mb-2" id="tmbGuruExel" name="button" data-toggle="modal" data-target=".tmbGuruModalExel">Tambah soal dengan Excel</button>
    </div>
  </div>
  
    <?php if ($this->session->flashdata('message_name')) { ?>
            <div class="card bg-success text-white shadow">
              <div class="card-body">
                <?php echo $this->session->flashdata('message_name'); ?>
              </div>
            </div>
            <br>
          <?php } ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Quiz</6>
                </div>
                <div class="card-body">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#homeTmbSoal">Soal Pilihan Ganda</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu1TmbSoal">Soal Essay</a>
                    </li>
                  </ul>

                  <div class="tab-content">
                    <div class="tab-pane container active" id="homeTmbSoal">
                      <br>
                      <div class="form-group">
                        <label for="deskripsi">Soal</label>
                        <textarea class="form-control" id="soal" rows="3" placeholder="Masukkan Soal"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="nama_materi">Option A</label>
                        <input type="text" name="namaMateri" class="form-control" id="sa" placeholder="Masukkan Option A">
                      </div>
                      <div class="form-group">
                        <label for="nama_materi">Option B</label>
                        <input type="text" name="namaMateri" class="form-control" id="sb" placeholder="Masukkan Option B">
                      </div>
                      <div class="form-group">
                        <label for="nama_materi">Option C</label>
                        <input type="text" name="namaMateri" class="form-control" id="sc" placeholder="Masukkan Option C">
                      </div>
                      <div class="form-group">
                        <label for="nama_materi">Option D</label>
                        <input type="text" name="namaMateri" class="form-control" id="sd" placeholder="Masukkan Option D">
                      </div>
                      <div class="form-group">
                          <label>Kunci Jawaban</label>
                          <select class="form-control select2" id="kunci" style="width: 100%; height: 100%">
                            <option selected="selected" value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                      </div>
                      <input type="hidden" name="idKls" id="idKls">

                      <button type="submit" class="btn btn-primary" id="saveSoalPilGan"> Simpan </button>
                    </div>

                    <div class="tab-pane container fade" id="menu1TmbSoal">
                      <br>
                      <div class="form-group">
                        <label for="deskripsi">Soal</label>
                        <textarea class="form-control" id="slEssay" rows="3" placeholder="Masukkan Soal"></textarea>
                      </div>

                      <button type="button"  class="btn btn-primary" name="button" id="saveSoalPilEssay">Simpan</button>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Bank Soal</h6>
                </div>
                <div class="card-body">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home">Soal</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu1">Bank Soal</a>
                    </li>
                  </ul>


                  <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                      <br>
                      <div class="table-responsive">
                        <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Soal</th>
                              <th>Jwb a</th>
                              <th>Jwb b</th>
                              <th>Jwb c</th>
                              <th>Jwb d</th>
                              <th>Kunci</th>
                              <th>Kategori</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane container fade" id="menu1">
                      <br>
                      <div class="table-responsive">
                        <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Soal</th>
                              <th>Jwb a</th>
                              <th>Jwb b</th>
                              <th>Jwb c</th>
                              <th>Jwb d</th>
                              <th>Kunci</th>
                              <th>Kategori</th>
                              <th>Mapel</th>
                              <th>Pilih</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>

                      <button type="button"  class="btn btn-primary" id="simpanSoal" name="button">Simpan</button>

                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>




          <!-- DataTales Example -->


    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('guru/v_footer'); ?>
<script type="text/javascript">
// Material Select Initialization

$('.select2').select2();

$('#nip').inputmask();
$('#tglLahir').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
$('[data-mask]').inputmask();
var table2 = null;
var table = null;
var no = 1;
var noG = 1;
var nobk = 1;
var idKls = localStorage.getItem('codeKls');
var idQuiz = localStorage.getItem('kode_quiz');
$(document).ready(function() {
  $('#nama_kls').text(localStorage.getItem('nama_kls'));
  $('#kode_quiz').val(localStorage.getItem('kode_quiz'));

  // $.ajax({
  //   url : 'http://localhost/e_rapot/A_guru/first_read',
  //   method: 'GET',
  //   dataType: 'json',
  //   contentType: 'application/x-www-form-urlencoded',
  //   data: {},
  //   success: function(data){
  //     $('#password').val(data.pwdGuru);
  //   },
  //   error: function( errorThrown ){
  //     console.log(errorThrown);
  //   }
  // });

  tabel2 = $('#example2').DataTable({
              destroy: true,
              "ajax":
              {
                "dataSrc": "dataSoal",
                "url": "http://localhost/e_rapot/G_quiz/loadSoalQuiz", // URL file untuk proses select datanya
                "data" : {idKls : idKls, idQuiz : idQuiz},
                "type": "GET"
              },
              "columns": [
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    var html  = no++;
                    return html
                  }
                },
                { "data": "soal" },
                { "data": "sa" }, // Tampilkan nis
                { "data": "sb" },
                { "data": "sc" },
                { "data": "sd" },
                { "data": "kunci" },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    if (row.kategori == 1) {
                      var html2 = '<span class="badge badge-pill badge-">Pilihan Ganda </span>'
                    }else {
                      var html2 = '<span class="badge badge-pill badge">Essay</span>'
                    }
                    return html2
                  }
                },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi

                    var html  = '<button class="btn btn-outline-danger btn-sm" onClick="aksiDeleteSoal(\'' + row.kode_quiz + '\', \'' + row.kode_soal + '\')">  Hapus </button> ';
                    return html
                  }
                },
              ],
            });




tabel = $('#example1').DataTable({
            destroy: true,
            "ajax":
            {
              "dataSrc": "dataSoal",
              "url": "http://localhost/e_rapot/G_quiz/loadBankSoal", // URL file untuk proses select datanya
              "data" : {kode_quiz : idQuiz},
              "type": "GET"
            },
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = nobk++;
                  return html
                }
              },
              { "data": "soal" },
              { "data": "sa" }, // Tampilkan nis
              { "data": "sb" },
              { "data": "sc" },
              { "data": "sd" },
              { "data": "kunci" },
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  if (row.kategori == 1) {
                    var html2 = '<span class="badge badge-pill badge-">Pilihan Ganda </span>'
                  }else {
                    var html2 = '<span class="badge badge-pill badge">Essay</span>'
                  }
                  return html2
                }
              },
              { "data": "nama_mapel" },
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  if (row.kode_quiz == null) {
                    var code = noG++;
                    var html  = '<div class="custom-control custom-checkbox mb-3"> <input type="checkbox" class="custom-control-input" id="customCheck\'' + code + '\'" name="banksoal" value="' + row.kode_soal + '"> <label class="custom-control-label" for="customCheck\'' + code + '\'"></label></div>';
                    return html
                  }else {
                    var htmlNull = '<span class="badge badge-pill badge-success">Dipilih</span>'
                    return htmlNull;
                  }

                }
              },
            ],
          });




// $("button").click(function(){
//   var code = [];
//   $.each($("input[name='guru']:checked"), function(){
//     code.push($(this).val());
//   });
//   if (code && code.length > 0) {
//     $.ajax({
//       url : 'http://localhost/e_rapot/A_mapel/saveGuruMapel',
//       method: 'POST',
//       dataType: 'json',
//       contentType: 'application/x-www-form-urlencoded',
//       data: {codeGuru : code, codeMapel : localStorage.getItem('codeGuruMapel')},
//       success: function(data){
//         console.log(data);
//         if (data.status = 'success') {
//           Swal.fire({
//             position: 'top',
//             type: 'success',
//             title: 'Data berhasil ditambahkan',
//             showConfirmButton: false,
//             timer: 1500
//           });
//           setTimeout(function(){
//              window.location.href = "<?php echo base_url('A_mapel/tmbGuruMapel'); ?>";
//           }, 1500);
//
//         }
//       },
//       error: function( errorThrown ){
//         console.log(errorThrown)
//       }
//     });
//
//   }else{
//     Swal.fire({
//       title: 'Peringatan!!!',
//       text: "Anda belum memilih Guru, Silahkan pilih Guru terlebih dahulu!",
//       type: 'warning',
//       })
//     }
//
//   });

});


$("#saveSoalPilGan").click(function(e){
  e.preventDefault();
  tinyMCE.triggerSave();
  var soal = $("#soal").val();
  var sa = $("#sa").val();
  var sb = $("#sb").val();
  var sc = $("#sc").val();
  var sd = $("#sd").val();
  var kunci = $("#kunci").val();
  $.ajax({
    url : 'http://localhost/e_rapot/G_quiz/tmbSoal',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {soal : soal, sa : sa, sb : sb, sc : sc, sd : sd, kunci : kunci, idQuiz : idQuiz},
    success: function(data){
      Swal.fire({
        position: 'top',
        type: 'success',
        title: 'Data berhasil ditambahkan',
        showConfirmButton: false,
        timer: 1500
      });
      setTimeout(function(){
         window.location.href = "<?php echo base_url('G_quiz/soalQuiz'); ?>";
      }, 1500);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});



$("#saveSoalPilEssay").click(function(e){
  e.preventDefault();
  tinyMCE.triggerSave();
  var soal = $("#slEssay").val();
  $.ajax({
    url : 'http://localhost/e_rapot/G_quiz/tmbSoalEssay',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {soal : soal, idQuiz : idQuiz},
    success: function(data){
      Swal.fire({
        position: 'top',
        type: 'success',
        title: 'Data berhasil ditambahkan',
        showConfirmButton: false,
        timer: 1500
      });
      setTimeout(function(){
         window.location.href = "<?php echo base_url('G_quiz/soalQuiz'); ?>";
      }, 1500);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});


function aksiDeleteSoal(kode_quiz, kode_soal){
  Swal.fire({
  title: 'Are you sure?',
  text: "Apakah kamu ingin menhapus Soal Ini",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url : "http://localhost/e_rapot/G_quiz/deleteSoal",
        method: 'POST',
        dataType: 'json',
        data: {kode_quiz : kode_quiz, kode_soal : kode_soal},
        contentType: 'application/x-www-form-urlencoded',
        success: function(data){
          Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
          setTimeout(function(){
             window.location.href = "<?php echo base_url('G_quiz/soalQuiz'); ?>";
          }, 1100);

        },
        error: function( errorThrown ){
          console.log( errorThrown);

        }

      });

    }
  });
}

// function aksiHapusGuruMapel(code, nama){
//   var id = code;
//   var namaGuru = nama;
//   Swal.fire({
//   title: 'Are you sure?',
//   text: "Apakah kamu ingin menhapus Guru" + namaGuru + "dari Mata Pelajaran " + namaGuru + "!",
//   type: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes, delete it!'
//   }).then((result) => {
//     if (result.value) {
//       $.ajax({
//         url : "http://localhost/e_rapot/A_mapel/deleteGuruMapel",
//         method: 'POST',
//         dataType: 'json',
//         data: {id : id},
//         contentType: 'application/x-www-form-urlencoded',
//         success: function(data){
//           Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
//           setTimeout(function(){
//              window.location.href = "<?php echo base_url('A_mapel/tmbGuruMapel'); ?>";
//           }, 1100);
//
//         },
//         error: function( errorThrown ){
//           console.log( errorThrown);
//
//         }
//
//       });
//
//     }
//   });
// }

// function removeA(arr) {
//   var what, a = arguments, L = a.length, ax;
//   while (L > 1 && arr.length) {
//       what = a[--L];
//       while ((ax= arr.indexOf(what)) !== -1) {
//           arr.splice(ax, 1);
//       }
//   }
//   return arr;
// }
//
// var codetmbGuru= [];
//
// function cekGuru(id){
//   if($(this).is(":checked")){
//     codetmbGuru.push(id);
//     alert(id);
//   }else {
//     alert('wkwkw');
//   }
//
// }
$("#simpanSoal").click(function(){
  var code = [];
  $.each($("input[name='banksoal']:checked"), function(){
    code.push($(this).val());
  });
  if (code && code.length > 0) {
    console.log(code);
    $.ajax({
      url : 'http://localhost/e_rapot/G_quiz/saveSoal',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      data: {kode_soal : code, kode_quiz : localStorage.getItem('kode_quiz')},
      success: function(data){
        console.log(data);
        if (data.status = 'success') {
          Swal.fire({
            position: 'top',
            type: 'success',
            title: 'Data berhasil ditambahkan',
            showConfirmButton: false,
            timer: 1500
          });
          setTimeout(function(){
             window.location.href = "<?php echo base_url('G_quiz/soalQuiz'); ?>";
          }, 1500);

        }
      },
      error: function( errorThrown ){
        console.log(errorThrown)
      }
    });

  }else{
    Swal.fire({
      title: 'Peringatan!!!',
      text: "Anda belum memilih Murid, Silahkan pilih Guru terlebih dahulu!",
      type: 'warning',
      })
    }

  });








</script>
