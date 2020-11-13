
<!-- Begin Page Content -->
<div class="container-fluid">



  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">

      <h1 class="h3 mb-2 text-gray-800">Mata Pelajaran</h1>

          <div class="ui right aligned grid">
            <div class="">



            </div>
          </div>

<br>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Mata Pelajaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Mapel</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Mapel</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
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
// Material Select Initialization

$('.select2').select2();

$('#nip').inputmask();
$('#tglLahir').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
$('[data-mask]').inputmask();

var table = null;
var no = 1;
$(document).ready(function() {


tabel = $('#example1').DataTable({

            "ajax":
            {
              "dataSrc": "dataMapel",
              "url": "http://localhost/e_rapot/A_mapel/loadMapel", // URL file untuk proses select datanya
              "type": "GET"
            },
            // "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html1  = no++;
                  return html1
                }
              },
              { "data": "nama_mapel" }, // Tampilkan nis

              // { "render": function ( data, type, row ) {  // Tampilkan jenis kelamin
              //     var html = ""
              //     if(row.jenis_kelamin == 1){ // Jika jenis kelaminnya 1
              //       html = 'Laki-laki' // Set laki-laki
              //     }else{ // Jika bukan 1
              //       html = 'Perempuan' // Set perempuan
              //     }
              //     return html; // Tampilkan jenis kelaminnya
              //   }
              // },
               // Tampilkan alamat
              { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                  var html = '<button class="btn btn-outline-primary btn-sm" onClick="aksiNext(\'' + row.kode_mapel + '\', \'' + row.nama_mapel + '\')"> Next </button> ';
                  return html
                }
              },
            ],
          });
});

function aksiNext(id, nama_mapel){
  localStorage.setItem('kode_mapel', id);
  localStorage.setItem('nama_mapel', nama_mapel);
  window.location.href = "<?php echo base_url('S_dashboard') ?>?kode="+id;
}







</script>
