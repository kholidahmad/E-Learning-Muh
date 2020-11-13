<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Murid</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Mata Pelajaran :  <?php echo $nama_mapel; ?></a>

  </div>

  <!-- Content Row -->
  <div class="modal fade tmbMapelModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="getCodeModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Murid</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Murid</th>
                        <th>Jenis Kelamin</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Murid</th>
                        <th>Jenis Kelamin</th>

                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


  <!-- ----------------- modal end ----------- -->
  <div class="row">


<!--

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
    </div> -->


    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
        </div>
        <div class="card-body">
          <div id="slcKls">

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
  var table = '';
  $.ajax({
    url : 'http://localhost/e_rapot/G_murid/slcKls',
    method: 'GET',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataKls);
      console.log(data.id);
      table += '<div class="table-responsive">';
      table += '<table class="table table-bordered">';
      table += '<thead>';
      table += '<tr>';
      table += '<th scope="col">No</th>';
      table += '<th scope="col">Nama Kelas</th>';
      table += '<th scope="col">Jumlah Murid</th>';
      table += '<th scope="col">Aksi</th>';
      table += '</tr>';
      table += '</thead>';
      table += '<tbody>';
      $.each(data.dataKls, function(idx, obj){
        var no = idx+1;
        table += '<tr>';
        table += '<td>' + no + '</td>';
        table += '<td>' + obj.nama_kls + '</td>';
        table += '<td>' + obj.total + '</td>';
        table += '<td> <button class="btn btn-outline-primary btn-sm" onClick="aksiLihatMurid(\'' + obj.kode_kls + '\')"> Lihat Murid  </button> </td>';
        table += '</tr>';
      });
      table += '</tbody>';
      table +=  '</table>';
      table += '</div>';


      $("#slcKls").html(table);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });


});
var data_table = '';
function aksiLihatMurid(code){

  var id = code;
  var no = 1;
  data_tabel = $('#example1').DataTable({
              destroy: true,
              "ajax":
              {
                "dataSrc": "dataMurid",
                "url": "http://localhost/e_rapot/G_murid/slcMurid", // URL file untuk proses select datanya
                "data" : {id : id},
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
                { "data": "jk" }
              ],
            });

  $("#getCodeModal").modal('show');

}


</script>
