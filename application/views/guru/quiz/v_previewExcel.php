<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Preview</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Mata Pelajaran :  <?php echo $nama_mapel; ?> /  <span > <b id="nama_kls"></b></span></a>
  </div>



  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">

      
          <div class="ui right aligned grid">
            <div class="">

            </div>
          </div>
          <?php 
            if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form     
              if(isset($upload_error)){ // Jika proses upload gagal      
              echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload      
            die;
            } // stop skrip    }
           ?>

          <!-- DataTales Example -->

          <form method="post" action="<?php echo base_url('G_quiz/import') ?>">
            <input type="hidden" name="kode_quiz" id="kode_quiz">
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Soal</h6>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pertanyaan</th>
                      <th>Option A</th>
                      <th>Option B</th>
                      <th>Option C</th>
                      <th>Option D</th>
                      <th>Kunci Jawaban</th>
                      <th>Nama Mapel</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $numrow = 1;
                      $kosong = 0;
                      $noUrut = 0;
                    ?>
                    <?php
                      foreach($sheet as $row){
                          $pertanyaan = $row['A']; // Ambil data nama
                          $optionA = $row['B'];
                          $optionB = $row['C'];
                          $optionC = $row['D'];
                          $optionD = $row['E'];
                          $kunci = $row['F'];
                          $mapel = $row['G'];

                          $jenis_kelamin = $row['B']; // Ambil data jenis kelamin
                          if($pertanyaan == "" && $optionA == "" && $optionB == "" && $optionC == "" && $optionD == "" && $kunci == "" && $mapel == ""){
                            continue;
                          }
                          if($numrow > 1){
                            // Validasi apakah semua data telah diisi
                            $pertanyaan_td = ( ! empty($pertanyaan))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                            $optionA_td = ( ! empty($optionA))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                            $optionB_td = ( ! empty($optionB))? "" : " style='background: #E07171;'";
                            $optionC_td = ( ! empty($optionC))? "" : " style='background: #E07171;'";
                            $optionD_td = ( ! empty($optionD))? "" : " style='background: #E07171;'";
                            
                            $kunci_td = ( ! empty($kunci))? "" : " style='background: #E07171;'";
                            $mapel_td = ( ! empty($mapel))? "" : " style='background: #E07171;'";
                            
                            // Jika salah satu data ada yang kosong
                            if($pertanyaan == "" or $optionA == "" or $optionB == "" or $optionC == "" or $optionD == "" or $kunci == "" or $mapel == ""){

                              $kosong++; // Tambah 1 variabel $kosong
                            }
                              echo "<tr>";
                              echo "<td>".$noUrut."</td>";
                              echo "<td".$pertanyaan_td.">".$pertanyaan."</td>";
                              echo "<td".$optionA_td.">".$optionA."</td>";
                              echo "<td".$optionB_td.">".$optionB."</td>";
                              echo "<td".$optionC_td.">".$optionC."</td>";
                              echo "<td".$optionD_td.">".$optionD."</td>";
                              echo "<td".$kunci_td.">".$kunci."</td>";
                              echo "<td".$mapel_td.">".$mapel."</td>";
                              echo "</tr>";
                           }
                          $numrow++;
                          $noUrut++;
                        }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <?php 
                    if($kosong > 0){    
                    ?>        
                    <script>      
                      $(document).ready(function(){        
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong        
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');                
                        $("#kosong").show(); // Munculkan alert validasi kosong      
                      });      
                    </script>    
                    <?php    
                    }else{ // Jika semua data sudah diisi        
                    // Buat sebuah tombol untuk mengimport data ke database      
                    echo "<a href='".base_url("G_quiz/inputQuiz")."' class='btn btn-secondary'>Cancel</a>";      
                    echo "<input type='submit' class='btn btn-primary' value='Upload Data' style='margin-left:8px;'> ";
                        
                  }
               ?>
                           
            </div>
          </div>

          </form>

          <?php 
            }
           ?>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/v_footer'); ?>
<script type="text/javascript">
// Material Select Initialization

$('.select2').select2();

$('#nip').inputmask();
$('#tglLahir').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
$('[data-mask]').inputmask();

var table = null;
var no = 1;
$(document).ready(function() {


  $('#nama_kls').text(localStorage.getItem('nama_kls'));
  $('#kode_quiz').val(localStorage.getItem('kode_quiz'));


});




</script>
