<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_mapel extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_a_mapel');
    $this->load->helper('create_random_helper');
  }

  function index()
  {
    $this->load->view('admin/mapel/v_mapel');
  }

  function loadMapel(){
    $dataMapel = $this->M_a_mapel->loadDataMapel();
    $output['dataMapel'] = $dataMapel;
    echo json_encode($output);

  }

  function tmbMapel(){
    $i = 0;
    while ($i == 0) {
      $codeMapel = helper_createCodeMapel();
      $cekCode = $this->M_a_mapel->cekCodeMapel($codeMapel);
      if ($cekCode == 0) {
        $dataMapel = array('kode_mapel' => $codeMapel,
                          'nama_mapel' => $this->input->post('nama'));

        $insertMapel = $this->M_a_mapel->tambahMapel($dataMapel);
        if ($insertMapel) {
          $countMurid = $this->M_a_mapel->selectMuridMapel();
          if ($countMurid == '0') {
            $output['msg'] = 'success';
            echo json_encode($output);
            $i += 1;
          }else {
            $selectMurid = $this->M_a_mapel->selectMurid();
            foreach ($selectMurid as $val) {
              $firstNilai = array('kode_murid' => $val->kode_murid,
                    'kode_mapel' => $codeMapel);
              $this->M_a_mapel->insertNilai($firstNilai);
            }
            $output['msg'] = 'success';
            echo json_encode($output);
            $i += 1;
          }
        }
        $i += 1;
      }else {
        $i += 0;
      }
    }
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


  function tmbGuruMapel(){
    $this->load->view('admin/mapel/v_tmbGuruMapel');
  }

  function saveGuruMapel(){
    $data = $this->input->post('codeGuru');
    $codeMapel = $this->input->post('codeMapel');
    if ($data) {
      foreach ($data as $val) {
        $this->M_a_mapel->updateGuru($val, $codeMapel);
      }
      $output['status'] = 'success';
      echo json_encode($output);
    }

  }

  function loadDataGuruTmb(){
    $data = $this->M_a_mapel->selectDataGuruTmb();
    $output['dataGuru'] = $data;
    echo json_encode($output);
  }

  function loadGuruMapel(){
    $code = $this->input->post('code');
    $data = $this->M_a_mapel->selectGuruMapel($code);
    if ($data) {
      $output['dataGuru'] = $data;
      $output['status'] = 'ada';
      echo json_encode($output);
    }else {
      $output['status'] = 'tidak';
      echo json_encode($output);
    }

  }

  function deleteGuruMapel(){
    $code = $this->input->post('id');
    if ($code) {
      $this->M_a_mapel->delUpdateGuru($code);
    }
    $output['status'] = 'success';
    echo json_encode($output);
  }

  function deleteMapel(){
    $code = $this->input->post('id');
    $del = $this->M_a_mapel->hapusMapel($code);
    if ($del) {
      $output['msg'] = 'success';
      echo json_encode($output);
    }
  }

  function loadEditMapel(){
    $kode_mapel = $this->input->post('kode_mapel');
    $dataMapel = $this->db->get_where('mapel',['kode_mapel' => $kode_mapel])->row_array();
    $data['dataEdit'] = $dataMapel;
    echo json_encode($data);
  }

  function editMapel(){
    $nama_mapel = $this->input->post('nama_mapel');
    $kode_mapel = $this->input->post('kode_mapel');
    $data = array(
        'nama_mapel' => $nama_mapel,
      );
    $this->db->where('kode_mapel', $kode_mapel);
    $this->db->update('mapel', $data);
    $output['msg'] = 'success';
    echo json_encode($output);
  }

}
