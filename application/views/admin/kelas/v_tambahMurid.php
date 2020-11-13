<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">


        <h1 class="h3 mb-2 text-gray-800">Kelas</h1>
<br>
      <div class="modal fade tmbMapelModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="getCodeModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div id="contentGuru">

                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="simpanGuru">Save Data</button>
            </div>

          </div>
        </div>
      </div>
<!--
  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nama Kelas</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">7A</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Mapel dan Guru</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Murid</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">Data Mapel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1">Data Murid</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu2">Tambah Murid</a>
                </li>
              </ul>


              <div class="tab-content">
                <div class="tab-pane container active" id="home">
                  <br>
                  <div class="" id="slcMapel">

                  </div>


                </div>
                <div class="tab-pane container fade" id="menu1">
                  <br>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama Murid</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama Murid</th>
                          <th>Aksi</th>

                        </tr>
                      </tfoot>
                      <tbody>
                      </tbody>
                    </table>
                  </div>

                  <button type="button"  class="btn btn-primary" name="button">Simpan</button>

                </div>


                <div class="tab-pane container fade" id="menu2">
                  <br>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama Murid</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama Murid</th>
                          <th>Aksi</th>

                        </tr>
                      </tfoot>
                      <tbody>
                      </tbody>
                    </table>
                  </div>

                  <button type="button" id="simpanMurid"  class="btn btn-primary" name="button">Simpan</button>

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

  $('#tombol').click(function(){
  $('#modal-kotak , #bg').fadeIn("slow");
});
$('#tombol-tutup').click(function(){
  $('#modal-kotak , #bg').fadeOut("slow");
});
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
    url : 'http://localhost/e_rapot/A_kelas/loadDataMapel',
    method: 'GET',
    data : { id : localStorage.getItem('codeKls')},
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataMapel);
      // $("#getCodeModal").modal('show');
      table += '<div class="table-responsive">';
      table += '<table class="table table-bordered">';
      table += '<thead>';
      table += '<tr>';
      table += '<th scope="col">No</th>';
      table += '<th scope="col">Nama Mapel</th>';
      table += '<th scope="col">Nama Guru</th>';
      table += '<th scope="col">Status</th>';
      table += '<th scope="col">Aksi</th>';
      table += '</tr>';
      table += '</thead>';
      table += '<tbody>';
      $.each(data.dataMapel, function(idx, obj){
        var no = idx+1;
        table += '<tr>';
        table += '<td>' + no + '</td>';
        table += '<td>' + obj.nama_mapel + '</td>';
        if (obj.nama == null) {
          table += '<td> <span class="badge badge-danger">-</span> </td>';
          table += '<td> <span class="badge badge-danger"><i class="fas fa-times"></i></span> </td>';
          table += '<td> <button class="btn btn-outline-primary btn-sm" onClick="aksiTmbGuru(\'' + obj.kode_mapel + '\')"> Tambah Guru <i class="fas fa-plus" style="font-size: 20px; margin-top: 5px"></i> </button> </td>';
        }else {
          table += '<td>' + obj.nama + '</td>';
          table += '<td> <span class="badge badge-primary"><i class="fas fa-check"></i></span> </td>';
          table += '<td> <button class="btn btn-outline-primary btn-sm" onClick="aksiTmbGuru(\'' + obj.kode_mapel + '\')"> Edit <i class="fas fa-trash" style="font-size: 20px; margin-top: 5px"></i> </button> </td>';
        }
        table += '</tr>';
      });
      table += '</tbody>';
      table +=  '</table>';
      table += '</div>';


      $("#slcMapel").html(table);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });



var idKls = localStorage.getItem('codeKls');
tabel = $('#example1').DataTable({
            "ajax":
            {
              "dataSrc": "dataMuridKls",
              "url": "http://localhost/e_rapot/A_kelas/loadDataMuridKls", // URL file untuk proses select datanya
              "data" : {"id" : localStorage.getItem('codeKls')},
              "type": "GET"
            },
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = no++;
                  return html
                }
              },
              { "data": "nis" },
              { "data": "nama" }, // Tampilkan nis
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var code = noG++;
                  var html  = '<div class="custom-control custom-checkbox mb-3"> <input type="checkbox" class="custom-control-input" id="customCheck\'' + code + '\'" name="guru" value="\'' + row.kode_guru + '\'"> <label class="custom-control-label" for="customCheck\'' + code + '\'"></label></div>';
                  return html
                }
              },
            ],
          });

