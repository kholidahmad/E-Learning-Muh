<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Pesan</h1>
      <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
  <!-- Page Heading -->

  <!-- Content Row -->
  <div class="ui raised segment">




  <div class="ui top attached tabular menu">
    <a class="active item" data-tab="first"> <i class="icon envelope"></i>Pesan</a>
    <a class="item" data-tab="inbox"><i class="icon inbox"></i> Inbox</a>
    <a class="item" data-tab="second"><i class="icon paper plane"></i> Terkirim</a>

  </div>
  <div class="ui bottom attached active tab segment" data-tab="first">

      <div class="row">
        <div class="col-md-12">
          <form class="ui form">

            <div class="field">
              <label>Kepada</label>
              <button class="ui basic button">
                <i class="icon user"></i>
                Penerima
              </button>
              <a class="ui teal tag label">Featured</a>
            </div>

            <div class="field">
              <label>Subject</label>
              <input type="text" name="first-name" placeholder="Subject">
            </div>




            <div class="field">
              <label>Isi Pengumuman</label>
              <textarea rows="10"></textarea>
            </div>
          </form>
        </div>
      </div>

      <div class="ui horizontal divider">
  <i class="chevron down icon"></i>

</div>


      <div class="ui right aligned grid">
        <div class="sixteen wide column">

          <div class="ui animated primary button" tabindex="0">
            <div class="visible content"><i class="icon envelope"></i> Kirim</div>
            <div class="hidden content">
              <i class="right arrow icon"></i>
            </div>
          </div>

        </div>
      </div>





  </div>
  <div class="ui bottom attached tab segment" data-tab="second">

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


  <div class="ui bottom attached tab segment" data-tab="inbox">

    <div class="card mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
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

</div>


</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/v_footer'); ?>
<script type="text/javascript">

tinymce.init({selector:'textarea'});

$('.menu .item')
  .tab()
;

$('.ui.checkbox')
  .checkbox()
;

$('#dataTable1').DataTable()

</script>
