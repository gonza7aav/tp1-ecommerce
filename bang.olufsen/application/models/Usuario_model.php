<?php

class Usuario_model extends CI_Model {
  public function _construct() {
    parent::_construct();
  }

  public function registrarUsuario($data) {
    $this->db->insert('usuario',$data);
  }

  public function buscarUsuario($email, $contraseña) {
    $this->db->select('*');
    $this->db->from('usuario');
    $this->db->where('usuario_email', $email);
    $this->db->where('usuario_contraseña', $contraseña);
    $query = $this->db->get();
    return $query->row();
  }
}