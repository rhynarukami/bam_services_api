<?php
use chriskacerguis\RestServer\RestController;

class Teknisi extends RestController
{
    
  public function __construct()
  {
    parent::__construct();
		header('Access-Control-Allow-Origin: *');

    $this->load->model('Teknisi_model', 'Teknisi');
  }

  public function all_get()
  {
    $data = $this->Teknisi->AllGet();

    $output = array();

    foreach ($data as $key => $value) {
      $output[$key]['id_tek'] = $value->id_tek;
      $output[$key]['name'] = $value->name;
    }

    $this->response($output, 200);
  }

}