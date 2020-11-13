<?php $this->load->view('admin/v_header'); ?>
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
          <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/v_footer'); ?>

<script type="text/javascript">


$(document).ready(function() {
  var table = '';
  // $.ajax({
  //   url : 'http://localhost/e_rapot/index.php/Menu/loadMenu',
  //   method: 'GET',
  //   dataType: 'json',
  //   contentType: 'application/x-www-form-urlencoded',
  //   success: function(data){
  //     console.log(data.menu);
  //     $.each(data.menu, function(idx, obj){
  //       table += '<li class="nav-item">';
  //       table += '<a class="nav-link" href="'+ obj.nama_ctrl +'">';
  //       table += obj.ikon;
  //       table += '<span>'+ obj.nama +'</span></a>';
  //       table += '</li>';
  //     });
  //     $("#loadMenu").html(table);
  //
  //
  //   },
  //   error: function( errorThrown ){
  //     console.log(errorThrown);
  //   }
  // });

});


</script>
