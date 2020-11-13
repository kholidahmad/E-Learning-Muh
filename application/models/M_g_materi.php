<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_g_materi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function loadKls($codeGuru, $codeMapel){
    $sql = "SELECT kelas.kode_kls, kelas.nama_kls, (SELECT COUNT(kode_murid) FROM murid WHERE kode_kls=kelas_has_guru.kode_kls) total FROM kelas_has_guru JOIN kelas WHERE kelas_has_guru.kode_kls=kelas.kode_kls AND kelas_has_guru.kode_guru='$codeGuru' ORDER BY nama_kls";
    return $this->db->query($sql)->result();
  }

  function loadMateri($kodeMapel, $idKls){
    $sql = "SELECT * FROM materi WHERE kode_mapel='$kodeMapel' AND kode_kls='$idKls'";
    return $this->db->query($sql)->result();
  }

  function uploadFileMateri($data){
    return $this->db->insert('materi', $data);
  }

}
