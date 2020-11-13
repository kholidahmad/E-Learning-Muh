<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_a_mapel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function cekCodeMapel($code){
    $sql = "SELECT * FROM mapel WHERE kode_mapel='$code'";
    return $this->db->query($sql)->num_rows();
  }

  function tambahMapel($data){
    return $this->db->insert('mapel', $data);
  }

  function loadDataMapel(){
    $sql = "SELECT * FROM mapel";
    return $this->db->query($sql)->result();
  }
  
  function selectGuruMapel($code){
    $sql = "SELECT * FROM guru WHERE kode_mapel='$code'";
    return $this->db->query($sql)->result();
  }

  function selectDataGuruTmb(){
    $sql = "SELECT * FROM guru WHERE kode_mapel is null";
    return $this->db->query($sql)->result();
  }

  function updateGuru($val, $codeMapel){
    $sql = "UPDATE guru SET kode_mapel='$codeMapel' WHERE kode_guru=$val";
    return $this->db->query($sql);
  }

  function delUpdateGuru($code){
    $sql = "UPDATE guru SET kode_mapel=null WHERE kode_guru='$code'";
    return $this->db->query($sql);

  }

  // ------------------------ insert nilai di tambah mapel ----------------
  function selectMuridMapel(){
    $sql = "SELECT COUNT(*) FROM murid";
    return $this->db->query($sql);
  }

  function selectMurid(){
    $sql = "SELECT kode_murid FROM murid";
    return $this->db->query($sql)->result();
  }

  function insertNilai($data){
    return $this->db->insert('nilai', $data);
  }

  function hapusMapel($code){
    return $this->db->delete('mapel', array('kode_mapel' => $code));
  }


}
