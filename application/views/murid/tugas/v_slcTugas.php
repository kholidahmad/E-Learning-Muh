
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="namamapel"></a>
  </div>

  <!-- Content Row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Tugas</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tugas</th>
                  <th>Tanggal Finish</th>
                  <th>Time Finish</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
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

<?php $this->load->view('murid/v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {
  $("#namamapel").text('Mapel : ' +localStorage.getItem('nama_mapel'))
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  $('input.timepicker').timepicki();
  var no = 1;
  var data_tabel = '';
  var idKls = localStorage.getItem('codeKls');

  $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    $('#idKls').val(localStorage.getItem('codeKls'));

    data_tabel = $('#example1').DataTable({
                destroy: true,
                "ajax":
                {
                  "dataSrc": "dataTugas",
                  "url": "http://localhost/e_rapot/S_tugas/loadTugas", // URL file untuk proses select datanya
                  "type": "GET"
                },
                "columns": [
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html  = no++;
                      return html
                    }
                  },
                  { "data": "nama_tugas" },
                  { "data": "tgl_finish" }, // Tampilkan nis
                  { "data": "time_finish" },
                  
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      if (row.status == 1) {
                        var html2 = '<span class="badge badge-pill badge-primary">Berlangsung</span>'
                      }else {
                        var html2 = '<span class="badge badge-pill badge-danger">Selesai</span>'
                      }
                      return html2
                    }
                  },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    if (row.status == 1) {
                      var html1  = '<button class="btn btn-outline-primary btn-sm" onClick="aksiUploadTugas(\'' + row.kode_tugas + '\')">  Upload Murid  </button> ';
                    }else {
                      var html1 = '<span class="badge badge-pill badge-danger">Selesai</span>'
                    }
                      return html1
                    }
                  },
                ],
              });

});



function aksiUploadTugas(id){
  localStorage.setItem('kode_tugas', id);
  window.location.href = "<?php echo base_url('S_tugas/uploadTugas'); ?>";
}




</script>
