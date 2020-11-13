<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengumuman</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->

  <div class="row">
    <div class="col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pengumuman</6>
        </div>
        <div class="card-body">
          <div id="loadPengumuman">

          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Pengumuman</6>
        </div>
        <div class="card-body">
          <div class="form-group">
            <textarea class="form-control" id="isiPng" rows="7" placeholder="Masukkan Pengumuman"></textarea>
          </div>
          <div class="card-footer text-right">
            <button type="button"  class="btn btn-primary btn-sm" name="button" id="savePng">Kirim</button>
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
  var html = '';
  $.ajax({
    url : 'http://localhost/e_rapot/G_pengumuman/loadPng',
    method: 'GET',
    data : {codeKls : localStorage.getItem('codeKls')},
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    success: function(data){
      console.log(data.dataLoad);
      $.each(data.dataLoad, function(idx, obj){
        html += '<div class="card mb-3">';
        html += '<div class="card-body">';
        html += '<p class="card-text"> '+ obj.isi +'</p>';
        html += '<br>';
        html += '<p class="card-text"><small class="text-muted">'+ obj.tgl +' | '+ obj.jm +'</small></p>';
        html += '</div>';
        html += '<div class="card-footer text-right"><button type="button"  class="btn btn-danger btn-sm" name="button" onClick="aksiHapus('+ obj.id +')">Hapus</button></div>'
        html += '</div>';
      });
      $('#loadPengumuman').html(html);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});


$("#savePng").click(function(e){
  e.preventDefault()
  tinyMCE.triggerSave();
  var isi = $("#isiPng").val();
  $.ajax({
    url : 'http://localhost/e_rapot/G_pengumuman/tmbPng',
    method: 'POST',
    dataType: 'json',
    contentType: 'application/x-www-form-urlencoded',
    data: {isi : isi, codeKls : localStorage.getItem('codeKls')},
    success: function(data){
      Swal.fire({
        position: 'top',
        type: 'success',
        title: 'Data berhasil ditambahkan',
        showConfirmButton: false,
        timer: 1500
      });
      setTimeout(function(){
         window.location.href = "<?php echo base_url('G_pengumuman/inputPng'); ?>";
      }, 1500);
    },
    error: function( errorThrown ){
      console.log(errorThrown);
    }
  });

});

function aksiHapus(id){
  Swal.fire({
  title: 'Are you sure?',
  text: "Apakah anda yakin sudah mengerjakan semua soal?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url : 'http://localhost/e_rapot/G_pengumuman/hpsPng',
        method: 'POST',
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        data: {id : id},
        success: function(data){
          if (data.status = 'success') {
            Swal.fire({
              position: 'top',
              type: 'success',
              title: 'Berhasil di Hapus',
              showConfirmButton: false,
              timer: 1500
            });
            setTimeout(function(){
               window.location.href = "<?php echo base_url('G_pengumuman/inputPng'); ?>";
            }, 1500);

          }
        },
        error: function( errorThrown ){
          console.log(errorThrown)
        }
      });
    }
  });
}

</script>
