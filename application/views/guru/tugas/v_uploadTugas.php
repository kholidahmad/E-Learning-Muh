<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Murid</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmlMurid"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Upload</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmlUpload"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Belum Upload</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmlBlm"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Data Kelas </h6>
        </div>
        <div class="card-body">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" id="judul"></h4>
              <br>
              <p class="card-text" id="isi"></p>
              <br>
              <a href="#" class="card-link" id="finish"></a>
              <a href="#" class="card-link" id="status"></a>
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
          <h6 class="m-0 font-weight-bold text-primary">Data Upload Murid</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>Nama File</th>
                  <th>Download</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>Nama File</th>
                  <th>Download</th>
                </tr>
              </tfoot>
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
  var kode_tugas = localStorage.getItem('kode_tugas');
  var table = '';
  $.ajax({
    url : 'http://localhost/e_rapot/G_tugas/loadTugas',
    method: 'GET',
    data : {kode_tugas : kode_tugas, codeKls : localStorage.getItem('codeKls')},
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataTugas);
      console.log(data.cMurid)
      $('#jmlMurid').html(data.cMurid);
      $('#jmlUpload').html(data.cUpload);
      $('#jmlBlm').html(data.cBlm);

      $.each(data.dataTugas, function(idx, obj){
        $('#judul').html(obj.nama_tugas);
        $('#isi').html(obj.deskripsi);
        $('#finish').html('Deadline : '+obj.tgl_finish+' | '+obj.time_finish);
        if (obj.status == 1) {
          $('#status').html('status : '+ '<span class="badge badge-pill badge-primary">Berlangsung</span>');
        }else {
          $('#status').html('status : '+ '<span class="badge badge-pill badge-danger">Selesai</span>');
        }
      });
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });


  data_tabel = $('#example1').DataTable({
              destroy: true,
              "ajax":
              {
                "dataSrc": "dataUploadTugas",
                "url": "http://localhost/e_rapot/G_tugas/dataUpload", // URL file untuk proses select datanya
                "data" : {kode_tugas : kode_tugas, codeKls : localStorage.getItem('codeKls')},
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
                { "data": "nama_file" },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    if (row.nama_file) {
                      var html1 = '<a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('G_tugas/aksiDownload/')?>'+ row.nama_file +'"> Download </button> ';
                      return html1
                    }else {
                      var html3  = '<span class="badge badge-pill badge-danger">Belum Upload</span>';
                      return html3
                    }

                  }
                },
              ],
            });


});


function aksiInputTugas(id){
  localStorage.setItem('codeKls', id);
  window.location.href = "<?php echo base_url('G_tugas/inputTugas'); ?>";
}

</script>
