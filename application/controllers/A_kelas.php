<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_kelas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_a_kelas');
    $this->load->helper('create_random_helper');
  }

  function index()
  {
    $this->load->view('admin/kelas/v_kelas');
  }
  

  function loadKelas(){
    $dataKelas = $this->M_a_kelas->loadDataKelas();
    $output['dataKelas'] = $dataKelas;
    echo json_encode($output);
  }

  function tmbKelas(){
    $i = 0;
    while ($i == 0) {
      $codeKelas = helper_createCodeKelas();
      $cekCode = $this->M_a_kelas->cekCodeKelas($codeKelas);
      if ($cekCode == 0) {
        $dataKelas = array('kode_kls' => $codeKelas,
                          'nama_kls' => $this->input->post('nama'));

        $insertKelas = $this->M_a_kelas->tambahKelas($dataKelas);
        if ($insertKelas) {
          $output['msg'] = 'success';
          echo json_encode($output);
        }
        $i += 1;
      }else {
        $i += 0;
      }
    }
  }

  function tambah(){
    $this->load->view('admin/kelas/v_tambahMurid');
  }

  function modalGuru(){
    $id = $this->input->get('id');
    $sql = "SELECT * FROM guru WHERE kode_mapel='$id'";
    $data = $this->db->query($sql)->result();


    $no = 1;
    $table = '';
    $table .= '<table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIP</th>
          <th scope="col">Nama Guru</th>
          <th scope="col">Jenis Kelamin</th>
        </tr>
      </thead>
      <tbody>';

    if ($data) {
      foreach ($data as $val) {
        $table .= '<tr>
                  <td>' . $no . '</td>
                  <td>' . $val->nip . '</td>
                  <td>' . $val->nama . '</td>
                  <td>' . $val->jk .'</td> </tr>';
      }
    }else {
      $table .= '<tr> <td colspan="4"> Tidak ada data guru yang ditambahkan </td> </tr>';
    }


    $table .=  '</tbody>
    </table>';
    echo $table;
  }

  function loadDataMapel(){
    $id = $this->input->get('id');
    $dataMapelGuru = $this->M_a_kelas->loadDataMapelGuru($id);
    $dataArr = [];
    foreach ($dataMapelGuru as $val) {
      array_push($dataArr, $val->kode_guru);
    }
    $dataMapel = $this->M_a_kelas->loadDataMapel($dataArr);
    $output['dataMapel'] = $dataMapel;
    echo json_encode($output);
  }

  function loadDataMuridKls(){
    $id = $this->input->get('id');
    $dataMurid = $this->M_a_kelas->slcMuridKls($id);
    $output['dataMuridKls'] = $dataMurid;
    echo json_encode($output);
  }

  function loadDataMurid(){
    $dataMurid = $this->M_a_kelas->slcMurid();
    $output['dataMurid'] = $dataMurid;
    echo json_encode($output);
  }

  function saveMurid(){
    $data = $this->input->post('codeMurid');
    $codeKls = $this->input->post('codeKls');
    if ($data) {
      foreach ($data as $val) {
        $this->M_a_kelas->updateMurid($val, $codeKls);
        $this->M_a_kelas->updateMuridNilai($val, $codeKls);
      }
      $slcGuru = $this->M_a_kelas->slcGuruKls($codeKls);
      if ($slcGuru) {
        foreach ($slcGuru as $val) {
          $this->M_a_kelas->updateGuruMuridInNilai($val->kode_guru, $val->kode_mapel, $codeKls);
        }
      }
      $output['status'] = 'success';
      echo json_encode($output);
    }
  }

  function saveGuru(){
    $id = $this->input->post('codeGuru');
    $codeKls= $this->input->post('codeKls');
    $idMapel = $this->input->post('codeMapel');
    $this->M_a_kelas->updateGuruNull($idMapel, $codeKls);
    $this->M_a_kelas->updateGuru($id, $codeKls);
    $slcMurid = $this->M_a_kelas->selectMurid($idMapel, $codeKls);
    if ($slcMurid) {
      foreach ($slcMurid as $val) {
        $this->M_a_kelas->updateGuruNilai($val->kode_murid, $id, $idMapel, $codeKls);
      }
      $output['status'] = 'success';
      echo json_encode($output);
    }else {
      $output['status'] = 'success';
      echo json_encode($output);
    }

  }

  function aksiLoadGuru(){
    $id = $this->input->get('id');
    $codeKls = $this->input->get('codeKls');
    $data = $this->M_a_kelas->slcGuruMapel($id, $codeKls);
    $output['data'] = $data;
    echo json_encode($output);

  }

  function loadEditKelas(){
    $kode_kelas = $this->input->post('kode_kelas');
    $dataKelas = $this->db->get_where('kelas',['kode_kls' => $kode_kelas])->row_array();
    $data['dataEdit'] = $dataKelas;
    echo json_encode($data);
  }

  function editKelas(){
    $nama_kls = $this->input->post('nama_kelas');
    $kode_kls = $this->input->post('kode_kls');
    $data = array(
        'nama_kls' => $nama_kls,
      );
    $this->db->where('kode_kls', $kode_kls);
    $this->db->update('kelas', $data);
    $output['msg'] = 'success';
    echo json_encode($output);
  }

  function deleteKelas(){
    $code = $this->input->post('id');
    $del = $this->M_a_kelas->hapusKelas($code);
    if ($del) {
      $output['msg'] = 'success';
      echo json_encode($output);
    }
  }



}
