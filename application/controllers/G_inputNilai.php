<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_inputNilai extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_g_inputNilai');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('guru/inputNilai/v_slcKlsNilai');
  }

  function slcKls(){
    $kodeGuru = $this->session->userdata('kode_guru');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $dataKls = $this->M_g_inputNilai->loadKls($kodeGuru, $kodeMapel);
    $data['dataKls'] = $dataKls;
    $data['id'] = $kodeGuru;
    echo json_encode($data);
  }

  function slcMurid(){
    $codeGuru = $this->input->get('id');
    $dataMurid = $this->M_g_inputNilai->loadMurid($codeGuru);
    $data['dataMurid'] = $dataMurid;
    echo json_encode($data);
  }

  function inputNilai(){
    $this->load->view('guru/inputNilai/v_inputNilai');
  }

  function slcMuridNilai(){
    $idKls = $this->input->get('idKls');
    $kodeGuru = $this->session->userdata('kode_guru');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $dataMurid = $this->M_g_inputNilai->loadMuridNilai($kodeGuru, $kodeMapel, $idKls);
    $data['dataMuridNilai'] = $dataMurid;
    echo json_encode($data);
  }

  function inputUts(){
    $nilai = $this->input->post('nilai');
    $idKls = $this->input->post('idKls');
    $kodeMurid = $this->input->post('codeMurid');
    $kodeGuru = $this->session->userdata('kode_guru');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $uas = $this->db->get_where('nilai',['username' => $username])->row_array();

    $dataMurid = $this->M_g_inputNilai->uts($kodeGuru, $kodeMapel, $idKls);

  }

}
