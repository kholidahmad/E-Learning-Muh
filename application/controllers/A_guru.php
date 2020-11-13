<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_guru extends CI_Controller
{
  private $filename = "import_data_guru";
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_admin');
    $this->load->helper('create_random_helper');
  }

  function index()
  {
    $this->load->view('admin/guru/v_guru');
  }

  function first_read()
  {
    $i = 0;
    while ($i == 0) {
      $pwdGuru = helper_createPwdGuru();
      $cekPwd = $this->M_admin->cekPwdGuru($pwdGuru);
      if ($cekPwd == 0) {
        $i += 1;
      } else {
        $i += 0;
      }
    }

    $id = $this->session->userdata('code');
    $slcLvl = $this->db->get_where('user', ['code' => $id])->row_array();
    if ($slcLvl) {
      $lvl = $slcLvl['lvl_usr'];
      if ($lvl) {
        $menu = $this->db->get_where('ctrl', ['lvl_usr' => $lvl])->result();
        $output['menu'] = $menu;
        $output['pwdGuru'] = $pwdGuru;
        echo json_encode($output);
      }
    }
  }

  function loadGuru()
  {
    $dataGuru = $this->M_admin->loadDataGuru();
    $output['dataGuru'] = $dataGuru;
    echo json_encode($output);
  }

  function tmbGuru()
  {
    $i = 0;
    $r = 0;
    while ($i == 0) {
      $codeUser = helper_createUserCode();
      $cekCode = $this->M_admin->cekCodeUser($codeUser);
      if ($cekCode == 0) {
        $dataUserGuru = array(
          'code' => $codeUser,
          'username' => $codeUser,
          'password' => $this->input->post('password'),
          'lvl_usr' => 'guru',
          'akses' => 1
        );

        $insertUserGuru = $this->M_admin->tambahUserGuru($dataUserGuru);
        if ($insertUserGuru) {
          while ($r == 0) {
            $codeGuru = helper_createCodeGuru();
            $cekCodeGuru = $this->M_admin->cekCodeGuru($codeGuru);
            if ($cekCodeGuru == 0) {
              $dataGuru = array(
                'kode_guru' => helper_createCodeGuru(),
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'tgl' => $this->input->post('tgl'),
                'jk' => $this->input->post('jk'),
                'alamat' => $this->input->post('alamat'),
                'user_code' => $codeUser,
                'image' => 'default.png'
              );
              $insertGuru = $this->M_admin->tambahGuru($dataGuru);
              if ($insertGuru) {
                $this->session->set_flashdata('pesanTmbGuru', 'Data berhasil ditambahkan');
                $output['msg'] = 'success';
                echo json_encode($output);
                $r += 1;
              }
            } else {
              $r += 0;
            }
          }
        }

        $i += 1;
      } else {
        $i += 0;
      }
    }
  }

  function deleteGuru()
  {
    $code = $this->input->post('id');
    $del = $this->M_admin->hapusGuru($code);
    if ($del) {
      $output['msg'] = 'success';
      echo json_encode($output);
    }
  }

  function loadEditGuru()
  {
    $kode_guru = $this->input->post('kode_guru');
    $data_guru = $this->M_admin->slcEditGuru($kode_guru);
    $data['dataEdit'] = $data_guru;
    echo json_encode($data);
  }

  function aksiDownloadTemplate()
  {
    force_download('formatTemplate/formatGuru.xlsx', NULL);
  }



  //---------------------------------- Upload Excel -----------------

  public function form()
  {
    $data = array();
    // Buat variabel $data sebagai array
    if (isset($_POST['preview'])) {
      // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->M_admin->upload_file($this->filename);
      if ($upload['result'] == "success") { // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH . 'PHPExcel/PHPExcel.php';
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudah di upload sebelumnya
        $data['sheet'] = $sheet;
      } else { // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    $this->load->view('admin/guru/v_previewExcel', $data);
  }



  public function import()
  {
    // Load plugin PHPExcel nya
    include APPPATH . 'PHPExcel/PHPExcel.php';
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $dataUsers = array();
    $data = array();
    $numrow = 1;
    foreach ($sheet as $row) {
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 1) {
        // Kita push (add) array data ke variabel data
        $i = 0;
        while ($i == 0) {
          $codeUser = helper_createUserCode();
          $cekCode = $this->M_admin->cekCodeUser($codeUser);
          if ($cekCode == 0) {
            $pwdGuru = helper_createPwdGuru();
            $cekPwd = $this->M_admin->cekPwdGuru($pwdGuru);
            if ($cekPwd == 0) {
              array_push($dataUsers, array(
                'code' => $codeUser,
                'username' => $codeUser, // Insert data nis dari kolom A di excel
                'password' => $pwdGuru, // Insert data nama dari kolom B di excel
                'lvl_usr' => 'guru', // Insert data jenis kelamin dari kolom C di excel
                'akses' => 1,
              ));
              $codeGuru = helper_createCodeGuru();
              $cekCodeGuru = $this->M_admin->cekCodeGuru($codeGuru);
              if ($cekCodeGuru == 0) {
                array_push($data, array(
                  'kode_guru' => $codeGuru,
                  'nama' => $row['A'],
                  'jk' => $row['B'], // Insert data jenis kelamin dari kolom C di excel
                  'user_code' => $codeUser,
                  'image' => 'default.png'
                ));
                $i += 1;
              } else
                $i += 0;
            } else {
              $i += 0;
            }
          } else {
            $i += 0;
          }
        }
        // array_push($data, array(
        //   'nis'=>$row['A'], // Insert data nis dari kolom A di excel
        //   'nama'=>$row['B'], // Insert data nama dari kolom B di excel
        //   'jk'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
        // ));
      }
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->M_admin->insert_multiple_user($dataUsers);
    $this->M_admin->insert_multiple($data);
    $this->session->set_flashdata('message_name', 'Data Berhasil ditambahkan');
    redirect("A_guru"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
}
