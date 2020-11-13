<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_tugas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_g_tugas');
    $this->load->helper('create_random_helper');

    date_default_timezone_set("Asia/Jakarta");
    $kodeMapel = $this->session->userdata('kode_mapel');
    $slcTugas = $this->M_g_tugas->slcTugas($kodeMapel);
    foreach ($slcTugas as $val) {
      $finish = substr($val->tgl_finish, 6, 10).substr($val->tgl_finish, 3, 2).substr($val->tgl_finish, 0, 2).date("Hi", strtotime($val->time_finish));
      $wktSkr = date("Ymd").date("Hi", strtotime(date("H:i")));
      if ($finish >= $wktSkr) {
        $i = 1;
        $this->M_g_tugas->updateSta($i, $val->kode_mapel, $val->kode_kls, $val->kode_tugas);

      }else {
        $i = 0;
        $this->M_g_tugas->updateSta($i, $val->kode_mapel, $val->kode_kls, $val->kode_tugas);
      }
    }

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
    $this->load->view('guru/tugas/v_slcKls', $data);

  }

  function inputTugas(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/tugas/v_tugas', $data);
  }

  function tmbTugas(){
    $nama_tugas = $this->input->post('nama_tugas');
    $deskripsi = $this->input->post('deskripsi');
    $tglFinish = $this->input->post('tglFinish');
    $timeFinish = $this->input->post('timeFinish');
    $idKls = $this->input->post('idKls');

    $i = 0;
    while ($i == 0) {
      $kode_tugas = helper_createCodeTugas();
      $cek_kode = $this->M_g_tugas->cekCodeTugas($kode_tugas);
      if ($cek_kode == 0) {
        $data = array('kode_tugas' => $kode_tugas,
                      'nama_tugas' => $nama_tugas,
                      'deskripsi' => $deskripsi,
                      'tgl_finish' => $tglFinish,
                      'time_finish' => $timeFinish,
                      'kode_mapel' => $this->session->userdata('kode_mapel'),
                      'kode_kls' => $idKls);
        $insertTugas = $this->M_g_tugas->inputTgs($data);
        if ($insertTugas) {
          $output['msg'] = 'success';
          echo json_encode($output);
          $i += 1;
        }else {
          $i += 0;
        }
      }else {
        $i += 0;
      }
    }
  }

  function slcTugas(){
    $idKls = $this->input->get('idKls');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $dataTugas = $this->M_g_tugas->loadTugas($idKls, $kodeMapel);
    $data['dataTugas'] = $dataTugas;
    echo json_encode($data);

  }

  function slcUploadTugas(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/tugas/v_uploadTugas', $data);
  }

  function loadTugas(){
    $kode_tugas = $this->input->get('kode_tugas');
    $codeKls = $this->input->get('codeKls');
    $dataTugas = $this->M_g_tugas->loadTugasInUpload($kode_tugas);

    $cMurid = $this->M_g_tugas->countMurid($codeKls)['jmlMurid'];
    $cUpload = $this->M_g_tugas->countUpload($kode_tugas)['jmlUpload'];
    $blmUpload = $cMurid - $cUpload;

    $data['dataTugas'] = $dataTugas;
    $data['cMurid'] = $cMurid;
    $data['cUpload'] = $cUpload;
    $data['cBlm'] = $blmUpload;
    echo json_encode($data);
  }

  function dataUpload(){
    $kode_tugas = $this->input->get('kode_tugas');
    $codeKls = $this->input->get('codeKls');
    $dataTugas = $this->M_g_tugas->loadUploadMurid($kode_tugas, $codeKls);
    $data['dataUploadTugas'] = $dataTugas;
    echo json_encode($data);
  }

  function hpsTgs(){
    $id = $this->input->post('id');
    $this->db->delete('tugas', array('kode_tugas' => $id));
    $output['msg'] = 'success';
    echo json_encode($output);
  }

  function loadEditTugas(){
    $kode_tugas = $this->input->post('kode_tugas');
    $dataTugas = $this->db->get_where('tugas',['kode_tugas' => $kode_tugas])->row_array();
    $data['dataEdit'] = $dataTugas;
    echo json_encode($data);
  }

  function editTugas(){
    $nama_tugas = $this->input->post('nama_tugas');
    $deskripsi = $this->input->post('deskripsi');
    $tglFinish = $this->input->post('tglFinish');
    $timeFinish = $this->input->post('timeFinish');
    $kode_tugas = $this->input->post('kode_tugas');
    
    $data = array(
        'nama_tugas' => $nama_tugas,
        'deskripsi' => $deskripsi,
        'tgl_finish' => $tglFinish,
        'time_finish' => $timeFinish
      );
    $this->db->where('kode_tugas', $kode_tugas);
    $this->db->update('tugas', $data);
    $output['msg'] = 'success';
    echo json_encode($output);
  }

  function aksiDownload(){
    $nama = $this->uri->segment(3);
    force_download('fileTugas/'.$nama, NULL);
  }

}
