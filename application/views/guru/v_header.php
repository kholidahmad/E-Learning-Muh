<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-learning (SIMPON)</title>


  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?php echo base_url('assets/sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="<?php echo base_url('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link rel="stylesheet" href="<?php echo base_url('assets/Ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/iCheck/all.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />






  <script src="<?php echo base_url('assets/sbadmin/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <script src="<?php echo base_url('assets/sbadmin/js/demo/datatables-demo.js') ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/datatables.bootstrap.css'); ?>">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea'
    });
  </script>
  <link href="<?php echo base_url('assets/sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/timepicker/bootstrap-timepicker.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/TimePicki-master/css/timepicki.css') ?>" rel="stylesheet">


  <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert2/dist/sweetalert2.min.css') ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/swal-forms-master/swal-forms.css') ?>" />


  <script src="<?php echo base_url('assets/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/swal-forms-master/swal-forms.js') ?>"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="icon book"></i>
        </div>

        <img height="50" width="40" src="<?= base_url('assets/img/profil/simpon.png') ?>">
        <div class="sidebar-brand-text mx-3">SMP MUH 1 (SIMPON)</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('G_dashboard') ?>">
          <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
        <hr class="sidebar-divider">
      </li>

      <!-- Divider -->
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Utama
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('G_murid') ?>">
          <i class="fas fa-users"></i>
          <span>Murid</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('G_materi') ?>">
          <i class="fas fa-book"></i>
          <span>Materi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('G_tugas') ?>">
          <i class="fas fa-tasks"></i>
          <span>Tugas</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('G_quiz') ?>">
          <i class="fas fa-file-signature"></i>
          <span>Quiz</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Guru</span></a>
      </li> -->
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Lainnya
      </div>

      <!-- Nav Item - Pages Collapse Menu -->


      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('G_pengumuman') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pengumuman</span></a>
      </li>

      <div class="sidebar-heading">
        Logout
      </div>

      <!-- Nav Item - Tables -->

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->


            <!-- Nav Item - Messages -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/') . $user['image']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('G_user_profil/index') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="<?php echo base_url('G_user_profil/edit') ?>">
                  <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profile
                </a>
                <a class="dropdown-item" href="<?php echo base_url('G_user_profil/changePassword') ?>">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->