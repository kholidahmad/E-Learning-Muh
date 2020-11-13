<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_s_tugas extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function slcTugas(){
    $sql = "SELECT * FROM tugas";
    return $this->db->query($sql)->result();
  }

  function updateSta($i, $kode_tugas){
    $sql = "UPDATE tugas SET status=$i WHERE kode_tugas='$kode_tugas'";
    return $this->db->query($sql);
  }

  function loadTugas($idKls, $kodeMapel, $kode_murid){
    $sql = "SELECT tugas.nama_tugas, tugas.kode_tugas, tugas.deskripsi, tugas.tgl_finish, tugas.time_finish, tugas.status FROM tugas WHERE tugas.kode_mapel='$kodeMapel' AND tugas.kode_kls='$idKls'";
    return $this->db->query($sql)->result();
  }

  function loadTugasInUpload($idTugas){
    $sql = "SELECT * FROM tugas WHERE kode_tugas='$idTugas'";
    return $this->db->query($sql)->result();
  }

  function uploadFileTugas($data){
    return $this->db->insert('upload_tugas', $data);
  }

  function getTugasMurid($kode_tugas, $kode_murid){
    $sql = "SELECT * FROM upload_tugas WHERE kode_tugas='$kode_tugas' AND kode_murid='$kode_murid'";
    return $this->db->query($sql)->result();
  }

  function getRev($kode_murid, $kode_tugas){
    $sql = "SELECT rev FROM upload_tugas WHERE kode_tugas='$kode_tugas' AND kode_murid='$kode_murid'";
    return $this->db->query($sql)->row_array();
  }

  function delTugas($kode_murid, $kode_tugas){
    return $this->db->delete('upload_tugas', array('kode_tugas' => $kode_tugas, 'kode_murid' => $kode_murid));
  }

}
