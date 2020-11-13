<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_s_dashboard');
    $id = $this->session->userdata('code');
    $slcKodeMurid = $this->M_s_dashboard->kodeMurid($id);
    $codeMurid = $slcKodeMurid['kode_murid'];
    $kode_murid = $this->session->userdata('kode_murid');
    if ($codeMurid == null) {
      redirect('Auth');
    } else {
      if ($kode_murid == null) {
        redirect('Auth');
      } else {
        if ($codeMurid == $kode_murid) {
          $kode_mapel = $this->input->get('kode');
          if ($kode_mapel) {
            $this->session->set_userdata('kode_mapel', $kode_mapel);
          } else {
            redirect('S_mapel');
          }
        } else {
          redirect('Auth');
        }
      }
    }


    // $codeKls = $slcKodeMurid['kode_kls'];
    // $this->session->set_userdata('kode_murid', $codeMurid);
    // $this->session->set_userdata('kode_kls', $codeKls);
    //Codeigniter : Write Less Do More
    // $this->load->model('M_s_dashboard');
    // $id = $this->session->userdata('code');
    // $slcKodeMurid = $this->M_s_dashboard->kodeMurid($id);
    // $codeMurid = $slcKodeMurid['kode_murid'];
    // $this->session->set_userdata('kode_murid', $codeMurid);
  }

  function index()
  {
    $kode_kls = $this->session->userdata('kode_kls');
    $kode_mapel = $this->session->userdata('kode_mapel');
    $sqlPng = "SELECT * FROM pengumuman JOIN guru WHERE pengumuman.kode_mapel=guru.kode_mapel AND pengumuman.kode_kls='$kode_kls' AND pengumuman.kode_mapel='$kode_mapel'";
    $sqlTugas = "SELECT * FROM tugas WHERE kode_mapel='$kode_mapel' AND kode_kls='$kode_kls' AND status=1";
    $sqlQuiz = "SELECT * FROM quiz WHERE kode_mapel='$kode_mapel' AND kode_kls='$kode_kls' AND status=1";
    $data['slcPng'] = $this->db->query($sqlPng)->result();
    $data['slcTugas'] = $this->db->query($sqlTugas)->result();
    $data['slcQuiz'] = $this->db->query($sqlQuiz)->result();

    $data['title'] = 'Mapel';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/v_dashboard', $data);
  }
}
