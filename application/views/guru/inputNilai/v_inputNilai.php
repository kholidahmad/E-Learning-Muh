<?php $this->load->view('v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th>Lain</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th>Lain</th>
                  <th>Total</th>
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

  <!-- Content Row -->


</div>
<!-- /.container-fluid -->

<?php $this->load->view('v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {
  var no = 1;
  var idKls = localStorage.getItem('codeKls');
  var data_table = '';
  data_tabel = $('#example1').DataTable({
              destroy: true,
              "ajax":
              {
                "dataSrc": "dataMuridNilai",
                "url": "http://localhost/e_rapot/G_inputNilai/slcMuridNilai", // URL file untuk proses select datanya
                "data" : {idKls : idKls},
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
                    var html = '';
                    if (row.uts == null) {
                      html += '<button class="btn btn-outline-warning btn-sm" onClick="aksiUts(\'' + row.kode_murid + '\')"> <i class="fas fa-plus" style="font-size: 15px; margin-top: 5px"></i> </button>'
                    }else {
                      html += '<button class="btn btn-outline-primary btn-sm" onClick="aksiUts(\'' + row.kode_murid + '\')"> \'' + row.uts + '\' <i class="fas fa-exclamation" style="font-size: 20px; margin-top: 5px"></i> </button>'
                    }
                    return html;
                  }
                },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    var html = '';
                    if (row.uas == null) {
                      html += '<button class="btn btn-outline-warning btn-sm" onClick="aksiUas(\'' + row.kode_murid + '\')"> <i class="fas fa-plus" style="font-size: 15px; margin-top: 5px"></i> </button>'
                    }else {
                      html += '<button class="btn btn-outline-primary btn-sm" onClick="aksiUas(\'' + row.kode_murid + '\')"> \'' + row.uts + '\' <i class="fas fa-exclamation" style="font-size: 20px; margin-top: 5px"></i> </button>'
                    }
                    return html;
                  }
                },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    var html = '';
                    if (row.lain == null) {
                      html += '<button class="btn btn-outline-warning btn-sm" onClick="aksiLain(\'' + row.kode_murid + '\')"> <i class="fas fa-plus" style="font-size: 15px; margin-top: 5px"></i> </button>'
                    }else {
                      html += '<button class="btn btn-outline-primary btn-sm" onClick="aksiLain(\'' + row.kode_murid + '\')"> \'' + row.uts + '\' <i class="fas fa-exclamation" style="font-size: 20px; margin-top: 5px"></i> </button>'
                    }
                    return html;
                  }
                },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    var html = '';
                    if (row.total == null) {
                      html += '-';
                    }else {
                      html += row.total;
                    }
                    return html;
                  }
                },

              ],
            });

});

function aksiUts(codeMurid){
  var idKls = localStorage.getItem('codeKls');
  $.ajax({
    url : 'http://localhost/e_rapot/G_inputNilai/inputUts',
    method: 'POST',
    data : {idKls : idKls, codeMurid: codeMurid},
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){

    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });
}

</script>
