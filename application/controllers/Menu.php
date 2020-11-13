<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
  function loadMenu(){
    $id = $this->session->userdata('code');
    $slcLvl = $this->db->get_where('user',['code' => $id])->row_array();
    if ($slcLvl) {
      $lvl = $slcLvl['lvl_usr'];
      if ($lvl) {
        $menu = $this->db->get_where('ctrl',['lvl_usr' => $lvl])->result();
        $data['menu'] = $menu;
        echo json_encode($data);
      }
    }
  }

}
