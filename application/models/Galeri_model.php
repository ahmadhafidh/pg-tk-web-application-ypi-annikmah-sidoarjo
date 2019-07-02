<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeri_model extends CI_Model
{
  public $table = 'galeri';
  public $id    = 'id_galeri';
  public $order = 'DESC';
  
  function get_DataHalaman($perhalaman, $awal)
  {
    return $this->db->query('SELECT * FROM galeri ORDERS LIMIT '.$perhalaman.' OFFSET '.$awal.'')->result();
  }
  
  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_random()
  {
    $this->db->limit(8); 
    $this->db->order_by($this->id, 'random');
    return $this->db->get($this->table)->result();
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();    
  }

  
  // get total rows
  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }

  // insert data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

}