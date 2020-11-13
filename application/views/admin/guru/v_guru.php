<?php $this->load->view('admin/v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="modal fade tmbGuruModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label>NIP (Optional)</label>
                  <input type="text" id="nip" class="form-control" data-inputmask='"mask": "9999999999"' data-mask>
                </div>

                <div class="form-group">
                  <label>Nama Guru</label>
                  <input type="text" id="nama" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir (Optional)</label>
                  <input type="text" class="form-control" id="tglLahir" id="tglLahir">
                </div>


                <!-- <div class="field">
                      <label>Gender</label>
                      <select class="form-control select2" style="width: 100%;" ng-model="user.gender">
                        <option ng-selected="selected">Laki - Laki</option>
                        <option>Perempuan</option>
                      </select>
                  </div> -->

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" id="jk" style="width: 100%; height: 100%">
                    <option selected="selected" value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">
                  <label>Alamat (Optional)</label>
                  <textarea rows="4" name="alamat" placeholder="Alamat" id="alamat" class="form-control"> </textarea>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="Username akan diacak" disabled>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="text" id="password" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btnSaveGuru">Save Data</button>
          </div>

        </form>

      </div>
    </div>
  </div>





  <div class="modal fade tmbGuruModalExel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?php echo base_url('A_guru/form') ?>" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="nama_materi">Upload Data Exel</label>
              <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" />
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" name="preview" value="Save Data">
          </div>

        </form>

      </div>
    </div>
  </div>


  <!---========================================== Edit Modal ---------------------------------->
  <div class="modal fade editGuruModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" id="enip" class="form-control" data-inputmask='"mask": "9999999999"' data-mask required>
                </div>

                <div class="form-group">
                  <label>Nama Guru</label>
                  <input type="text" id="enama" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" id="etglLahir" required>
                </div>


                <!-- <div class="field">
                      <label>Gender</label>
                      <select class="form-control select2" style="width: 100%;" ng-model="user.gender">
                        <option ng-selected="selected">Laki - Laki</option>
                        <option>Perempuan</option>
                      </select>
                  </div> -->

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" id="ejk" style="width: 100%; height: 100%">
                    <option selected="selected" value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea rows="4" name="alamat" placeholder="Alamat" id="ealamat" class="form-control" required> </textarea>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" id="eusername" disabled>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="text" id="epassword" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btnSaveGuru">Save Data</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!-- Page Heading -->


  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">

      <h1 class="h3 mb-2 text-gray-800">Guru</h1>
      <br>
      <div class="ui right aligned grid">
        <div class="">

          <button type="button" class="btn btn-sm btn-primary mb-2" id="tmbGuru" name="button" data-toggle="modal" data-target=".tmbGuruModal"><i class="fas fa-user-plus"></i> Tambah Guru</button>

          <button type="button" class="btn btn-sm btn-primary mb-2" id="tmbGuruExel" name="button" data-toggle="modal" data-target=".tmbGuruModalExel"><i class="fas fa-file-excel"></i> Tambah Guru dengan Excel</button>

          <a class="btn btn-primary btn-sm" href="<?= base_url('A_guru/aksiDownloadTemplate/') ?>"><i class="fas fa-file-download"></i> Download Template file</a>

        </div>
      </div>

      <?php if ($this->session->flashdata('message_name')) { ?>
        <div class="card bg-success text-white shadow">
          <div class="card-body">
            <?php echo $this->session->flashdata('message_name'); ?>
          </div>
        </div>
        <br>
      <?php } ?>


      <!-- DataTales Example -->
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
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Tgl Lahir</th>
                  <th>Aksi</th>

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

<?php $this->load->view('admin/v_footer'); ?>
<script type="text/javascript">
  // Material Select Initialization

  $('.select2').select2();

  $('#nip').inputmask();
  $('#tglLahir').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
  });
  $('[data-mask]').inputmask();

  var table = null;
  var no = 1;
  $(document).ready(function() {

    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });

    $.ajax({
      url: 'http://localhost/e_rapot/index.php/Menu/loadMenu',
      method: 'GET',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      success: function(data) {
        console.log(data.menu);
        table_menu = '';
        $.each(data.menu, function(idx, obj) {
          table_menu += '<li class="nav-item">';
          table_menu += '<a class="nav-link" href="' + obj.nama_ctrl + '">';
          table_menu += obj.ikon;
          table_menu += '<span>' + obj.nama + '</span></a>';
          table_menu += '</li>';
        });
        $("#loadMenu").html(table_menu);

      },
      error: function(errorThrown) {
        console.log(errorThrown);
      }
    });


    $.ajax({
      url: 'http://localhost/e_rapot/A_guru/first_read',
      method: 'GET',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      data: {},
      success: function(data) {
        console.log(data.pwdGuru);
        $('#password').val(data.pwdGuru);
      },
      error: function(errorThrown) {
        console.log(errorThrown);
      }
    });




    tabel = $('#example1').DataTable({

      "ajax": {
        "dataSrc": "dataGuru",
        "url": "http://localhost/e_rapot/A_guru/loadGuru", // URL file untuk proses select datanya
        "type": "GET"
      },

      // "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
      "columns": [{
          "render": function(data, type, row) { // Tampilkan kolom aksi
            var html = no++;
            return html
          }
        },
        {
          "data": "nip"
        }, // Tampilkan nis
        {
          "data": "nama"
        }, // Tampilkan nama
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
        {
          "data": "tgl"
        }, // Tampilkan telepon
        // Tampilkan alamat
        {
          "render": function(data, type, row) { // Tampilkan kolom aksi


            html = '<button class="btn btn-outline-danger btn-sm" onClick="aksiHapus(\'' + row.kode_guru + '\' , \'' + row.nama + '\')"> Hapus <i class="fas fa-trash" style="font-size: 20px; margin-top: 5px"></i> </button> ';

            return html
          }
        },
      ],
    });
  });


  $("#btnSaveGuru").click(function(e) {
    e.preventDefault()
    var nip = $("#nip").val();
    var nama = $("#nama").val();
    var tgl = $("#tglLahir").val();
    var jk = $("#jk").val();
    var alamat = $("#alamat").val();
    var password = $("#password").val();

    $.ajax({
      url: 'http://localhost/e_rapot/A_guru/tmbGuru',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      data: {
        nip: nip,
        nama: nama,
        tgl: tgl,
        jk: jk,
        alamat: alamat,
        password: password
      },
      success: function(data) {
        Swal.fire({
          position: 'top',
          type: 'success',
          title: 'Data berhasil ditambahkan',
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(function() {
          window.location.href = "<?php echo base_url('A_guru'); ?>";
        }, 1500);
      },
      error: function(errorThrown) {
        console.log(errorThrown);
      }
    });

  });

  function aksiHapus(data, nama) {
    var id = data;
    var namaGuru = nama;
    Swal.fire({
      title: 'Are you sure?',
      text: "Apakah kamu ingin menghapus Guru " + namaGuru + "!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "http://localhost/e_rapot/A_guru/deleteGuru",
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          contentType: 'application/x-www-form-urlencoded',
          success: function(data) {
            Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
            setTimeout(function() {
              window.location.href = "<?php echo base_url('A_guru'); ?>";
            }, 1100);

          },
          error: function(errorThrown) {
            console.log(errorThrown);

          }

        });

      }
    });
    // var id = data;
    //  swal({
    //   title: "Are you sure?",
    //   text: "You will not be able to recover this imaginary file!",
    //   type: "warning",
    //   showCancelButton: true,
    //   confirmButtonClass: "btn-danger",
    //   confirmButtonText: "Yes, delete it!",
    //   cancelButtonText: "No, cancel plx!",
    //   closeOnConfirm: false,
    //   closeOnCancel: false
    // },
    // function(isConfirm) {
    //   if (isConfirm) {
    //     $.ajax({
    //        url: 'http://localhost/e_rapot/A_guru/deleteGuru',
    //        type: 'POST',
    //        data: {id : id},
    //        error: function(data) {
    //          alert('Something is wrong');
    //        },
    //        success: function(data) {
    //          swal("Deleted!", "Your imaginary file has been deleted.", "success");
    //          window.location.href = "<?php echo base_url('A_guru/guru'); ?>";
    //        }
    //     });
    //   } else {
    //     swal("Cancelled", "Your imaginary file is safe :)", "error");
    //   }
    //
    // });
    // $.ajax({
    //   url : "http://localhost/e_rapot/A_guru/deleteGuru",
    //   method: 'DELETE',
    //   dataType: 'json',
    //   data: {id : id},
    //   contentType: 'application/x-www-form-urlencoded',
    //   success: function(data){
    //     window.location.href = "";
    //   },
    //   error: function( errorThrown ){
    //     console.log( errorThrown);
    //
    //   }
    //
    // });

  }

  function aksiEdit(id) {
    $.ajax({
      url: "http://localhost/e_rapot/A_guru/loadEditGuru",
      method: 'POST',
      dataType: 'json',
      data: {
        kode_guru: id
      },
      contentType: 'application/x-www-form-urlencoded',
      success: function(data) {
        console.log(data.dataEdit)
        console.log(data.dataEdit['nip'])
        $("#enip").val(data.dataEdit['nip']);
        $("#enama").val(data.dataEdit['nama']);
        $("#etglLahir").val(data.dataEdit['tgl']);
        $("#ejk").val(data.dataEdit['jk']);
        $("#ealamat").val(data.dataEdit['alamat']);
        $("#epassword").val(data.dataEdit['password']);
        $("#eusername").val(data.dataEdit['username']);

        $('.editGuruModal').modal({
          show: true
        });

      },
      error: function(errorThrown) {
        console.log(errorThrown);

      }

    });
  }


  $(".removeGuru").click(function() {

    var id = $(this).attr("id");
    alert(id);
    //  swal({
    //
    //   title: "Are you sure?",
    //
    //   text: "You will not be able to recover this imaginary file!",
    //
    //   type: "warning",
    //
    //   showCancelButton: true,
    //
    //   confirmButtonClass: "btn-danger",
    //
    //   confirmButtonText: "Yes, delete it!",
    //
    //   cancelButtonText: "No, cancel plx!",
    //
    //   closeOnConfirm: false,
    //
    //   closeOnCancel: false
    //
    // },
    //
    // function(isConfirm) {
    //
    //   if (isConfirm) {
    //
    //     $.ajax({
    //
    //        url: '/item-list/'+id,
    //
    //        type: 'DELETE',
    //
    //        error: function() {
    //
    //           alert('Something is wrong');
    //
    //        },
    //
    //        success: function(data) {
    //
    //             $("#"+id).remove();
    //
    //             swal("Deleted!", "Your imaginary file has been deleted.", "success");
    //
    //        }
    //
    //     });
    //
    //   } else {
    //
    //     swal("Cancelled", "Your imaginary file is safe :)", "error");
    //
    //   }
    //
    // });

  });
</script>