<?php $this->load->view('guru/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User (Murid)</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Data Kelas </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>Password</th>
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

<?php $this->load->view('guru/v_footer'); ?>

<script type="text/javascript">

$(document).ready(function() {
  var no=1;
  var table = '';
  tabel = $('#example1').DataTable({
              "ajax":
              {
                "dataSrc": "dataUsr",
                "url": "http://localhost/e_rapot/G_dataUsr/loadDataUsr", // URL file untuk proses select datanya
                "data" : {"codeKls" : localStorage.getItem('codeKls')},
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
                { "data": "password" },
              ],
            });



});


function aksiInputTugas(id){
  localStorage.setItem('codeKls', id);
  window.location.href = "<?php echo base_url('G_dataUsr/dataUsr'); ?>";
}

</script>
