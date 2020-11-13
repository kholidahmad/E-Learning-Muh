<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
  function Dashboard(){
    $this->load->view('admin/v_dashboard');
  }

  function mapel(){
    $this->load->view('admin/mapel/v_mapel');
  }

  function guru(){
    $this->load->view('admin/guru/v_guru');
  }

  function murid(){
    $this->load->view('admin/murid/v_murid');
  }

  function tmbMurid(){
    $this->load->view('admin/guru/v_gTmbMurid');
  }

  function pengumuman(){
    $this->load->view('admin/pengumuman/v_pengumuman');
  }

  function pesan(){
    $this->load->view('admin/pesan/v_pesan');
  }

  function inbox(){
    $this->load->view('admin/pesan/v_inbox');
  }

}
