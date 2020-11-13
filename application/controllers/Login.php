<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('v_login');
  }

  public function cek_login(){
		//method yang akan memvalidasi apakah sedang dalam keadaan log in atau tidak
		return false;
	}


	Public function salah_login_action($username){
		//method yang akan dipanggil apabila user memasukkan username/password yang salah
    //logic : dipanggil saat user salah memasukkan username/password.
		//username, tgl, ip, dan user agent dicatat dengan FLAG=0.

		$tgl = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		//memasukkan data ke tb_admin_log dengan flag STAT = 0.
		$save = $this->db->prepare("INSERT INTO tb_admin_log VALUES (NULL, ?, '', '', ?, ?, ?, 0)");
		$save->execute(array(
			$tgl, $username, $ip, $useragent
		));
		return true;
	}


	public function cek_salah_login($limit=5){
		//method untuk menangkal BRUTE FORCE.
		//Apabila user terdeteksi salah login sebanyak $limit kali, maka user tidak boleh login lagi
		return true;
	}


	public function true_login($username, $expired){
		//method yang akan dipanggil apabila user memasukkan username dan password yang benar
		return true;
	}

	public function logout(){
		//method yang akan dipanggil apabila user logout dari sistem
		return true;
	}

	public function login_redir(){
		//method yang akan selalu dipanggil di seluruh halaman non index dan non login,
		//untuk mengecek apabila user tidak memiliki akses langsung diredirect ke halaman login
		if(!$this->cek_login())
			header("location:index.php");
	}

}
