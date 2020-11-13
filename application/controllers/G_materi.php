<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_materi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->model('M_g_materi');
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
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/materi/v_slcKls', $data);

  }

  function aksiDownload(){
    $nama = $this->uri->segment(3);
    force_download('fileMateri/'.$nama, NULL);
  }

  function inputMateri(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/materi/v_materi', $data);
  }

  function slcMateri(){
    $kodeMapel = $this->session->userdata('kode_mapel');
    $idKls = $this->input->get('idKls');
    $dataMateri = $this->M_g_materi->loadMateri($kodeMapel, $idKls);
    $data['dataMateri'] = $dataMateri;
    echo json_encode($data);
  }

  function slcKls(){
    $kodeGuru = $this->session->userdata('kode_guru');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $dataKls = $this->M_g_materi->loadKls($kodeGuru, $kodeMapel);
    $data['dataKls'] = $dataKls;
    $data['id'] = $kodeGuru;
    echo json_encode($data);
  }

  function saveFoto($upload){
    $data = array(
      'nama_materi' => $this->input->post('namaMateri'),
      'nama_file' => $upload['upload_data']['file_name'],
      'ukuran_file' => $upload['upload_data']['file_size'],
      'tipe_file' => $upload['upload_data']['file_type'],
      'kode_mapel' => $this->session->userdata('kode_mapel'),
      'kode_kls' => $this->input->post('idKls')
    );
    $id = $this->session->userdata('id');
    $this->M_g_materi->uploadFileMateri($data);
  }

  function aksiUploadMateri(){
    $config['upload_path']          = './fileMateri/';
    $config['allowed_types']        = 'pdf|doc|docx|ppt';
    $config['max_size']             = 50000;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('fileMateri'))
    {
            $this->session->set_flashdata('message',  $this->upload->display_errors());

            redirect('G_materi/inputMateri');
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());
            $this->saveFoto($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi berhasil ditambahkan</div>');
            redirect('G_materi/inputMateri');
    }
  }

  function hpsMtr(){
    $id = $this->input->post('id');
    $this->db->delete('materi', array('id' => $id));
    $output['msg'] = 'success';
    echo json_encode($output);
  }

}
