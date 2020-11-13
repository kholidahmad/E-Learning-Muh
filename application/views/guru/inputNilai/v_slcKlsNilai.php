<?php $this->load->view('v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">
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

<?php $this->load->view('v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {

  var table = '';
  $.ajax({
    url : 'http://localhost/e_rapot/G_inputNilai/slcKls',
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
      table += '<th scope="col"> Progess </th>'
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

        table += '<td> <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>';
        table += ' <div class="progress mb-4">';
        table += '<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>';
        table += '</div> </td>'

        table += '<td> <button class="btn btn-outline-primary btn-sm" onClick="aksiInputNilai(\'' + obj.kode_kls + '\')"> Input Nilai <i class="fas fa-trash" style="font-size: 20px; margin-top: 5px"></i> </button> </td>';
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


function aksiInputNilai(id){
  localStorage.setItem('codeKls', id);
  window.location.href = "<?php echo base_url('G_inputNilai/inputNilai'); ?>";
}

</script>
