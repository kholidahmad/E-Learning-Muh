<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="namamapel"></a>
  </div>

  <!-- Content Row -->

  <div class="modal fade tmbMapelModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Tugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?php echo base_url('S_tugas/aksiUploadTugas') ?>" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label for="nama_materi">Nama Tugas</label>
                  <input type="text" name="namaTugas" class="form-control" id="nama_materi" placeholder="Masukkan Nama Tugas">
                </div>
                <input type="hidden" name="idTugas" id="idTugas">
                <div class="form-group">
                  <label for="nama_materi">Upload Tugas</label>
                  <div class="custom-file">
                    <input type="file" name="fileTugas" class="custom-file-input" id="inputGroupFile01" />
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>

              </div>

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btnSaveMapel">Save Data</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <!-- --------------------- Modal Upload Tugas ------------------- -->


  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
        </div>
        <div class="card-body">
          <?php echo $this->session->flashdata('message'); ?>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" id="judul"></h4>
              <br>
              <p class="card-text" id="isi"></p>
              <br>
              <a href="#" class="card-link" id="finish"></a>
              <a href="#" class="card-link" id="status"></a>
              <a href="#" class="card-link" id="upTugas"></a>
              <br>
              <br>
              <button class="btn btn-outline-primary btn-sm" id="tmbMapelModal" name="button" data-toggle="modal" data-target=".tmbMapelModal"> Upload Tugas </button>
              <br>
              <br>

              <div id="getTugas">

              </div>



            </div>
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
    $("#namamapel").text('Mapel : ' + localStorage.getItem('nama_mapel'));
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });

    var data_tabel = '';
    var kode_tugas = localStorage.getItem('kode_tugas');
    var table = '';
    $('#idTugas').val(kode_tugas);

    $.ajax({
      url: 'http://localhost/e_rapot/S_tugas/loadTugasMurid',
      method: 'GET',
      data: {
        kode_tugas: kode_tugas
      },
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(data) {
        console.log(data.dataTugas);
        console.log(data.getTugas);
        $.each(data.dataTugas, function(idx, obj) {
          $('#judul').html(obj.nama_tugas);
          $('#isi').html(obj.deskripsi);
          $('#finish').html('Deadline : ' + obj.tgl_finish + ' | ' + obj.time_finish);
          if (obj.status == 1) {
            $('#status').html('status : ' + '<span class="badge badge-pill badge-primary">Berlangsung</span>');
          } else {
            $('#status').html('status : ' + '<span class="badge badge-pill badge-danger">Selesai</span>');
          }
        });
        getTugas = '';
        if (data.getTugas == 'null') {
          getTugas += '<table class="table">';
          getTugas += '<thead>';
          getTugas += '<tr>'
          getTugas += '<th scope="col">Nama Tugas</th>'
          getTugas += '<th scope="col">Nama File</th>'
          getTugas += '<th scope="col">Ukuran</th>'
          getTugas += '<th scope="col">Download</th>'
          getTugas += '</tr>'
          getTugas += '</thead>'
          getTugas += '<tbody>'
          getTugas += '<tr class="table-danger">'
          getTugas += '<td>-</td>'
          getTugas += '<td>-</td>'
          getTugas += '<td>-</td>'
          getTugas += '<td>-</td>'
          getTugas += '</tr>'
          getTugas += '</tbody>'
          getTugas += '</table>'
        } else {
          $.each(data.getTugas, function(idx, obj) {
            getTugas += '<table class="table">';
            getTugas += '<thead>';
            getTugas += '<tr>'
            getTugas += '<th scope="col">Nama Tugas</th>'
            getTugas += '<th scope="col">Nama File</th>'
            getTugas += '<th scope="col">Ukuran</th>'
            getTugas += '<th scope="col">Revisi</th>'
            getTugas += '<th scope="col">Download</th>'
            getTugas += '</tr>'
            getTugas += '</thead>'
            getTugas += '<tbody>'
            getTugas += '<tr class="table-success">'
            getTugas += '<td>' + obj.nama_tugas + '</td>'
            getTugas += '<td>' + obj.nama_file + '</td>'
            getTugas += '<td>' + obj.ukuran_file + '</td>'
            getTugas += '<td>' + obj.rev + '</td>'
            getTugas += '<td><a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('S_tugas/aksiDownload/') ?>' + obj.nama_file + '"> Download </a> </td>'
            getTugas += '</tr>'
            getTugas += '</tbody>'
            getTugas += '</table>'
          });
        }
        $('#getTugas').html(getTugas);

      },
      error: function(errorThrown) {
        console.log(errorThrown);
      }
    });



  });


  function aksiInputTugas(id) {
    localStorage.setItem('codeKls', id);
    window.location.href = "<?php echo base_url('G_tugas/inputTugas'); ?>";
  }
</script>