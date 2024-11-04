<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Servisan extends RestController
{

  public function __construct()
  {
    parent::__construct();
    header('Access-Control-Allow-Origin: *');

    $this->load->model('Servisan_model', 'Servisan');
    $this->load->helper('date_indo');
  }

  public function latest7_get()
  {
    $data = $this->Servisan->Newest7();
    $output = [];
    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'Tunggu Konfirmasi';
          break;
        case '3':
          $stat = 'On Progress';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Diambil';
          break;
        default:
          $stat = '1';
          break;
      }

      $output[$key] = [
        'noserv' => $value->noserv,
        'jebar' => $value->jebar,
        'atn' => $value->atn,
        'telp' => $value->telp,
        'wkt_dtg' => date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_dtg))),
        'stat' => $stat,
      ];
    }
    $this->response($output, 200);
  }

  public function latest_get()
  {
    $data = $this->Servisan->latest()->result();
    $output = [];
    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'Tunggu Konfirmasi';
          break;
        case '3':
          $stat = 'On Progress';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Diambil';
          break;
        default:
          $stat = '1';
          break;
      }

      $output[$key] = [
        'noserv' => $value->noserv,
        'jebar' => $value->jebar,
        'atn' => $value->atn,
        'telp' => $value->telp,
        'wkt_dtg' => date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_dtg))),
        'stat' => $stat,
      ];
    }
    $this->response($output, 200);
  }

  public function status_get()
  {
    $status = $this->get('stat');
    $data = $this->Servisan->byStatus($status)->result();
    $output = [];
    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'Tunggu Konfirmasi';
          break;
        case '3':
          $stat = 'On Progress';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Diambil';
          break;
        default:
          $stat = '1';
          break;
      }

      $output[$key] = [
        'noserv' => $value->noserv,
        'jebar' => $value->jebar,
        'atn' => $value->atn,
        'telp' => $value->telp,
        'wkt_dtg' => date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_dtg))),
        'stat' => $stat,
      ];
    }
    $this->response($output, 200);
  }

  public function single_get()
  {
    $noserv = $this->get('noserv');
    $data = $this->Servisan->single($noserv)->result();
    $output = [];
    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'Tunggu Konfirmasi';
          break;
        case '3':
          $stat = 'On Progress';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Diambil';
          break;
        default:
          $stat = '1';
          break;
      }

      $output[$key] = [
        'noserv' => $value->noserv,
        'jebar' => $value->jebar,
        'atn' => $value->atn,
        'acc' => $value->acc,
        'telp' => $value->telp,
        'wkt_dtg' => date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_dtg))),
        'wkt_updt' => ($value->wkt_updt == '0000-00-00 00:00:00') ? '-' : date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_updt))),
        'wkt_ambl' => ($value->wkt_ambl == '0000-00-00 00:00:00') ? '-' : date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_updt))),
        'kel' => $value->kel,
        'ket' => ($value->ket == "") ? '-' : $value->ket,
        'op_tek' => $value->op_tek,
        'rep_tek' => ($value->rep_tek == "") ? '-' : $value->rep_tek,
        'stat' => $stat,
      ];
    }
    $this->response($output, 200);
  }

  public function insert_post()
  {
    $allData = $this->Servisan->latest();
    $totalRow = $allData->num_rows();

    $idSB = 'SB - ' . ($totalRow + 1);

    $data = [
      'id' => null,
      'noserv' => $idSB,
      'jebar' => $this->post('jebar'),
      'acc' => $this->post('acc'),
      'atn' => $this->post('atn'),
      'telp' => $this->post('telp'),
      'kel' => $this->post('kel'),
      'ket' => '',
      'wkt_dtg' => date('Y-m-d H:i:s'),
      'wkt_updt' => '0000-00-00 00:00:00',
      'wkt_ambl' => '0000-00-00 00:00:00',
      'stat' => '1',
      'op_tek' => $this->post('id_tek'),
      'rep_tek' => '',
    ];

    $insert = $this->Servisan->insert($data);

    if ($insert) {
      $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    } else {
      $this->response(['status' => false, 'message' => 'Data gagal ditambahkan'], 502);
    }
  }

  public function update_post()
  {
    $noserv = $this->post('noserv');
    $stat = $this->post('stat');

    switch ($stat) {
      case 'Pending':
        $stat = '1';
        break;
      case 'Tunggu Konfirmasi':
        $stat = '2';
        break;
      case 'On Progress':
        $stat = '3';
        break;
      case 'Tdk Dpt Diperbaiki':
        $stat = '8';
        break;
      case 'Dibatalkan':
        $stat = '9';
        break;
      case 'Diambil':
        $stat = '0';
        break;
      default:
        $stat = '1';
        break;
    }

    $data = [
      'ket' => $this->post('ket'),
      'wkt_updt' => date('Y-m-d H:i:s'),
      'wkt_ambl' => ($this->post('stat') === 'Diambil') ? date('Y-m-d H:i:s') : '0000-00-00 00:00:00',
      'stat' => $stat,
      'rep_tek' => $this->post('id_tek'),
    ];

    $update = $this->Servisan->update($data, $noserv);

    if ($update) {
      $this->response(['status' => true, 'message' => 'Data berhasil diupdate'], 200);
    } else {
      $this->response(['status' => false, 'message' => 'Data gagal diupdate'], 502);
    }
  }

  public function search_get()
  {
    $keyword = $this->get('keyword');
    $field = $this->get('field');
    $array = $this->Servisan->search_data($keyword, $field);
    $data = $array->result();
    $rows = $array->num_rows();
    $output = [];

    if ($rows > 0) {
    foreach ($data as $key => $value) {

      switch ($value->stat) {
        case '1':
          $stat = 'Pending';
          break;
        case '2':
          $stat = 'Tunggu Konfirmasi';
          break;
        case '3':
          $stat = 'On Progress';
          break;
        case '8':
          $stat = 'Tdk Dpt Dikerjakan';
          break;
        case '9':
          $stat = 'Dibatalkan';
          break;
        case '0':
          $stat = 'Diambil';
          break;
        default:
          $stat = '1';
          break;
      }

      $output[$key] = [
        'noserv' => $value->noserv,
        'jebar' => $value->jebar,
        'atn' => $value->atn,
        'telp' => $value->telp,
        'wkt_dtg' => date_indo(date('d-m-Y H:i:s', strtotime($value->wkt_dtg))),
        'stat' => $stat,
      ];
    }
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
        'data' => $data
      ];
      $this->response($output, 200);
    }
  }
}
