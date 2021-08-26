<?php

class Consulta_model extends CI_Model {
  public function _construct() {
    parent::_construct();
  }

  public function registrarConsulta($data) {
    $this->db->insert('consulta',$data);
  }

  public function obtenerConsultas() {
  	$query = $this->db->get('consulta');
  	return $query->result();
  }

  public function actualizarConsulta ($id, $data) {
    $this->db->where('consulta_id', $id);
    $this->db->update('consulta', $data);
  }
}