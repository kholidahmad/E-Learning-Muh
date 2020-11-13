<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_dataUsr extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('admin/v_dataUser');
  }

  function loadDataUsr(){
    $codeKls = $this->input->get('codeKls');
    $sqlMurid = "SELECT * FROM user JOIN murid JOIN kelas WHERE user.code=murid.user_code AND murid.kode_kls=kelas.kode_kls AND user.lvl_usr='murid'";
    $sqlGuru = "SELECT * FROM user JOIN guru JOIN mapel WHERE user.code=guru.user_code AND guru.kode_mapel=mapel.kode_mapel AND user.lvl_usr='guru'";
    $output['msg'] = 'success';
    $output['dataUsrMurid'] = $this->db->query($sqlMurid)->result();
    $output['dataUsrGuru'] = $this->db->query($sqlGuru)->result();
    echo json_encode($output);
  }

}
