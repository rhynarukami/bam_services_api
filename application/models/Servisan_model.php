<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Servisan_model extends CI_Model {
    
  public function Newest7()
  {
    $this->db->get('barang');
    $this->db->limit(7);
    $this->db->order_by('id', 'DESC');
    return $this->db->get('barang')->result();
  }

  public function latest()
  {
    $this->db->order_by('id', 'DESC');
    return $this->db->get('barang');
  }

  public function insert($data)
  {
    $this->db->insert('barang', $data);

    return $this->db->affected_rows();
  }

  public function update($data, $noserv)
  {
	$this->db->update('barang', $data, ['noserv' => $noserv]);

	return $this->db->affected_rows();
  }

  public function single($noserv)
  {
	$this->db->select('*');
	$this->db->order_by('id', 'DESC');
	return $this->db->get_where('barang', ['noserv' => $noserv]);
  }

  public function byStatus($stat)
  {
	$this->db->select('*');
	$this->db->order_by('id', 'DESC');
	return $this->db->get_where('barang', ['stat' => $stat]);
  }

  public function search_data($keyword, $field)
  {
	$this->db->select('*');
	$this->db->order_by('id', 'DESC');
	$this->db->like($field, $keyword);
	return $this->db->get('barang');
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