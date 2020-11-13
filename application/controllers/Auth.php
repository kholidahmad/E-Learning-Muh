<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('session');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
        $data['title'] = 'Login Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    } else {
        // validasinya success
        $this->_login();
    }
  }

  private function _login()
  {
  	$username = $this->input->post('username');
  	$password = $this->input->post('password');

  	$user = $this->db->get_where('user',['username' => $username])->row_array();

  	//jika user ada
  	if($user){
  		//cek password
  		if($password==$user['password'])
  		{
  			$dataUser = array(
  				'username' => $user['username'],
  				'lvl_usr' => $user['lvl_usr'],
          		'code' => $user['code']
  			);
        	$user_code = $user['code'];
  			$this->session->set_userdata($dataUser);
        if ($user['lvl_usr']=='guru') {
          $sqlMapel = "SELECT * FROM guru JOIN mapel WHERE guru.kode_mapel=mapel.kode_mapel AND guru.user_code='$user_code'";
          $nama_mapel = $this->db->query($sqlMapel)->row_array();          
          $this->session->set_userdata(array(
			  'nama_mapel' => $nama_mapel['nama_mapel']));
		  redirect('G_dashboard');
		}
        else if($user['lvl_usr']=='murid'){
  				redirect('S_mapel');
  			}else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidac sesuai!</div>');
          redirect('auth');
  			}
  		}else{
  			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidac sesuai!</div>');
        redirect('auth');
  		}
  	}else{
  		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidac sesuai!</div>');
        redirect('auth');
  	}
    // if($data) {
    //   redirect('a_guru');
    //   exit;
    // }
  }

    public function logout()
    {
      $this->session->sess_destroy();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil Logout</div>');
      redirect('auth');
    }

	public function registration()
  {
  	$data['title'] = 'Create Account';
  	$this->load->view('templates/auth_header', $data);
    $this->load->view('auth/registration');
    $this->load->view('templates/auth_footer');
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


	public function login_redir(){
		//method yang akan selalu dipanggil di seluruh halaman non index dan non login,
		//untuk mengecek apabila user tidak memiliki akses langsung diredirect ke halaman login
		if(!$this->cek_login())
			header("location:index.php");
	}

}
