<?php
defined('BASEPATH') or exit('No direct script access allowed');

function date_indo($datetime)
{
  $date = date('Y-m-d', strtotime($datetime));
  $bulan = [
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
  ];
  $split = explode('-', $date);
  return $split[2] . ' ' . $bulan[$split[1]] . ' ' . $split[0];
}