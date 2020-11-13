<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_quiz extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_s_quiz');
    date_default_timezone_set("Asia/Jakarta");
    $slQuiz = $this->M_s_quiz->slcQuiz();
    foreach ($slQuiz as $val) {
      $finish = substr($val->tgl_finish, 6, 10) . substr($val->tgl_finish, 3, 2) . substr($val->tgl_finish, 0, 2) . date("Hi", strtotime($val->time_finish));
      $wktSkr = date("Ymd") . date("Hi", strtotime(date("H:i")));
      if ($finish >= $wktSkr) {
        $i = 1;
        $this->M_s_quiz->updateSta($i, $val->kode_quiz);
      } else {
        $i = 0;
        $this->M_s_quiz->updateSta($i, $val->kode_quiz);
      }
    }


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
          $kode_mapel = $this->session->userdata('kode_mapel');
          if ($kode_mapel) {
            true;
          } else {
            redirect('S_mapel');
          }
        } else {
          redirect('Auth');
        }
      }
    }
  }

  function index()
  {
    $data['title'] = 'Quiz';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/quiz/v_slcQuiz');
  }

  function slcQuiz()
  {
    $data['title'] = 'Quiz';
    $kode_mapel = $this->session->userdata('kode_mapel');
    $kode_kls = $this->session->userdata('kode_kls');
    $dataQuiz = $this->M_s_quiz->loadQuiz($kode_mapel, $kode_kls);
    $data['dataQuiz'] = $dataQuiz;
    echo json_encode($data);

  }

  function kerjakanQuiz()
  {
    $data['title'] = 'Quiz';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/quiz/v_kerjakan');
  }

  function loadSoalMurid()
  {
    $kode_quiz = $this->input->get('kode_quiz');
    $cekKodeQuiz = $this->M_s_quiz->cekKodeQuiz($kode_quiz);
    if ($cekKodeQuiz) {
      $kode_murid = $this->session->userdata('kode_murid');
      $cekKerjakan = $this->M_s_quiz->cekKerjakan($kode_quiz, $kode_murid);
      if ($cekKerjakan) {
        $data['cekKode'] = 'y';
        $data['cekKerjakan'] = 'y';
        echo json_encode($data);
      } else {
        $data['cekKode'] = 'y';
        $data['cekKerjakan'] = 't';
        $dataQuiz = $this->M_s_quiz->loadSoalQuiz($kode_quiz);
        $data['dataQuiz'] = $dataQuiz;
        echo json_encode($data);
      }
    } else {
      $data['cekKode'] = 't';
      $data['cekKerjakan'] = 't';
      echo json_encode($data);
    }
  }

  function kirimJwb()
  {
    $kode_quiz = $this->input->post('kode_quiz');
    $kode_murid = $this->session->userdata('kode_murid');
    $pilGan = $this->input->post('pilGan');
    $essay = $this->input->post('the_essay');
    $dataPilGan = explode("|", $pilGan);
    $dataEssay = explode("|", $essay);

    $ambilKodeSoal = $this->M_s_quiz->getSoal($kode_quiz);
    foreach ($ambilKodeSoal as $val) {
      $dataJawaban = array(
        'kode_quiz' => $kode_quiz,
        'kode_soal' => $val->kode_soal,
        'kode_murid' => $kode_murid
      );
      $insertJwb = $this->M_s_quiz->saveKodeSoal($dataJawaban);
    }

    foreach ($dataPilGan as $val) {
      $jwbSiswa = substr($val, 10, 1);
      $kode_soal = substr($val, 0, 9);
      $kunci = $this->M_s_quiz->ambilKunci($kode_soal);
      $cek = $jwbSiswa == $kunci['kunci'];
      if ($cek) {
        $ket = 1;
        $this->M_s_quiz->saveJwb($jwbSiswa, $ket, $kode_soal, $kode_quiz, $kode_murid);
      } else {
        $ket = 0;
        $this->M_s_quiz->saveJwb($jwbSiswa, $ket, $kode_soal, $kode_quiz, $kode_murid);
      }
    }

    foreach ($dataEssay as $val) {
      $jwbSiswaEssay = substr($val, 10);
      $kode_soal = substr($val, 0, 9);
      $ket = null;
      $this->M_s_quiz->saveJwb($jwbSiswaEssay, $ket, $kode_soal, $kode_quiz, $kode_murid);
    }

    $output['status'] = 'success';
    echo json_encode($output);
  }

  function hasilQuiz()
  {
    $data['title'] = 'Hasil Quiz';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/quiz/v_hasilQuiz');
  }

  function loadHasilQuiz()
  {
    $kode_quiz = $this->input->get('kode_quiz');
    $kode_murid = $this->session->userdata('kode_murid');
    $dataJwb = $this->M_s_quiz->loadJawaban($kode_quiz, $kode_murid);
    $data['dataQuiz'] = $dataJwb;
    echo json_encode($data);
  }

  function detailHasil()
  {
    $kode_quiz = $this->input->get('kode_quiz');
    $kode_murid = $this->session->userdata('kode_murid');
    $jmlSoal = $this->M_s_quiz->getJmlSoal($kode_quiz, $kode_murid)['soal'];
    $jmlSoalBenar = $this->M_s_quiz->getSoalBenar($kode_quiz, $kode_murid)['soal'];
    $jmlSoalTdkJwb = $this->M_s_quiz->getSoalTdkJwb($kode_quiz, $kode_murid)['soal'];

    $data['jmlSoal'] = $jmlSoal;
    $data['soalBenar'] = $jmlSoalBenar;
    $data['tdkJwb'] = $jmlSoalTdkJwb;
    $data['total'] = number_format(($jmlSoalBenar / $jmlSoal) * 100, 2);

    echo json_encode($data);
  }

  function scoreQuiz()
  {
    $data['title'] = 'Nilai Quiz';
    $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
    $this->load->view('murid/v_header', $data);
    $this->load->view('murid/quiz/v_scoreNilai');
  }
}
