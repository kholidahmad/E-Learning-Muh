<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_murid extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_g_murid');
    //Codeigniter : Write Less Do More
    $this->load->model('M_g_murid');
    $id = $this->session->userdata('code');
    $slcKodeGuru = $this->M_g_murid->kodeGuru($id);
    $codeGuru = $slcKodeGuru['kode_guru'];
    $codeMapel = $slcKodeGuru['kode_mapel'];
    $userCode = $slcKodeGuru['user_code'];
    if ($id == null or $id == '') {
      redirect('Auth');
    }else {
      if ($codeGuru == null or $codeGuru == '') {
        redirect('Auth');
      }else {
        if ($id == $userCode) {
          $kode_guru = $this->session->userdata('kode_guru');
          if ($kode_guru == null or $kode_guru == '') {
            redirect('Auth');
          }else {
            true;
          }
        }else {
          redirect('Auth');
        }
      }
    }

  }

  function index()
  {
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/murid/v_murid', $data);
  }

  function slcKls(){
    $kodeGuru = $this->session->userdata('kode_guru');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $dataKls = $this->M_g_murid->loadKls($kodeGuru, $kodeMapel);
    $data['dataKls'] = $dataKls;
    $data['id'] = $kodeGuru;
    echo json_encode($data);
  }

  function slcMurid(){
    $codeKls = $this->input->get('id');
    $dataMurid = $this->M_g_murid->loadMurid($codeKls);
    $data['dataMurid'] = $dataMurid;
    echo json_encode($data);
  }

}
