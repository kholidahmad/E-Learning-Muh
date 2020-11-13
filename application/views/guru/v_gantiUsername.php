<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('G_user_profil/changeUsername'); ?>" method="post">
                <div class="form-group">
                    <label for="current_username">Current Username</label>
                    <input type="text" class="form-control" id="current_username" name="current_username">
                    <?= form_error('current_username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_username">New Username</label>
                    <input type="text" class="form-control" id="new_username" name="new_username">
                    <?= form_error('new_username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>

</div>