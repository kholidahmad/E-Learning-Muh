<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Guru</h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4 pt-3 pb-3">
                <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nama: <b><?= $user['nama']; ?></b></h5>
                    <hr>
                    <h5 class="card-title">Kode Guru: <b><?= $user['kode_guru']; ?></b></h5>
                    <hr>
                    <h5 class="card-title">NIP: <b> <?= $user['nip']; ?></b></h5>
                    <hr>
                    <h5 class="card-title">Tgl Lahir: <b><?= $user['tgl']; ?></b></h5>
                    <hr>
                    <h5 class="card-title">Jenis Kelamin: <b><?= $user['jk']; ?></b></h5>
                    <hr>
                    <h5 class="card-title">Alamat: <b><?= $user['alamat']; ?></b></h5>
                    <hr>
                </div>
            </div>
        </div>
    </div>



    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

<?php $this->load->view('guru/v_footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: 'http://localhost/e_rapot/index.php/Menu/loadMenu',
            method: 'GET',
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            success: function(data) {
                console.log(data.menu);
                $("#slcMapel").html(table);
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }
        });

    });
</script>