tabel2 = $('#example2').DataTable({
            "ajax":
            {
              "dataSrc": "dataMurid",
              "url": "http://localhost/e_rapot/A_kelas/loadDataMurid", // URL file untuk proses select datanya
              "type": "GET"
            },
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = no++;
                  return html
                }
              },
              { "data": "nis" },
              { "data": "nama" }, // Tampilkan nis
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var code = noG++;
                  var html  = '<div class="custom-control custom-checkbox mb-3"> <input type="checkbox" class="custom-control-input" id="customCheck\'' + code + '\'" name="murid" value="\'' + row.kode_murid + '\'"> <label class="custom-control-label" for="customCheck\'' + code + '\'"></label></div>';
                  return html
                }
              },
            ],
          });


$("#simpanMurid").click(function(){
  var code = [];
  $.each($("input[name='murid']:checked"), function(){
    code.push($(this).val());
  });
  if (code && code.length > 0) {
    console.log(code);
    $.ajax({
      url : 'http://localhost/e_rapot/A_kelas/saveMurid',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      data: {codeMurid : code, codeKls : localStorage.getItem('codeKls')},
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
             window.location.href = "<?php echo base_url('A_kelas/tambah'); ?>";
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




  $("#simpanGuru").click(function(){
    var id = $("input[name='idGuru']:checked").val();
    console.log(localStorage.getItem('codeMapelInKls'));
    console.log(localStorage.getItem('codeKls'));
    console.log(id);

    if (id != null) {
      console.log(id);
      $.ajax({
        url : 'http://localhost/e_rapot/A_kelas/saveGuru',
        method: 'POST',
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        data: {codeGuru : id, codeMapel : localStorage.getItem('codeMapelInKls') ,codeKls : localStorage.getItem('codeKls')},
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
               window.location.href = "";
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

function aksiTmbGuru(code){
  var table2 = '';
  var id = code;
  var codeKls = localStorage.getItem('codeKls');
  localStorage.setItem('codeMapelInKls', id);
    $.ajax({
      url : "http://localhost/e_rapot/A_kelas/aksiLoadGuru",
      method: 'GET',
      dataType: 'json',
      data: {id : id, codeKls : codeKls},
      contentType: 'application/x-www-form-urlencoded',
      success: function(data){
        table2 += '<div class="table-responsive">';
        table2 += '<table class="table table-bordered">';
        table2 += '<thead>';
        table2 += '<tr>';
        table2 += '<th scope="col">No</th>';
        table2 += '<th scope="col">NIP</th>';
        table2 += '<th scope="col">Nama Guru</th>';
        table2 += '<th scope="col">Aksi</th>';
        table2 += '</tr>';
        table2 += '</thead>';
        table2 += '<tbody>';
        if (data.data.length === 0) {
          table2 = '<tr> <td colspan="4"> Tidak ada data guru yang ditambahkan </td> </tr>';
        }else {
          $.each(data.data, function(idx, obj){

            var no = idx+1;
            table2 += '<tr>';
            table2 += '<td>' + no + '</td>';
            table2 += '<td>' + obj.nip + '</td>';
            table2 += '<td>' + obj.nama + '</td>';
            if (obj.kode_kls == codeKls) {
              table2 += '<td> <span class="badge badge-primary">dipilih</span> </td>';
            }else {
              table2 += '<td> <div class="custom-control custom-radio"> <input type="radio" class="custom-control-input" id="customRadio\'' + obj.kode_guru + '\'" name="idGuru" value="\'' + obj.kode_guru + '\'"><label class="custom-control-label" for="customRadio\'' + obj.kode_guru + '\'"></label> </div>   </td>';

            }
            table2 += '</tr>';

          });
        }

        table2 += '</tbody>';
        table2 +=  '</table>';
        table2 += '</div>';

        $('#contentGuru').html(table2);
        $("#getCodeModal").modal('show');

      },
      error: function( errorThrown ){
        console.log( errorThrown);

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
