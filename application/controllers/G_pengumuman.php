<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_pengumuman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('guru/pengumuman/v_slcKls', $data);
  }
  function tmbPng(){
    date_default_timezone_set("Asia/Jakarta");
    $isi = $this->input->post('isi');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $codeKLs = $this->input->post('codeKls');
    $tgl = date("d/m/Y");
    $wkt = date("H:i A");

    $dataPng = array('isi' => $isi,
                    'kode_kls' => $codeKLs,
                    'kode_mapel' => $kodeMapel,
                    'tgl' => $tgl,
                    'jm' => $wkt);
    $this->db->insert('pengumuman', $dataPng);
    $output['msg'] = 'success';
    echo json_encode($output);
  }

  function inputPng(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('guru/pengumuman/v_pengumuman', $data);
  }

  function loadPng(){
    $codeKls = $this->input->get('codeKls');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $sql = "SELECT * FROM pengumuman WHERE kode_kls='$codeKls' AND kode_mapel='$kodeMapel' ORDER BY id DESC";
    $dataLoad = $this->db->query($sql)->result();
    $output['msg'] = 'success';
    $output['dataLoad'] = $dataLoad;
    echo json_encode($output);
  }

  function hpsPng(){
    $id = $this->input->post('id');
    $this->db->delete('pengumuman', array('id' => $id));
    $output['msg'] = 'success';
    echo json_encode($output);
  }

}
