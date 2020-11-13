<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_tugas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_s_tugas');
    date_default_timezone_set("Asia/Jakarta");
    $slcTugas = $this->M_s_tugas->slcTugas();
    foreach ($slcTugas as $val) {
      $finish = substr($val->tgl_finish, 6, 10).substr($val->tgl_finish, 3, 2).substr($val->tgl_finish, 0, 2).date("Hi", strtotime($val->time_finish));
      $wktSkr = date("Ymd").date("Hi", strtotime(date("H:i")));
      if ($finish >= $wktSkr) {
        $i = 1;
        $this->M_s_tugas->updateSta($i, $val->kode_tugas);

      }else {
        $i = 0;
        $this->M_s_tugas->updateSta($i, $val->kode_tugas);
      }
    }



    $this->load->model('M_s_dashboard');
    $id = $this->session->userdata('code');
    $slcKodeMurid = $this->M_s_dashboard->kodeMurid($id);
    $codeMurid = $slcKodeMurid['kode_murid'];
    $kode_murid = $this->session->userdata('kode_murid');
    if ($codeMurid == null) {
      redirect('Auth');
    }else {
      if ($kode_murid == null) {
        redirect('Auth');
      }else {
        if ($codeMurid == $kode_murid) {
          $kode_mapel = $this->session->userdata('kode_mapel');
          if ($kode_mapel) {
            true;
          }else {
            redirect('S_mapel');
          }
        }else {
          redirect('Auth');
        }
      }
    }

  }

  function index()
  {
    $data['title'] = 'Tugas';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/tugas/v_slcTugas');
  }

  function loadTugas(){
    $idKls = $this->session->userdata('kode_kls');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $kode_murid = $this->session->userdata('kode_murid');
    $dataTugas = $this->M_s_tugas->loadTugas($idKls, $kodeMapel, $kode_murid);
    $data['dataTugas'] = $dataTugas;
    echo json_encode($data);
  }

  function uploadTugas(){
    $data['title'] = 'Tugas';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/tugas/v_tugas');
  }

  function loadTugasMurid(){
    $kode_tugas = $this->input->get('kode_tugas');
    $kode_murid = $this->session->userdata('kode_murid');
    $dataTugas = $this->M_s_tugas->loadTugasInUpload($kode_tugas);
    $getTugas = $this->M_s_tugas->getTugasMurid($kode_tugas, $kode_murid);
    if ($getTugas) {
      $data['getTugas'] = $getTugas;
    }else {
      $data['getTugas'] = 'null';
    }
    $data['dataTugas'] = $dataTugas;

    echo json_encode($data);
  }


  function saveTugas($upload){
    $getRev = $this->M_s_tugas->getRev($this->session->userdata('kode_murid'), $this->input->post('idTugas'))['rev'];
    $delTugas = $this->M_s_tugas->delTugas($this->session->userdata('kode_murid'), $this->input->post('idTugas'));
    if ($getRev) {
      $rev = $this->session->userdata('rev') + 1;
      $this->session->set_userdata(array('rev' => $rev));
    }else {
      $this->session->set_userdata(array('rev' => 1));
    }
    $data = array(
      'nama_tugas' => $this->input->post('namaTugas'),
      'nama_file' => $upload['upload_data']['file_name'],
      'ukuran_file' => $upload['upload_data']['file_size'],
      'tipe_file' => $upload['upload_data']['file_type'],
      'kode_murid' => $this->session->userdata('kode_murid'),
      'kode_tugas' => $this->input->post('idTugas'),
      'rev' => $this->session->userdata('rev')
    );
    $id = $this->session->userdata('id');
    $this->M_s_tugas->uploadFileTugas($data);
  }

  function aksiUploadTugas(){
    $config['upload_path']          = './fileTugas/';
    $config['allowed_types']        = 'pdf|doc|docx|ppt';
    $config['max_size']             = 50000;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('fileTugas'))
    {
            $this->session->set_flashdata('message',  $this->upload->display_errors());

            redirect('S_tugas/uploadTugas');
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());
            $this->saveTugas($data);
            redirect('S_tugas/uploadTugas');
    }

  }

  function aksiDownload(){
    $nama = $this->uri->segment(3);
    force_download('fileTugas/'.$nama, NULL);
  }


}
