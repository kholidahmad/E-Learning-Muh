<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myController">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?php echo base_url('assets/sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/dist/semantic.min.css') ?>">
  <link href="<?php echo base_url('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->

<link rel="stylesheet" href="<?php echo base_url('assets/Ionicons/css/ionicons.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/iCheck/all.css'); ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.js"></script>




  <link href="<?php echo base_url('assets/sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" ng-submit="Display()">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" ng-model="username" id="username" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" ng-model="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" id="btnLogin" value="Login"/>

                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/sbadmin/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="<?php echo base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/semantic/dist/semantic.min.js') ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/sbadmin/js/sb-admin-2.min.js') ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/sbadmin/vendor/chart.js/Chart.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/sbadmin/js/demo/chart-area-demo.js') ?>"></script>
  <script src="<?php echo base_url('assets/sbadmin/js/demo/chart-pie-demo.js') ?>"></script>

  <script src="<?php echo base_url('assets/sbadmin/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/sbadmin/js/demo/datatables-demo.js') ?>"></script>

  <script src="<?php echo base_url('assets/input-mask/jquery.inputmask.js') ?>"></script>
  <script src="<?php echo base_url('assets/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
  <script src="<?php echo base_url('assets/input-mask/jquery.inputmask.extensions.js') ?>"></script>



  <script src="<?php echo base_url('assets/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/iCheck/icheck.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>


  </body>

  </html>
  <script type="text/javascript">

  $("#btnLogin").click(function(e){
    e.preventDefault()
    var username = $("#username").val();
    var password = $("#password").val();


    $.ajax({
      url : 'http://localhost/e_rapot/',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      data: {username : username, password : password},
      success: function(data){
        localStorage.setItem('token', data.token);
        // var url = "" + data.lvlUsr;
        // var form = $('<form action="' + url + '" method="POST">' + '<input type="hidden" name="token" value="' + data.token + '" /> </form>').appendTo($(document.body)).submit();

      },
      error: function( errorThrown ){
        console.log(errorThrown);
      }
    });
  });


  </script>
