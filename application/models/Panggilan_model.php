<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panggilan_model extends CI_Model {

  public function Newest5()
  {
    $this->db->get('panggilan');
    $this->db->limit(5);
    $this->db->order_by('id_pgl', 'DESC');
    return $this->db->get('panggilan')->result();
  }

  public function AllGet()
  {
    $this->db->order_by('id_pgl', 'DESC');
	return $this->db->get('panggilan')->result();
  }

  public function Single($id_pgl)
  {
	$this->db->order_by('id_pgl', 'DESC');
	return $this->db->get_where('panggilan', ['id_pgl' => $id_pgl])->result();
  }

  public function byStatus($stat)
  {
	$this->db->order_by('id_pgl', 'DESC');
	return $this->db->get_where('panggilan', ['stat' => $stat])->result();
  }

  public function search_data($keyword, $field)
  {
	$this->db->order_by('id_pgl', 'DESC');
	$this->db->like($field, $keyword);
	return $this->db->get('panggilan');
  }

  public function Update($id_pgl, $data)
  {
	$this->db->where('id_pgl', $id_pgl);
	$this->db->update('panggilan', $data);

	return $this->db->affected_rows();
  }

  public function Insert($data)
  {
	$this->db->insert('panggilan', $data);

	return $this->db->affected_rows();
  }

  	// public function GetAllServis_rows($status)
	// {
	// 	$this->db->select('Noserv,Jebar,Nm,Tgl,Tns');
	// 	$this->db->order_by('ID','DESC');
	// 	$query = $this->db->get_where('bam', ['Stat'=>$status])->num_rows();
	// 	return $query;
	// }

	// public function GetAllServis_paging($status, $current_records, $records_per_pages)
	// {
	// 	$this->db->select('Noserv,Jebar,Nm,Tgl,Tns');
	// 	$this->db->order_by('ID','DESC');
	// 	$this->db->limit($records_per_pages, $current_records);
	// 	$query = $this->db->get_where('bam', ['Stat'=>$status])->result();
	// 	return $query;
	// }

}