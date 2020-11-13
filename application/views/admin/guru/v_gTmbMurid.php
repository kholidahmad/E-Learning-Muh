<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Guru</h1>
      <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- Content Row -->

  <div class="ui raised segment">

    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Daftar Murid</a>
      <a class="item" data-tab="second">Tambah Murid</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">


      <div class="card mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>Kelas</th>
                  <th>Aksi</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Aksi</th>

                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>
                  <button class="ui compact icon button"> <i class="trash icon"></i> </button>
                  </td>

                </tr>
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>
                  <button class="ui compact icon button"> <i class="trash icon"></i> </button>
                  </td>

                </tr>
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>
                  <button class="ui compact icon button"> <i class="trash icon"></i> </button>
                  </td>

                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
    <div class="ui bottom attached tab segment" data-tab="second">


      <div class="card mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Mengampu</th>
                  <th>Aksi</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>Kelas</th>
                  <th>Aksi</th>

                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>

                  <td><div class="inline field">
                    <div class="ui checkbox">
                      <input type="checkbox" tabindex="0" class="hidden">
                    </div>
                  </div></td>

                </tr>
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>

                  <td><div class="inline field">
                    <div class="ui checkbox">
                      <input type="checkbox" tabindex="0" class="hidden">
                    </div>
                  </div></td>

                </tr>
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>

                  <td><div class="inline field">
                    <div class="ui checkbox">
                      <input type="checkbox" tabindex="0" class="hidden">
                    </div>
                  </div></td>

                </tr>

              </tbody>
            </table>
          </div>

          <div class="ui left aligned grid">
            <div class="sixteen wide column">

                <button type="button" class="btn btn-md btn-primary mt-3" id="tmbGuru" name="button" data-toggle="modal" data-target=".tmbGuruModal"> <b> <i class="icon plus"></i> </b>Tambah Murid</button>

            </div>
          </div>

        </div>
      </div>


    </div>


  </div>




</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/v_footer'); ?>

<script type="text/javascript">
$('.menu .item')
.tab()
;

$('.ui.checkbox')
  .checkbox()
;

$('#dataTable1').DataTable()
</script>
