<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class G_nilai extends CI_Controller {

	public function index()
	{
		$this->load->view('guru/inputNilai/v_inputNilai');		
	}

}

/* End of file G_nilai.php */
/* Location: ./application/controllers/G_nilai.php */