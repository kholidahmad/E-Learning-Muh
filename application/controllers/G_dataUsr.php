<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_dataUsr extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('guru/dataUsr/v_slcKls');
  }

  function dataUsr(){
    $this->load->view('guru/dataUsr/v_dataUsr');
  }

  function loadDataUsr(){
    $codeKls = $this->input->get('codeKls');
    $sql = "SELECT * FROM user JOIN murid WHERE user.code=murid.user_code AND murid.kode_kls='$codeKls'";
    $output['msg'] = 'success';
    $output['dataUsr'] = $this->db->query($sql)->result();
    echo json_encode($output);
  }

}
