
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="namamapel"></a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
        </div>
        <div class="card-body">
          <?php if ($slcPng){ ?>
            <?php foreach ($slcPng as $val): ?>
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $val->nama ?></h4>
                  <p class="card-text"><?php echo $val->isi ?></p>
           
                  <a href="#" class="card-link"><?php echo $val->tgl ?> | <?php echo $val->jm ?></a>
                </div>
              </div>    
            <?php endforeach ?>
          <?php }else{ ?>
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <p class="card-text">Tidak ada pengumuman</p>
                  <!-- <p class="card-text">Some example text. Some example text.</p> -->
                </div>
              </div>
            <?php } ?>
          

        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Upcoming</h6>
        </div>
        <div class="card-body">
          <h6 class="text-primary">Tugas</h6>
          <?php if ($slcTugas){ ?>
            <?php foreach ($slcTugas as $val): ?>
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $val->nama_tugas ?></h4>
                  <!-- <p class="card-text">Some example text. Some example text.</p> -->
                  <a href="#" class="card-link"><?php echo $val->tgl_finish ?> | <?php echo $val->time_finish ?></a>
                </div>
              </div>    
            <?php endforeach ?>
          <?php } ?>
          <hr>
           <h6 class="text-primary">Quiz</h6>
          <?php if ($slcQuiz){ ?>
            <?php foreach ($slcQuiz as $val): ?>
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $val->nama_quiz ?></h4>
                  <!-- <p class="card-text">Some example text. Some example text.</p> -->
                  <a href="#" class="card-link"><?php echo $val->tgl_finish ?> | <?php echo $val->time_finish ?></a>
                </div>
              </div>    
            <?php endforeach ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('murid/v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {
  $.ajax({
    url : 'http://localhost/e_rapot/index.php/Menu/loadMenu',
    method: 'GET',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.menu);
      $("#namamapel").text('Mapel : ' +localStorage.getItem('nama_mapel'))
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
