<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function loadDataGuru(){
    $sql = "SELECT * FROM guru";
    return $this->db->query($sql)->result();
  }

  function cekPwdGuru($pwd){
    $sql = "SELECT * FROM user WHERE password='$pwd' AND lvl_usr='guru'";
    return $this->db->query($sql)->num_rows();
  }

  function cekCodeGuru($code){
    $sql = "SELECT * FROM guru WHERE kode_guru='$code'";
    return $this->db->query($sql)->num_rows();
  }

  function cekCodeUser($code){
    $sql = "SELECT * FROM user WHERE code='$code' AND lvl_usr='guru'";
    return $this->db->query($sql)->num_rows();
  }

  function tambahUserGuru($data){
    return $this->db->insert('user', $data);
  }

  function tambahGuru($data){
    return $this->db->insert('guru', $data);
  }

  function hapusGuru($code){
    return $this->db->delete('guru', array('kode_guru' => $code));
  }

  function slcEditGuru($kode_guru){
    $sql = "SELECT * FROM guru JOIN user WHERE guru.user_code=user.code AND guru.kode_guru='$kode_guru'";
    return $this->db->query($sql)->row_array();
  }


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
    $this->db->insert_batch('guru', $data);
  }

  public function insert_multiple_user($data){
    $this->db->insert_batch('user', $data);
  }

}
