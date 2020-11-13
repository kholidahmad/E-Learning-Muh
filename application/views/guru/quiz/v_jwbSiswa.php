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
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Jawaban</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Murid</th>
                  <th>Score</th>
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
  var no = 1;
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


  data_tabel = $('#example1').DataTable({
                destroy: true,
                "ajax":
                {
                  "dataSrc": "data",
                  "url": "http://localhost/e_rapot/G_quiz/loadJwb", // URL file untuk proses select datanya
                  "data" : {kode_quiz : localStorage.getItem('kode_quiz'), idKls : localStorage.getItem('codeKls')},
                  "type": "POST"
                },
                "columns": [
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      var html  = no++;
                      return html
                    }
                  },
                  { "data": "nis" },
                  { "data": "nama" }, // Tampilkan nis
                  { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                      
                      var html1  = '<button class="btn btn-outline-primary btn-sm" onClick="aksiJwbQuiz(\'' + row.kode_murid + '\')">  Lihat  </button> ';
                      return html1
                    }
                  },
                ],
              });

});

function aksiJwbQuiz(id){
  localStorage.setItem('kode_murid', id);
  window.location.href = "<?php echo base_url('G_quiz/jwbMurid'); ?>";
}

</script>
