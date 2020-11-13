<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_g_tugas extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function cekCodeTugas($code){
    $sql = "SELECT * FROM tugas WHERE kode_tugas='$code'";
    return $this->db->query($sql)->num_rows();
  }

  function slcTugas($kodeMapel){
    $sql = "SELECT * FROM tugas WHERE kode_mapel='$kodeMapel'";
    return $this->db->query($sql)->result();
  }

  function inputTgs($data){
    return $this->db->insert('tugas', $data);
  }

  function loadTugas($idKls, $kodeMapel){
    $sql = "SELECT * FROM tugas WHERE kode_mapel='$kodeMapel' AND kode_kls='$idKls'";
    return $this->db->query($sql)->result();
  }

  function updateSta($i, $kodeMapel, $kodeKls, $kodeTugas){
    $sql = "UPDATE tugas SET status=$i WHERE kode_mapel='$kodeMapel' AND kode_kls='$kodeKls' AND kode_tugas='$kodeTugas'";
    return $this->db->query($sql);
  }

  function loadTugasInUpload($idTugas){
    $sql = "SELECT * FROM tugas WHERE kode_tugas='$idTugas'";
    return $this->db->query($sql)->result();
  }

  function loadUploadMurid($kode_tugas, $codeKls){
    $sql = "SELECT * FROM murid LEFT JOIN upload_tugas ON upload_tugas.kode_murid=murid.kode_murid AND upload_tugas.kode_tugas='$kode_tugas' WHERE murid.kode_kls='$codeKls'";
    return $this->db->query($sql)->result();
  }

  function countMurid($codeKls){
    $sql = "SELECT COUNT(kode_murid) AS jmlMurid FROM murid WHERE kode_kls='$codeKls'";
    return $this->db->query($sql)->row_array();
  }

  function countUpload($kode_tugas){
    $sql = "SELECT COUNT(id) AS jmlUpload FROM upload_tugas WHERE kode_tugas='$kode_tugas'";
    return $this->db->query($sql)->row_array();

  }

}
