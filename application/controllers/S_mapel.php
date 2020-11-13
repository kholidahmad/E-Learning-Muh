<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_mapel extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_s_dashboard');
    $id = $this->session->userdata('code');
    $slcKodeMurid = $this->M_s_dashboard->kodeMurid($id);
    $codeMurid = $slcKodeMurid['kode_murid'];
    $codekls = $slcKodeMurid['kode_kls'];
    $kode_murid = $slcKodeMurid['kode_murid'];
    if ($id == null or $id == '') {
      // redirect('Auth');

    } else {
      if ($codeMurid == null or $codeMurid == '') {
        // redirect('Auth');

      } else {
        if ($kode_murid) {
          $this->session->set_userdata('kode_murid', $codeMurid);
          $this->session->set_userdata('kode_kls', $codekls);
        } else {
          redirect('Auth');
          // echo 'id != usercode';
        }
      }
    }
    // $kode_mapel = $this->input->get('kode');
    // if ($kode_mapel) {
    //   $this->session->set_userdata('kode_mapel', $kode_mapel);
    // }else {
    //   redirect('S_mapel');
    // }


    // $kode_murid = $this->session->userdata('code');
    // if ($codeMurid == $kode_murid) {
    //   $kode_mapel = $this->session->userdata('kode_mapel');
    //   if ($kode_mapel) {
    //     true;
    //   }else {
    //     redirect('S_mapel');
    //   }
    // }else {
    //   redirect('Auth');
    // }
  }

  function index()
  {
    $data['title'] = 'Mapel Siswa';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/mapel/v_mapel', $data);
  }
}
