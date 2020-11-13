<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_user_profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        $this->load->model('M_s_dashboard');
        $id = $this->session->userdata('code');
        $slcKodeMurid = $this->M_s_dashboard->kodeMurid($id);
        $codeMurid = $slcKodeMurid['kode_murid'];
        $codekls = $slcKodeMurid['kode_kls'];
        $kode_murid = $slcKodeMurid['kode_murid'];
        if ($id == null or $id == '') {
            // redirect('Auth');

        } else {
            if ($codeMurid == null or $codeMurid == '') {
                // redirect('Auth');

            } else {
                if ($kode_murid) {
                    $this->session->set_userdata('kode_murid', $codeMurid);
                    $this->session->set_userdata('kode_kls', $codekls);
                } else {
                    redirect('Auth');
                    // echo 'id != usercode';
                }
            }
        }
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
        $this->load->view('murid/v_header', $data);
        $this->load->view('murid/v_profil', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('murid/v_header', $data);
            $this->load->view('murid/v_editProfil', $data);
            $this->load->view('murid/v_footer');
        } else {

            $kodeMurid = $this->input->post('kode_murid');
            $nis = $this->input->post('nis');
            $nama = $this->input->post('name');
            $tgl = $this->input->post('tgl');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');

            // cek jika ada gambar yang akan diupload
            // cek documentation CI > File Uploading Class > setting preferences
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profil/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profil/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nis', $nis);
            $this->db->set('nama', $nama);
            $this->db->set('tgl', $tgl);
            $this->db->set('jk', $jk);
            $this->db->set('alamat', $alamat);
            $this->db->where('kode_murid', $kodeMurid);
            $this->db->update('murid');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda berhasil diupdated <i class="far fa-check-circle"></i></div>');
            redirect('S_user_profil');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
        $data['pswd'] = $this->db->get_where('user', ['code' => $this->session->userdata('code')])->row_array();


        $this->form_validation->set_rules('current_username', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('murid/v_header', $data);
            $this->load->view('murid/v_gantiPass', $data);
            $this->load->view('murid/v_footer');
        } else {
            $current_username = $this->input->post('current_username');
            $new_username = $this->input->post('new_username');
            if ($current_username != $data['pswd']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Current password salah!</div>');
                redirect('S_user_profil/changePassword');
            } else {
                if ($current_username == $new_username) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan Password lama!</div>');
                    redirect('S_user_profil/changePassword');
                } else {
                    // password sudah ok
                    $this->db->set('password', $new_username);
                    $this->db->where('code', $this->session->userdata('code'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil diubah <i class="far fa-check-circle"></i></div>');
                    redirect('S_user_profil/changePassword');
                }
            }
        }
    }

    public function changeUsername()
    {
        $data['title'] = 'Change Username';
        $data['user'] = $this->db->get_where('murid', ['user_code' => $this->session->userdata('code')])->row_array();
        $data['un'] = $this->db->get_where('user', ['code' => $this->session->userdata('code')])->row_array();

        $this->form_validation->set_rules('current_username', 'Current Username', 'required|trim');
        $this->form_validation->set_rules('new_username', 'New Username', 'required|alpha_numeric');


        if ($this->form_validation->run() == false) {
            $this->load->view('murid/v_header', $data);
            $this->load->view('murid/v_gantiUsername', $data);
            $this->load->view('murid/v_footer');
        } else {
            $current_username = $this->input->post('current_username');
            $new_username = $this->input->post('new_username');
            if ($current_username != $data['un']['username']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Current username salah!</div>');
                redirect('S_user_profil/changeUsername');
            } else {
                if ($current_username == $new_username) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username baru tidak boleh sama dengan Username lama!</div>');
                    redirect('S_user_profil/changeUsername');
                } else {
                    // password sudah ok
                    $this->db->set('username', $new_username);
                    $this->db->where('code', $this->session->userdata('code'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Username Berhasil diubah <i class="far fa-check-circle"></i></div>');
                    redirect('S_user_profil/changeUsername');
                }
            }
        }
    }
}
