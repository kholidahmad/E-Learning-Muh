<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_a_murid extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function loadDataMurid(){
    $sql = "SELECT * FROM murid";
    return $this->db->query($sql)->result();
  }

  function cekPwdMurid($pwd){
    $sql = "SELECT * FROM user WHERE password='$pwd' AND lvl_usr='murid'";
    return $this->db->query($sql)->num_rows();
  }

  // ------------------------ Tmb Murid ------------------------
  function cekCodeMurid($code){
    $sql = "SELECT * FROM murid WHERE kode_murid='$code'";
    return $this->db->query($sql)->num_rows();
  }

  function cekCodeUser($code){
    $sql = "SELECT * FROM user WHERE code='$code' AND lvl_usr='murid'";
    return $this->db->query($sql)->num_rows();
  }

  function tambahUserMurid($data){
    return $this->db->insert('user', $data);
  }

  function tambahMurid($data){
    return $this->db->insert('murid', $data);
  }

  function hapusMurid($code){
    return $this->db->delete('murid', array('kode_murid' => $code));
  }

  // --------------- end ---------------------------------------

  function selectCountMapel(){
    $sql = "SELECT COUNT(*) FROM mapel";
    return $this->db->query($sql);
  }

  function selectMapel(){
    $sql = "SELECT kode_mapel FROM mapel";
    return $this->db->query($sql)->result();
  }

  function insertNilai($data){
    return $this->db->insert('nilai', $data);
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
  public function insert_multiple($data){
    $this->db->insert_batch('murid', $data);
  }

  public function insert_multiple_user($data){
    $this->db->insert_batch('user', $data);
  }

}
