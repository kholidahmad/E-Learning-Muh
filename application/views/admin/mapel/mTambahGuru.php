<?php $this->load->view('v_header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12">

      <h1 class="h3 mb-2 text-gray-800">Mata Pelajaran</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Mata Pelajaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Mapel</th>
                      <th>Jumlah Guru</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Mengampu</th>
                      <th>Aksi</th>

                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>

                      <td><button class="ui compact icon button" onClick="tmbGuru('qwe123')"> <i class="book icon"></i> </button>
                        <button class="ui compact icon button"> <i class="edit icon"></i> </button>
                      <button class="ui compact icon button"> <i class="ban icon"></i> </button>
                      <button class="ui compact icon button"> <i class="trash icon"></i> </button>
                      </td>

                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>

                      <td><button class="ui compact icon button"> <i class="plus icon"></i> </button>
                        <button class="ui compact icon button"> <i class="edit icon"></i> </button>
                      <button class="ui compact icon button"> <i class="ban icon"></i> </button>
                      <button class="ui compact icon button"> <i class="trash icon"></i> </button>
                      </td>

                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>

                      <td><button class="ui compact icon button"> <i class="plus icon"></i> </button>
                        <button class="ui compact icon button"> <i class="edit icon"></i> </button>
                      <button class="ui compact icon button"> <i class="ban icon"></i> </button>
                      <button class="ui compact icon button"> <i class="trash icon"></i> </button>
                      </td>

                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('v_footer'); ?>
<script type="text/javascript">

$('#nip').inputmask();
$('#tglLahir').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
$('.ui.dropdown').dropdown();


function tmbGuru(id){
  var id = id;
  window.location.replace('<?php echo base_url() ?>');
}


var myApp = angular.module('myApp', []);
myApp.controller('myController', function($scope, $http){
  $scope.nipModel = "2323";

  $http.get('http://localhost/restServer/index.php/rest/coba')
	.then(function (response){
		$scope.jsondata = response.data;
		console.log("status:" + response.status);
    console.log(response.data);
	}).catch(function(response) {
	  console.error('Error occurred:', response.status, response.data);
	});
});

</script>
