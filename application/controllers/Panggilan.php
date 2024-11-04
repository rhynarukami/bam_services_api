<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Panggilan extends RestController
{

  public function __construct()
  {
    parent::__construct();
    header('Access-Control-Allow-Origin: *');

    $this->load->model('Panggilan_model', 'Panggilan');
    $this->load->helper('date_indo');
  }

  public function latest5_get()
  {
    $data = $this->Panggilan->Newest5();
    $output = [];

    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'On The Way';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Selesai';
          break;
        default:
          $stat = '1';
          break;
      }
      $output[$key]['id_pgl'] = $value->id_pgl;
      $output[$key]['id_tek'] = $value->id_tek;
      $output[$key]['lok'] = $value->lok;
      $output[$key]['stat'] = $stat;
      $output[$key]['tgl'] = date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_pgl)));
    }

    $this->response($output, 200);
  }

  public function latest_get()
  {
    $data = $this->Panggilan->AllGet();
    $output = [];

    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'On The Way';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Selesai';
          break;
        default:
          $stat = '1';
          break;
      }
      $output[$key]['id_pgl'] = $value->id_pgl;
      $output[$key]['id_tek'] = $value->id_tek;
      $output[$key]['lok'] = $value->lok;
      $output[$key]['stat'] = $stat;
      $output[$key]['tgl'] = date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_pgl)));
    }

    $this->response($output, 200);
  }

  public function status_get()
  {
    $status = $this->get('stat');
    $data = $this->Panggilan->byStatus($status);
    $output = [];

    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'On The Way';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Selesai';
          break;
        default:
          $stat = '1';
          break;
      }
      $output[$key]['id_pgl'] = $value->id_pgl;
      $output[$key]['id_tek'] = $value->id_tek;
      $output[$key]['lok'] = $value->lok;
      $output[$key]['stat'] = $stat;
      $output[$key]['tgl'] = date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_pgl)));
    }

    $this->response($output, 200);
  }

  public function single_get()
  {
    $id = $this->get('id_pgl');
    $data = $this->Panggilan->Single($id);
    $output = [];

    foreach ($data as $key => $value) {
      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'On The Way';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Selesai';
          break;
        default:
          $stat = '1';
          break;
      }
      $output[$key]['id_pgl'] = $value->id_pgl;
      $output[$key]['id_tek'] = $value->id_tek;
      $output[$key]['lok'] = $value->lok;
      $output[$key]['kel'] = $value->kel;
      $output[$key]['ket'] = ($value->ket == '') ? '-' : $value->ket;
      $output[$key]['stat'] = $stat;
      $output[$key]['tgl_pgl'] = ($value->wkt_pgl == '0000-00-00 00:00:00') ? '-' : date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_pgl)));
      $output[$key]['tgl_updt'] = ($value->wkt_updt == '0000-00-00 00:00:00') ? '-' : date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_updt)));
      $output[$key]['tgl_selesai'] = ($value->wkt_done == '0000-00-00 00:00:00') ? '-' : date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_done)));
    }

    $this->response($output, 200);
  }

  public function update_post()
  {
    $id_pgl = $this->post('id_pgl');

    switch ($this->post('stat')) {
      case 'Pending':
        $stat = '1';
        break;
      case 'On The Way':
        $stat = '2';
        break;
      case 'Tdk Dpt Dikerjakan':
        $stat = '8';
        break;
      case 'Dibatalkan':
        $stat = '9';
        break;
      case 'Selesai':
        $stat = '0';
        break;
      default:
        $stat = '1';
        break;
    }

    $data = [
      'stat' => $stat,
      'ket' => $this->post('ket'),
      'wkt_updt' => date('Y-m-d H:i:s'),
      'wkt_done' => ($this->post('stat') == 'Selesai' || $this->post('stat') == 'Dibatalkan') ? date('Y-m-d H:i:s') : '0000-00-00 00:00:00'
    ];

    $this->Panggilan->Update($id_pgl, $data);

    $this->response([
      'status' => true,
      'message' => 'Data berhasil diubah'
    ], 200);
  }

  public function search_get()
  {
    $keyword = $this->get('keyword');
    $field = $this->get('field');
    $array = $this->Panggilan->search_data($keyword, $field);
    $data = $array->result();
    $rows = $array->num_rows();
    
    $output = [];

    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'On The Way';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Selesai';
          break;
        default:
          $stat = '1';
          break;
      }
      $output[$key]['id_pgl'] = $value->id_pgl;
      $output[$key]['id_tek'] = $value->id_tek;
      $output[$key]['lok'] = $value->lok;
      $output[$key]['stat'] = $stat;
      $output[$key]['tgl'] = date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_pgl)));
    }

    if ($rows > 0) {
      $output = [
        'status' => true,
        'message' => 'Data berhasil ditemukan',
        'rows' => $rows,
        'data' => $output
      ];
      $this->response($output, 200);
    } else {
      $output = [
        'status' => false,
        'message' => 'Data tidak ditemukan',
        'rows' => $rows,
        'data' => $output
      ];
      $this->response($output, 200);
    }
  }

  public function insert_post()
  {
    $lok = $this->post('lok');
    $kel = $this->post('kel');
    $id_tek = $this->post('id_tek');

    $insert = array(
      'id_pgl' => null,
      'lok' => $lok,
      'kel' => $kel,
      'wkt_pgl' => date('Y-m-d H:i:s'),
      'ket' => '',
      'stat' => '1',
      'id_tek' => $id_tek,
    );

    $insert = $this->Panggilan->Insert($insert);

    if ($lok != '' && $kel != '' && $id_tek != '') {
      $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    } else {
      $this->response(['status' => false, 'message' => 'Data gagal ditambahkan'], 200);
    }
  }
}
