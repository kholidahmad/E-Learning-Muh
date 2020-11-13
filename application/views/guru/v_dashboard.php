<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Mata Pelajaran :  <?php echo $nama_mapel; ?></a>
  </div>

  <!-- Content Row -->
  <div class="row">
    
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Materi Keseluruhan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jmlMateri ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Tugas Keseluruhan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jmlTugas ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Quiz Keseluruhan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jmlQuiz ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Tugas yang sedang berlangsung</h6>
        </div>
        <div class="card-body">
          <?php if ($slcTugas){ ?>
            <?php foreach ($slcTugas as $val): ?>
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $val->nama_tugas ?></h4>
                  <!-- <p class="card-text">Some example text. Some example text.</p> -->
                  <a href="#" class="card-link"><?php echo $val->nama_kls ?></a>
                  <a href="#" class="card-link"><?php echo $val->tgl_finish ?> | <?php echo $val->time_finish ?></a>
                </div>
              </div>    
            <?php endforeach ?>
          <?php }else{ ?>
              <div class="card border-danger mb-3">
                <div class="card-body">
                  <p class="card-text">Tidak ada Tugas yang tersedia di seluruh kelas</p>
                  <!-- <p class="card-text">Some example text. Some example text.</p> -->
                </div>
              </div>
            <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Quiz yang sedang berlangsung</h6>
        </div>
        <div class="card-body">
          <?php if ($slcQuiz){ ?>
            <?php foreach ($slcQuiz as $val): ?>
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $val->nama_quiz ?></h4>
                  <!-- <p class="card-text">Some example text. Some example text.</p> -->
                  <a href="#" class="card-link"><?php echo $val->nama_kls ?></a>
                  <a href="#" class="card-link"><?php echo $val->tgl_finish ?> | <?php echo $val->time_finish ?></a>
                </div>
              </div>
              <br>    
            <?php endforeach ?>
          <?php }else{ ?>
              <div class="card border-danger mb-3">
                <div class="card-body">
                  <p class="card-text">Tidak ada quiz yang tersedia di seluruh kelas</p>
                  <!-- <p class="card-text">Some example text. Some example text.</p> -->
                </div>
              </div>
          <?php } ?>
          

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('guru/v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {
  $.ajax({
    url : 'http://localhost/e_rapot/G_dashboard/loadData',
    method: 'GET',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.menu);
      // $("#getCodeModal").modal('show');
      //
      // $.each(data.dataMapel, function(idx, obj){
      //   var no = idx+1;
      //   table += '<tr>';
      //   table += '<td>' + no + '</td>';
      //   table += '<td>' + obj.nama_mapel + '</td>';
      //   table += '</tr>';
      // });
      // table += '</tbody>';
      // table +=  '</table>';
      // table += '</div>';


      $("#slcMapel").html(table);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});

</script>
