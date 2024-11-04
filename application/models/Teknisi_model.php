<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Teknisi_model extends CI_Model {

  public function AllGet()
  {
    return $this->db->get('teknisi')->result();
  }

}