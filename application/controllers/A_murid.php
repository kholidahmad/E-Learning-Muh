<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_murid extends CI_Controller
{

  private $filename = "import_data";
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_a_murid');
    $this->load->helper('create_random_helper');
  }

  function index()
  {
    $this->load->view('admin/murid/v_murid');
  }

  function downloadTemplateSiswa()
  {
    force_download('formatTemplate/formatSiswa.xlsx', NULL);
  }

  function first_read()
  {
    $i = 0;
    while ($i == 0) {
      $pwdMurid = helper_createPwdGuru();
      $cekPwd = $this->M_a_murid->cekPwdMurid($pwdMurid);
      if ($cekPwd == 0) {
        $i += 1;
      } else {
        $i += 0;
      }
    }

    $output['pwdMurid'] = $pwdMurid;
    echo json_encode($output);
  }

  function loadMurid()
  {
    $dataMurid = $this->M_a_murid->loadDataMurid();
    $output['dataMurid'] = $dataMurid;
    echo json_encode($output);
  }

  function tmbMurid()
  {
    $i = 0;

    while ($i == 0) {
      $codeUser = helper_createUserCode();
      $cekCode = $this->M_a_murid->cekCodeUser($codeUser);
      if ($cekCode == 0) {
        $dataUserMurid = array(
          'code' => $codeUser,
          'username' => $this->input->post('nis'),
          'password' => $this->input->post('password'),
          'lvl_usr' => 'murid',
          'akses' => 1
        );

        $insertUserMurid = $this->M_a_murid->tambahUserMurid($dataUserMurid);
        if ($insertUserMurid) {
          $r = 0;
          while ($r == 0) {
            $codeMurid = helper_createCodeMurid();
            $cekCodeMurid = $this->M_a_murid->cekCodeMurid($codeMurid);
            if ($cekCodeMurid == 0) {
              $dataMurid = array(
                'kode_murid' => $codeMurid,
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'tgl' => $this->input->post('tgl'),
                'jk' => $this->input->post('jk'),
                'alamat' => $this->input->post('alamat'),
                'user_code' => $codeUser,
                'image' => 'default.png'
              );
              $insertMurid = $this->M_a_murid->tambahMurid($dataMurid);
              if ($insertMurid) {
                $countMapel = $this->M_a_murid->selectCountMapel();
                if ($countMapel == '0') {
                  $this->session->set_flashdata('pesanTmbGuru', 'Data berhasil ditambahkan');
                  $output['msg'] = 'success';
                  echo json_encode($output);
                  $r += 1;
                } else {
                  $selectMapel = $this->M_a_murid->selectMapel();
                  foreach ($selectMapel as $val) {
                    $firstNilai = array(
                      'kode_murid' => $codeMurid,
                      'kode_mapel' => $val->kode_mapel
                    );
                    $this->M_a_murid->insertNilai($firstNilai);
                  }
                  $output['msg'] = 'success';
                  echo json_encode($output);
                  $r += 1;
                }
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

  function deleteMurid()
  {
    $code = $this->input->post('id');
    $del = $this->M_a_murid->hapusMurid($code);
    if ($del) {
      $output['msg'] = 'success';
      echo json_encode($output);
    }
  }

  // ----------------------- Upload Exel ----------------------------------------------------------------------------
  public function form()
  {
    $data = array();
    // Buat variabel $data sebagai array
    if (isset($_POST['preview'])) {
      // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->M_a_murid->upload_file($this->filename);
      if ($upload['result'] == "success") { // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH . 'PHPExcel/PHPExcel.php';
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
      } else { // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    $this->load->view('admin/murid/v_previewExcel', $data);
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
          $cekCode = $this->M_a_murid->cekCodeUser($codeUser);
          if ($cekCode == 0) {
            $pwdMurid = helper_createPwdGuru();
            $cekPwd = $this->M_a_murid->cekPwdMurid($pwdMurid);
            if ($cekPwd == 0) {
              array_push($dataUsers, array(
                'code' => $codeUser,
                'username' => $row['A'], // Insert data nis dari kolom A di excel
                'password' => $pwdMurid, // Insert data nama dari kolom B di excel
                'lvl_usr' => 'murid', // Insert data jenis kelamin dari kolom C di excel
                'akses' => 1,
              ));
              $codeMurid = helper_createCodeMurid();
              $cekCodeMurid = $this->M_a_murid->cekCodeMurid($codeMurid);
              if ($cekCodeMurid == 0) {
                array_push($data, array(
                  'kode_murid' => $codeMurid,
                  'nis' => $row['A'], // Insert data nis dari kolom A di excel
                  'nama' => $row['B'], // Insert data nama dari kolom B di excel
                  'jk' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
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
    $this->M_a_murid->insert_multiple_user($dataUsers);
    $this->M_a_murid->insert_multiple($data);
    redirect("A_murid"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
}
