<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_g_quiz extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function slcQuiz($kodeMapel){
    $sql = "SELECT * FROM quiz WHERE kode_mapel='$kodeMapel'";
    return $this->db->query($sql)->result();
  }

  function updateSta($i, $kodeMapel, $kodeKls, $kodeQuiz){
    $sql = "UPDATE quiz SET status=$i WHERE kode_mapel='$kodeMapel' AND kode_kls='$kodeKls' AND kode_quiz='$kodeQuiz'";
    return $this->db->query($sql);
  }

  function cekCodeQuiz($code){
    $sql = "SELECT * FROM quiz WHERE kode_quiz='$code'";
    return $this->db->query($sql)->num_rows();
  }

  function cekCodeSoal($code){
    $sql = "SELECT * FROM banksoal WHERE kode_soal='$code'";
    return $this->db->query($sql)->num_rows();
  }

  function loadQuiz($idKls, $kodeMapel){
    $sql = "SELECT * FROM quiz WHERE kode_mapel='$kodeMapel' AND kode_kls='$idKls'";
    return $this->db->query($sql)->result();
  }

  function insertQuiz($data){
    return $this->db->insert('quiz', $data);
  }

  function insertSoal($data){
    return $this->db->insert('banksoal', $data);
  }

  function insertSoalQuiz($data){
    return $this->db->insert('quiz_has_soal', $data);
  }

  function slcBankSoal($kode_quiz){
    $sql = "SELECT banksoal.kode_soal, banksoal.soal, banksoal.sa, banksoal.sb, banksoal.sc, banksoal.sd, banksoal.kategori, banksoal.kunci, quiz_has_soal.kode_quiz, banksoal.nama_mapel FROM banksoal LEFT JOIN quiz_has_soal ON banksoal.kode_soal=quiz_has_soal.kode_soal AND quiz_has_soal.kode_quiz='$kode_quiz'";
    return $this->db->query($sql)->result();
  }

  function slcDataSoal($kode_kls, $kode_quiz){
    $sql = "SELECT * FROM quiz_has_soal JOIN banksoal JOIN quiz WHERE quiz_has_soal.kode_quiz=quiz.kode_quiz AND quiz_has_soal.kode_soal=banksoal.kode_soal AND quiz_has_soal.kode_quiz='$kode_quiz' AND quiz.kode_kls='$kode_kls'";
    return $this->db->query($sql)->result();
  }

  function hapusSoal($kode_quiz, $kode_soal){
    return $this->db->delete('quiz_has_soal', array('kode_quiz' => $kode_quiz, 'kode_soal' => $kode_soal));
  }

  function insertTambahSoal($data){
    return $this->db->insert('quiz_has_soal', $data);
  }

  function cek_kls($idKls){
    $sql = "SELECT * FROM kelas WHERE kode_kls='$idKls'";
    return $this->db->query($sql)->num_rows();
  }


  //---------------------- Upload Exel --------------------------
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }    // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple_banksoal($data){
    $this->db->insert_batch('banksoal', $data);
  }

  public function insert_multiple_soal($data){
    $this->db->insert_batch('quiz_has_soal', $data);
  }


}
