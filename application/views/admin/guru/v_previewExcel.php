<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">




  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">

      <h1 class="h3 mb-2 text-gray-800">Guru</h1>
<br>
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

          <form method="post" action="<?php echo base_url('A_guru/import') ?>">
           
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
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
                          $nama = $row['A']; // Ambil data nama
                          $jenis_kelamin = $row['B']; // Ambil data jenis kelamin
                          if($nama == "" && $jenis_kelamin == ""){
                            continue;
                          }
                          if($numrow > 1){
                            // Validasi apakah semua data telah diisi
                            $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                            $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                            
                            // Jika salah satu data ada yang kosong
                            if($nama == "" or $jenis_kelamin == ""){
                              $kosong++; // Tambah 1 variabel $kosong
                            }
                              echo "<tr>";
                              echo "<td>".$noUrut."</td>";
                              echo "<td".$nama_td.">".$nama."</td>";
                              echo "<td".$jk_td.">".$jenis_kelamin."</td>";
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
                    echo "<a href='".base_url("A_guru")."' class='btn btn-secondary'>Cancel</a>";      
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





});




</script>
