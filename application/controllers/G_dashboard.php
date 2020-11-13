<?php
defined('BASEPATH') or exit('No direct script access allowed');

class G_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_g_murid');
    $id = $this->session->userdata('code');
    $slcKodeGuru = $this->M_g_murid->kodeGuru($id);
    $codeGuru = $slcKodeGuru['kode_guru'];
    $codeMapel = $slcKodeGuru['kode_mapel'];
    $userCode = $slcKodeGuru['user_code'];
    if ($id == null or $id == '') {
      redirect('Auth');
    } else {
      if ($codeGuru == null or $codeGuru == '') {
        redirect('Auth');
      } else {
        if ($id == $userCode) {
          $this->session->set_userdata('kode_guru', $codeGuru);
          $this->session->set_userdata('kode_mapel', $codeMapel);
        } else {
          redirect('Auth');
        }
      }
    }
  }

  function index()
  {
    $kode_guru = $this->session->userdata('kode_guru');
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();

    $sqlMateri = "SELECT COUNT(materi.id) AS jmlMateri FROM materi JOIN kelas_has_guru WHERE materi.kode_kls=kelas_has_guru.kode_kls AND kelas_has_guru.kode_guru='$kode_guru'";
    $data['jmlMateri'] = $this->db->query($sqlMateri)->row_array()['jmlMateri'];

    $sqlTugas = "SELECT COUNT(tugas.kode_tugas) AS jmlTugas FROM tugas JOIN kelas_has_guru WHERE tugas.kode_kls=kelas_has_guru.kode_kls AND kelas_has_guru.kode_guru='$kode_guru'";
    $data['jmlTugas'] = $this->db->query($sqlTugas)->row_array()['jmlTugas'];

    $sqlQuiz = "SELECT COUNT(quiz.kode_quiz) AS jmlQuiz FROM quiz JOIN kelas_has_guru WHERE quiz.kode_kls=kelas_has_guru.kode_kls AND kelas_has_guru.kode_guru='$kode_guru'";
    $data['jmlQuiz'] = $this->db->query($sqlQuiz)->row_array()['jmlQuiz'];

    $sqlSlcTugas = "SELECT * FROM tugas JOIN kelas_has_guru JOIN kelas WHERE tugas.kode_kls=kelas_has_guru.kode_kls AND kelas_has_guru.kode_kls=kelas.kode_kls AND kelas_has_guru.kode_guru='$kode_guru' AND tugas.status=1";
    $data['slcTugas'] = $this->db->query($sqlSlcTugas)->result();

    $sqlSlcQuiz = "SELECT * FROM quiz JOIN kelas_has_guru JOIN kelas WHERE quiz.kode_kls=kelas_has_guru.kode_kls AND kelas_has_guru.kode_kls=kelas.kode_kls AND kelas_has_guru.kode_guru='$kode_guru' AND quiz.status=1";
    $data['slcQuiz'] = $this->db->query($sqlSlcQuiz)->result();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');

    $this->load->view('guru/v_dashboard', $data);
  }

  function loadData()
  {
  }
}
