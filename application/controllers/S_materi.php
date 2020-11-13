<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_materi extends CI_Controller
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
  }

  function index()
  {
    $data['title'] = 'Materi';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/materi/v_materi');
  }

  function slcMateri()
  {
    $kodeMurid = $this->session->userdata('kode_murid');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $kodeKls = $this->session->userdata('kode_kls');
    $user = $this->db->get_where('materi', ['kode_mapel' => $kodeMapel, 'kode_kls' => $kodeKls])->result();
    $data['dataMateri'] = $user;
    echo json_encode($data);
  }

  function aksiDownload()
  {
    $nama = $this->uri->segment(3);
    force_download('fileMateri/' . $nama, NULL);
  }
}
