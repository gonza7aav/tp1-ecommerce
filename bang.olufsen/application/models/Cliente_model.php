<?php

class CLiente_model extends CI_Model {
  public function _construct() {
    parent::_construct();
  }

  public function registrarCliente($data) {
    $this->db->insert('cliente',$data);
  }

  public function modificarCliente($id, $data) {
    $this->db->where('cliente_id', $id);
    $this->db->update('cliente', $data);
  }

  public function buscarCliente($id) {
  	$this->db->select('*');
    $this->db->from('cliente');
    $this->db->where('cliente_id', $id);
    $query = $this->db->get();
    return $query->row();
  }
}