<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_quiz extends CI_Controller{
  private $filename = "import_data_soal";
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_g_quiz');
    $this->load->helper('create_random_helper');
    $this->load->model('M_g_murid');
    $this->load->model('M_s_quiz');


    date_default_timezone_set("Asia/Jakarta");
    $kodeMapel = $this->session->userdata('kode_mapel');
    $slcQuiz = $this->M_g_quiz->slcQuiz($kodeMapel);
    foreach ($slcQuiz as $val) {
      $finish = substr($val->tgl_finish, 6, 10).substr($val->tgl_finish, 3, 2).substr($val->tgl_finish, 0, 2).date("Hi", strtotime($val->time_finish));
      $wktSkr = date("Ymd").date("Hi", strtotime(date("H:i")));
      if ($finish >= $wktSkr) {
        $i = 1;
        $this->M_g_quiz->updateSta($i, $val->kode_mapel, $val->kode_kls, $val->kode_quiz);

      }else {
        $i = 0;
        $this->M_g_quiz->updateSta($i, $val->kode_mapel, $val->kode_kls, $val->kode_quiz);
      }
    }


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
    $this->load->view('guru/quiz/v_slcKls', $data);
  }

  function slcKls(){

  }

  function inputQuiz(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/quiz/v_inputQuiz', $data);
  }

  function slcQuiz(){
    $idKls = $this->input->get('idKls');
    $kodeMapel = $this->session->userdata('kode_mapel');
    $dataQuiz = $this->M_g_quiz->loadQuiz($idKls, $kodeMapel);
    $data['dataQuiz'] = $dataQuiz;
    echo json_encode($data);
  }

  function tmbQuiz(){
    $nama_quiz = $this->input->post('nama_quiz');
    $tglFinish = $this->input->post('tglFinish');
    $timeFinish = $this->input->post('timeFinish');
    $idKls = $this->input->post('idKls');

    $i = 0;
    while ($i == 0) {
      $kode_quiz = helper_createCodeQuiz();
      $cek_kode = $this->M_g_quiz->cekCodeQuiz($kode_quiz);
      if ($cek_kode == 0) {
        $data = array('kode_quiz' => $kode_quiz,
                      'nama_quiz' => $nama_quiz,
                      'tgl_finish' => $tglFinish,
                      'time_finish' => $timeFinish,
                      'kode_mapel' => $this->session->userdata('kode_mapel'),
                      'kode_kls' => $idKls);
        $insertQuiz = $this->M_g_quiz->insertQuiz($data);
        if ($insertQuiz) {
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

  function soalQuiz(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/quiz/v_soal', $data);
  }

  function loadBankSoal(){
    $kode_quiz = $this->input->get('kode_quiz');
    $dataSoal = $this->M_g_quiz->slcBankSoal($kode_quiz);
    $data['dataSoal'] = $dataSoal;
    echo json_encode($data);
  }

  function loadSoalQuiz(){
    $kode_kls = $this->input->get('idKls');
    $kode_quiz = $this->input->get('idQuiz');
    $dataSoal = $this->M_g_quiz->slcDataSoal($kode_kls, $kode_quiz);
    $data['dataSoal'] = $dataSoal;
    echo json_encode($data);
  }

  function tmbSoal(){
    $kode_quiz = $this->input->post('idQuiz');
    $soal = $this->input->post('soal');
    $sa = $this->input->post('sa');
    $sb = $this->input->post('sb');
    $sc = $this->input->post('sc');
    $sd = $this->input->post('sd');
    $kunci = $this->input->post('kunci');

    $i = 0;
    while ($i == 0) {
      $kode_soal = helper_createCodeSoal();
      $cek_kode = $this->M_g_quiz->cekCodeSoal($kode_soal);
      $kodeMapel = $this->session->userdata('kode_mapel');
      $mapel = $this->db->get_where('mapel',['kode_mapel' => $kodeMapel])->row_array();
      if ($cek_kode == 0) {
        $data = array('kode_soal' => $kode_soal,
                      'soal' => $soal,
                      'sa' => $sa,
                      'sb' => $sb,
                      'sc' => $sc,
                      'sd' => $sd,
                      'kunci' => $kunci,
                      'kategori' => 1,
                      'nama_mapel' => $mapel['nama_mapel']);
        $insertSoal = $this->M_g_quiz->insertSoal($data);
        if ($insertSoal) {
          $dataSoalQuiz = array('kode_quiz' => $kode_quiz,
                                'kode_soal' => $kode_soal);
          $insertSoalQuiz = $this->M_g_quiz->insertSoalQuiz($dataSoalQuiz);
          if ($insertSoalQuiz) {
            $output['msg'] = 'success';
            echo json_encode($output);
            $i += 1;
          }else {

          }
        }else {
          $i += 0;
        }
      }else {
        $i += 0;
      }
    }
  }


  function tmbSoalEssay(){
    $soal = $this->input->post('soal');
    $kode_quiz = $this->input->post('idQuiz');
    $i = 0;
    while ($i == 0) {
      $kode_soal = helper_createCodeSoal();
      $cek_kode = $this->M_g_quiz->cekCodeSoal($kode_soal);
      if ($cek_kode == 0) {
        $data = array('kode_soal' => $kode_soal,
                      'soal' => $soal,
                      'kategori' => 2,
                      'kode_mapel' => $this->session->userdata('kode_mapel'));
        $insertSoal = $this->M_g_quiz->insertSoal($data);
        if ($insertSoal) {
          $dataSoalQuiz = array('kode_quiz' => $kode_quiz,
                                'kode_soal' => $kode_soal);
          $insertSoalQuiz = $this->M_g_quiz->insertSoalQuiz($dataSoalQuiz);
          if ($insertSoalQuiz) {
            $output['msg'] = 'success';
            echo json_encode($output);
            $i += 1;
          }else {

          }
        }else {
          $i += 0;
        }
      }else {
        $i += 0;
      }
    }
  }

  function deleteSoal(){
    $kode_quiz = $this->input->post('kode_quiz');
    $kode_soal = $this->input->post('kode_soal');
    $del = $this->M_g_quiz->hapusSoal($kode_quiz, $kode_soal);
    if ($del) {
      $output['msg'] = 'success';
      echo json_encode($output);
    }
  }

  function saveSoal(){
    $data = $this->input->post('kode_soal');
    $kode_quiz = $this->input->post('kode_quiz');
    if ($data) {
      foreach ($data as $val) {
        $dataSoal = array('kode_quiz' => $kode_quiz,
                          'kode_soal' => "$val");
        $this->M_g_quiz->insertTambahSoal($dataSoal);
      }
      $output['status'] = 'success';
      echo json_encode($output);
    }
  }

  //-------------- Upload soal excel --------

  public function form(){
    $data = array();
    // Buat variabel $data sebagai array
    if(isset($_POST['preview'])){
      // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->M_g_quiz->upload_file($this->filename);
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'PHPExcel/PHPExcel.php';
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/quiz/v_previewExcel', $data);
  }

  public function import(){
    $kode_quiz = $this->input->post('kode_quiz');
    // Load plugin PHPExcel nya
    include APPPATH.'PHPExcel/PHPExcel.php';
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $banksoal = array();
    $soal = array();
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        $i = 0;
        while ($i == 0) {
          $kode_soal = helper_createCodeSoal();
          $cek_kode = $this->M_g_quiz->cekCodeSoal($kode_soal);
          if ($cek_kode == 0) {
            array_push($banksoal, array(
              'kode_soal'=>$kode_soal,
              'soal'=>$row['A'], // Insert data nis dari kolom A di excel
              'sa'=>$row['B'], // Insert data nama dari kolom B di excel
              'sb'=>$row['C'],
              'sc'=>$row['D'],
              'sd'=>$row['E'],
              'kunci'=>$row['F'], // Insert data jenis kelamin dari kolom C di excel
              'kategori'=>1,
              'nama_mapel'=>$row['G'],
            ));
            array_push($soal, array(
              'kode_soal'=>$kode_soal,
              'kode_quiz'=>$kode_quiz,
            ));
            $i += 1;
          }else{
            $i += 0;
          }
        }
      }
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->M_g_quiz->insert_multiple_banksoal($banksoal);
    $this->M_g_quiz->insert_multiple_soal($soal);
    $this->session->set_flashdata('message_name', 'Data Berhasil ditambahkan');
    redirect("G_quiz/soalQuiz"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }


  function hpsQuiz(){
    $id = $this->input->post('id');
    $this->db->delete('quiz', array('kode_quiz' => $id));
    $output['msg'] = 'success';
    echo json_encode($output);
  }

  function loadEditQuiz(){
    $kode_quiz = $this->input->post('kode_quiz');
    $dataQuiz = $this->db->get_where('quiz',['kode_quiz' => $kode_quiz])->row_array();
    $data['dataEdit'] = $dataQuiz;
    echo json_encode($data);
  }

  function editQuiz(){
    $nama_quiz = $this->input->post('nama_quiz');
    $tglFinish = $this->input->post('tglFinish');
    $timeFinish = $this->input->post('timeFinish');
    $kode_quiz = $this->input->post('kode_quiz');
    
    $data = array(
        'nama_quiz' => $nama_quiz,
        'tgl_finish' => $tglFinish,
        'time_finish' => $timeFinish
      );
    $this->db->where('kode_quiz', $kode_quiz);
    $this->db->update('quiz', $data);
    $output['msg'] = 'success';
    echo json_encode($output);
  }

  function jwbSiswa(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/quiz/v_jwbSiswa', $data);
  }

  function loadJwb(){
    $kode_quiz = $this->input->post('kode_quiz');
    $kode_kls = $this->input->post('idKls');
    $sql = "SELECT * FROM murid WHERE kode_kls='$kode_kls'";
    $data['data'] = $this->db->query($sql)->result();
    echo json_encode($data);
  }

  function jwbMurid(){
    $data['user'] = $this->db->get_where('guru', ['user_code' => $this->session->userdata('code')])->row_array();
    $data['nama_mapel'] = $this->session->userdata('nama_mapel');
    $this->load->view('guru/quiz/v_hasilQuiz', $data); 
  }

  function detailHasil(){
    $kode_quiz = $this->input->get('kode_quiz');
    $kode_murid = $this->input->get('kode_murid');
    $jmlSoal = $this->M_s_quiz->getJmlSoal($kode_quiz, $kode_murid)['soal'];
    $jmlSoalBenar = $this->M_s_quiz->getSoalBenar($kode_quiz, $kode_murid)['soal'];
    $jmlSoalTdkJwb = $this->M_s_quiz->getSoalTdkJwb($kode_quiz, $kode_murid)['soal'];
    if ($jmlSoal) {
      $data['jmlSoal'] = $jmlSoal;
      $data['soalBenar'] = $jmlSoalBenar;
      $data['tdkJwb'] = $jmlSoalTdkJwb;
      $data['total'] = number_format(($jmlSoalBenar/$jmlSoal) * 100,2);
      $data['status'] = 1;
      echo json_encode($data);
    }else{
      $data['total'] = 'Belum Mengerjakan';
      $data['status'] = 0;
      echo json_encode($data);
    }
    
  }

}
