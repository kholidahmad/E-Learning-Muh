<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">


<!--
  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">

      <h1 class="h3 mb-2 text-gray-800">Mata Pelajaran</h1>
      <br>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Mata Pelajaran</h6>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">Data Guru</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1">Tambah Guru</a>
                </li>
              </ul>


              <div class="tab-content">
                <div class="tab-pane container active" id="home">
                  <br>
                  <div class="" id="loadDataGuru">

                  </div>

                </div>
                <div class="tab-pane container fade" id="menu1">
                  <br>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama Guru</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama Guru</th>
                          <th>Aksi</th>

                        </tr>
                      </tfoot>
                      <tbody>
                      </tbody>
                    </table>
                  </div>

                  <button type="button"  class="btn btn-primary" name="button">Simpan</button>

                </div>
              </div>

            </div>
          </div>



          <!-- DataTales Example -->


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

var table = '';
var no = 1;
var noG = 1;
$(document).ready(function() {

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


  $.ajax({
    url : 'http://localhost/e_rapot/A_mapel/loadGuruMapel',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {code : localStorage.getItem('codeGuruMapel')},
    success: function(data){
      console.log(data.dataGuru);
      table += '<div class="table-responsive">';
      table += '<table class="table table-bordered">';
      table += '<thead>';
      table += '<tr>';
      table += '<th scope="col">No</th>';
      table += '<th scope="col">NIP</th>';
      table += '<th scope="col">Nama Guru</th>';
      table += '<th scope="col">Aksi</th>';
      table += '</tr>';
      table += '</thead>';
      table += '<tbody>';
      if (data.status == 'ada') {
        $.each(data.dataGuru, function(idx, obj){
          var no = idx+1;
          table += '<tr>';
          table += '<td>' + no + '</td>';
          table += '<td>' + obj.nip + '</td>';
          table += '<td>' + obj.nama + '</td>';
          table += '<td> <button class="btn btn-outline-danger btn-sm" onClick="aksiHapusGuruMapel(\'' + obj.kode_guru + '\' , \'' + obj.nama + '\')"> Hapus <i class="fas fa-trash" style="font-size: 20px; margin-top: 5px"></i> </button> </td>';
          table += '</tr>';
        });
      }else{
        table += '<tr> <td colspan="4"> Tidak ada data guru yang ditambahkan </td> </tr>';
      }
      table += '</tbody>';
      table +=  '</table>';
      table += '</div>';


      $("#loadDataGuru").html(table);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });




tabel = $('#example1').DataTable({
            "ajax":
            {
              "dataSrc": "dataGuru",
              "url": "http://localhost/e_rapot/A_mapel/loadDataGuruTmb", // URL file untuk proses select datanya
              "type": "GET"
            },
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = no++;
                  return html
                }
              },
              { "data": "nip" },
              { "data": "nama" }, // Tampilkan nis
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var code = noG++;
                  var html  = '<div class="custom-control custom-checkbox mb-3"> <input type="checkbox" class="custom-control-input" id="customCheck\'' + code + '\'" name="guru" value="\'' + row.kode_guru + '\'"> <label class="custom-control-label" for="customCheck\'' + code + '\'"></label></div>';
                  return html
                }
              },
            ],
          });




$("button").click(function(){
  var code = [];
  $.each($("input[name='guru']:checked"), function(){
    code.push($(this).val());
  });
  if (code && code.length > 0) {
    $.ajax({
      url : 'http://localhost/e_rapot/A_mapel/saveGuruMapel',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      data: {codeGuru : code, codeMapel : localStorage.getItem('codeGuruMapel')},
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
             window.location.href = "<?php echo base_url('A_mapel/tmbGuruMapel'); ?>";
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
      text: "Anda belum memilih Guru, Silahkan pilih Guru terlebih dahulu!",
      type: 'warning',
      })
    }

  });

});


$("#btnSaveMapel").click(function(e){
  e.preventDefault()
  var nama = $("#nama").val();
  $.ajax({
    url : 'http://localhost/e_rapot/A_mapel/tmbMapel',
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
         window.location.href = "<?php echo base_url('A_mapel'); ?>";
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
  text: "Apakah kamu ingin menhapus Guru " + namaGuru + "!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url : "http://localhost/e_rapot/A_guru/deleteGuru",
        method: 'POST',
        dataType: 'json',
        data: {id : id},
        contentType: 'application/x-www-form-urlencoded',
        success: function(data){
          Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
          setTimeout(function(){
             window.location.href = "<?php echo base_url('A_guru/guru'); ?>";
          }, 1100);

        },
        error: function( errorThrown ){
          console.log( errorThrown);

        }

      });

    }
  });
}

function aksiHapusGuruMapel(code, nama){
  var id = code;
  var namaGuru = nama;
  Swal.fire({
  title: 'Are you sure?',
  text: "Apakah kamu ingin menhapus Guru" + namaGuru + "dari Mata Pelajaran " + namaGuru + "!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url : "http://localhost/e_rapot/A_mapel/deleteGuruMapel",
        method: 'POST',
        dataType: 'json',
        data: {id : id},
        contentType: 'application/x-www-form-urlencoded',
        success: function(data){
          Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
          setTimeout(function(){
             window.location.href = "<?php echo base_url('A_mapel/tmbGuruMapel'); ?>";
          }, 1100);

        },
        error: function( errorThrown ){
          console.log( errorThrown);

        }

      });

    }
  });
}

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













</script>
