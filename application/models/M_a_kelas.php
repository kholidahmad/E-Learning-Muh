<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_a_kelas extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function loadDataKelas(){
    $sql = "SELECT * FROM kelas";
    return $this->db->query($sql)->result();
  }

  function cekCodeKelas($code){
    $sql = "SELECT * FROM kelas WHERE kode_kls='$code'";
    return $this->db->query($sql)->num_rows();
  }

  function tambahKelas($data){
    return $this->db->insert('kelas', $data);
  }

  function loadDataMapel($id){
    $sql = "SELECT mapel.nama_mapel, mapel.kode_mapel, guru.nama FROM mapel LEFT JOIN guru ON mapel.kode_mapel=guru.kode_mapel AND guru.kode_guru IN ('".join("','" , $id)."')";
    return $this->db->query($sql)->result();
  }

  function loadDataMapelGuru($id){
    $sql = "SELECT guru.kode_mapel, kelas_has_guru.kode_guru FROM guru JOIN kelas_has_guru WHERE guru.kode_guru=kelas_has_guru.kode_guru AND kelas_has_guru.kode_kls='$id'";
    return $this->db->query($sql)->result();
  }

  function loadDataGuru($id){
    $sql = "SELECT * FROM guru WHERE kode_kls='$id'";
    return $this->db->query($sql)->result();
  }

  function slcMuridKls($id){
    $sql = "SELECT * FROM murid WHERE kode_kls = '$id'";
    return $this->db->query($sql)->result();
  }

  function slcMurid(){
    $sql = "SELECT * FROM murid WHERE kode_kls is null";
    return $this->db->query($sql)->result();
  }

  function updateMurid($val, $codeKls){
    $sql = "UPDATE murid SET kode_kls='$codeKls' WHERE kode_murid=$val";
    return $this->db->query($sql);
  }

  function updateMuridNilai($val, $codeKls){
    $sql = "UPDATE nilai SET kode_kls='$codeKls' WHERE kode_murid=$val";
    return $this->db->query($sql);
  }
  function updateGuruMuridInNilai($codeGuru, $codeMapel, $codeKls){
    $sql = "UPDATE nilai SET kode_guru='$codeGuru' WHERE kode_mapel='$codeMapel' AND kode_kls='$codeKls'";
    return $this->db->query($sql);
  }

  function slcGuruMapel($id, $codeKls){
    $sql = "SELECT guru.kode_guru, guru.nip, guru.nama, guru.tgl, guru.jk, guru.kode_mapel, kelas_has_guru.kode_kls FROM guru LEFT JOIN kelas_has_guru ON guru.kode_guru=kelas_has_guru.kode_guru AND kelas_has_guru.kode_kls='$codeKls' WHERE guru.kode_mapel='$id'";
    return $this->db->query($sql)->result();
  }

  function slcGuruKls($codeKls){
    $sql = "SELECT guru.kode_mapel, guru.kode_guru FROM guru JOIN kelas_has_guru WHERE guru.kode_guru=kelas_has_guru.kode_guru AND kelas_has_guru.kode_kls='$codeKls'";
    return $this->db->query($sql)->result();
  }

  function updateGuruNull($idMapel, $codeKls){
    $sql = "DELETE kelas_has_guru FROM kelas_has_guru JOIN guru WHERE kelas_has_guru.kode_guru = guru.kode_guru AND guru.kode_mapel='$idMapel' AND kelas_has_guru.kode_kls='$codeKls'";
    return $this->db->query($sql);
  }

  function updateGuru($id, $codeKls){
    $sql = "INSERT INTO kelas_has_guru (kode_guru, kode_kls) VALUES ($id, '$codeKls')";
    // $sql = "UPDATE guru SET kode_kls='$codeKls' WHERE kode_guru=$id AND kode_mapel='$idMapel'";
    return $this->db->query($sql);
  }

  function selectMurid($idMapel, $idKls){
    $sql = "SELECT kode_murid FROM nilai WHERE kode_mapel='$idMapel' AND kode_kls='$idKls'";
    return $this->db->query($sql)->result();
  }

  function updateGuruNilai($codeMurid, $idGuru, $idMapel, $codeKls){
    $sql = "UPDATE nilai SET kode_guru=$idGuru WHERE kode_murid='$codeMurid' AND kode_kls='$codeKls' AND kode_mapel='$idMapel'";
    return $this->db->query($sql);
  }

  function hapusKelas($code){
    return $this->db->delete('kelas', array('kode_kls' => $code));
  }

}
