<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_s_quiz extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function slcQuiz(){
    $sql = "SELECT * FROM quiz";
    return $this->db->query($sql)->result();
  }

  function updateSta($i, $kode_quiz){
    $sql = "UPDATE quiz SET status=$i WHERE kode_quiz='$kode_quiz'";
    return $this->db->query($sql);
  }

  function loadQuiz($kode_mapel, $kode_kls){
    $sql = "SELECT * FROM quiz WHERE kode_mapel='$kode_mapel' AND kode_kls='$kode_kls'";
    return $this->db->query($sql)->result();
  }

  function loadSoalQuiz($kode_quiz){
    $sql = "SELECT banksoal.kode_soal, banksoal.soal, banksoal.sa, banksoal.sb, banksoal.sc, banksoal.sd, banksoal.kategori, banksoal.kunci FROM quiz_has_soal JOIN banksoal WHERE quiz_has_soal.kode_soal=banksoal.kode_soal AND quiz_has_soal.kode_quiz='$kode_quiz'";
    return $this->db->query($sql)->result();
  }

  function ambilKunci($kode_soal){
    $sql = "SELECT kunci FROM banksoal WHERE kode_soal='$kode_soal'";
    return $this->db->query($sql)->row_array();
  }

  function saveKodeSoal($data){
    return $this->db->insert('jwbsiswa', $data);
  }

  function saveJwb($jwbSiswa, $ket, $kode_soal, $kode_quiz, $kode_murid){
    $sql = "UPDATE jwbsiswa SET jawaban='$jwbSiswa', ket='$ket' WHERE kode_soal='$kode_soal' AND kode_quiz='$kode_quiz' AND kode_murid='$kode_murid'";
    return $this->db->query($sql);
  }

  function getSoal($kode_quiz){
    $sql = "SELECT banksoal.kode_soal FROM quiz_has_soal JOIN banksoal WHERE quiz_has_soal.kode_soal=banksoal.kode_soal AND quiz_has_soal.kode_quiz='$kode_quiz'";
    return $this->db->query($sql)->result();
  }

  function loadJawaban($kode_quiz, $kode_murid){
    $sql = "SELECT banksoal.kode_soal, banksoal.soal, banksoal.sa, banksoal.sb, banksoal.sc, banksoal.sd, banksoal.kategori, banksoal.kunci, jwbsiswa.jawaban, jwbsiswa.ket FROM jwbsiswa JOIN banksoal WHERE jwbsiswa.kode_soal=banksoal.kode_soal AND jwbsiswa.kode_quiz='$kode_quiz' AND jwbsiswa.kode_murid='$kode_murid'";
    return $this->db->query($sql)->result();
  }

  function getJmlSoal($kode_quiz, $kode_murid){
    $sql = "SELECT COUNT(kode_soal) AS soal FROM jwbsiswa WHERE kode_quiz='$kode_quiz' AND kode_murid='$kode_murid'";
    return $this->db->query($sql)->row_array();
  }

  function getSoalBenar($kode_quiz, $kode_murid){
    $sql = "SELECT COUNT(kode_soal) AS soal FROM jwbsiswa WHERE kode_quiz='$kode_quiz' AND kode_murid='$kode_murid' AND ket=1";
    return $this->db->query($sql)->row_array();
  }

  function getSoalTdkJwb($kode_quiz, $kode_murid){
    $sql = "SELECT COUNT(kode_soal) AS soal FROM jwbsiswa WHERE kode_quiz='$kode_quiz' AND kode_murid='$kode_murid' AND ket IS NULL";
    return $this->db->query($sql)->row_array();
  }


  function cekKodeQuiz($kode_quiz){
    $sql = "SELECT * FROM quiz WHERE kode_quiz='$kode_quiz'";
    return $this->db->query($sql)->row_array();
  }

  function cekKerjakan($kode_quiz, $kode_murid){
    $sql = "SELECT * FROM jwbsiswa WHERE kode_quiz='$kode_quiz' AND kode_murid='$kode_murid'";
    return $this->db->query($sql)->row_array();
  }

}
