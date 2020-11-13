<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_g_inputNilai extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function loadMurid($id){
    $sql = "SELECT * FROM murid JOIN nilai WHERE murid.kode_murid=nilai.kode_murid AND nilai.kode_kls='$id'";
    return $this->db->query($sql)->result();
  }

  function loadKls($codeGuru, $codeMapel){
    $sql = "SELECT kelas.kode_kls, kelas.nama_kls, (SELECT COUNT(kode_murid) FROM murid WHERE kode_kls=kelas_has_guru.kode_kls) total FROM kelas_has_guru JOIN kelas WHERE kelas_has_guru.kode_kls=kelas.kode_kls AND kelas_has_guru.kode_guru='$codeGuru' ORDER BY nama_kls";
    return $this->db->query($sql)->result();
  }
  function loadMuridNilai($kodeGuru, $kodeMapel, $idKls){
    $sql = "SELECT * FROM nilai JOIN murid WHERE nilai.kode_murid=murid.kode_murid AND nilai.kode_guru='$kodeGuru' AND nilai.kode_mapel='$kodeMapel' AND nilai.kode_kls='$idKls'";
    return $this->db->query($sql)->result();
  }

}
