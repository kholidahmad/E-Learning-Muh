<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">


        <h1 class="h3 mb-2 text-gray-800">Data User</h1>
<br>
<!--
  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">

    <div class="col-lg-12">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">Guru</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1">Murid</a>
                </li>
              </ul>


              <div class="tab-content">
                <div class="tab-pane container active" id="home">
                  <br>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIP / NIBM</th>
                          <th>Nama Guru</th>
                          <th>Mapel</th>
                          <th>Username</th>
                          <th>Password</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>

                </div>
                <div class="tab-pane container fade" id="menu1">
                  <br>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama Murid</th>
                          <th>Kelas</th>
                          <th>Username</th>
                          <th>Password</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <button type="button"  class="btn btn-primary" name="button">Simpan</button>
                </div>
              </div>

            </div>
          </div>



          <!-- DataTales Example -->


    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/v_footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    var noGuru = 1;
    var noMurid = 1;
    tabel = $('#example1').DataTable({
            "ajax":
            {
              "dataSrc": "dataUsrGuru",
              "url": "http://localhost/e_rapot/A_dataUsr/loadDataUsr", // URL file untuk proses select datanya
              "type": "GET"
            },
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = noGuru++;
                  return html
                }
              },
              { "data": "nip" },
              { "data": "nama" },
              { "data": "nama_mapel" },
              { "data": "username" },
              { "data": "password" },
            ],
          });

tabel2 = $('#example2').DataTable({
            "ajax":
            {
              "dataSrc": "dataUsrMurid",
              "url": "http://localhost/e_rapot/A_dataUsr/loadDataUsr", // URL file untuk proses select datanya
              "type": "GET"
            },
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html  = noMurid++;
                  return html
                }
              },
              { "data": "nis" },
              { "data": "nama" },
              { "data": "nama_kls" },
              { "data": "username" },
              { "data": "password" },
            ],
          });
  });
</script>