<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_s_dashboard extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function kodeMurid($code){
    $sql = "SELECT kode_murid, kode_kls FROM murid WHERE user_code='$code'";
    return $this->db->query($sql)->row_array();
  }

  function getUserCode($id){
    $sql = "SELECT code FROM user WHERE code='$id'";
    return $this->db->query($sql)->row_array();
  }

}
