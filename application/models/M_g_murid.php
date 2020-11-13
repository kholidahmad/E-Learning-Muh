<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_g_murid extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function kodeGuru($code){
    $sql = "SELECT kode_guru, kode_mapel, user_code FROM guru WHERE user_code='$code'";
    return $this->db->query($sql)->row_array();
  }

  function loadKls($codeGuru, $codeMapel){
    $sql = "SELECT kelas.kode_kls, kelas.nama_kls, (SELECT COUNT(kode_murid) FROM murid WHERE kode_kls=kelas_has_guru.kode_kls) total FROM kelas_has_guru JOIN kelas WHERE kelas_has_guru.kode_kls=kelas.kode_kls AND kelas_has_guru.kode_guru='$codeGuru' ORDER BY nama_kls";
    return $this->db->query($sql)->result();
  }

  function loadMurid($id){
    $sql = "SELECT * FROM murid WHERE kode_kls='$id'";
    return $this->db->query($sql)->result();
  }

}
