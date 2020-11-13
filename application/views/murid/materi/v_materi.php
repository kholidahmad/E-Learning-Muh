
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Materi</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="namamapel"></a>
  </div>

  <!-- Content Row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Materi</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Materi</th>
                  <th>Nama File</th>
                  <th>Tipe File</th>
                  <th>Ukuran File</th>
                  <th>Download</th>
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
  var no = 1;
  var data_tabel = '';

    data_tabel = $('#example1').DataTable({
                destroy: true,
                "ajax":
                {
                  "dataSrc": "dataMateri",
                  "url": "http://localhost/e_rapot/S_materi/slcMateri", // URL file untuk proses select datanya
                  "type": "GET"
                },
                "columns": [
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html  = no++;
                      return html
                    }
                  },
                  { "data": "nama_materi" },
                  { "data": "nama_file" }, // Tampilkan nis
                  { "data": "tipe_file" },
                  { "data": "ukuran_file" },
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html1 = '<a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('S_materi/aksiDownload/')?>'+ row.nama_file +'"> Download </a> ';
                      return html1
                    }
                  },
                ],
              });

});





</script>
