<?php

class Compra_model extends CI_Model {
  public function _construct() {
    parent::_construct();
  }

  public function registrarCompra($data) {
    $this->db->insert('compra',$data);
  }

  public function registrarDetallecompra($data) {
    $this->db->insert('detallecompra',$data);
  }

  public function obtenerCompras($id, $orden) {
    $this->db->select('*');
    $this->db->from('compra');
    if ($id != 0) {
      $this->db->where('compra_cliente', $id);
    }
    $this->db->join('cliente', 'cliente.cliente_id = compra.compra_cliente');
    $this->db->order_by('compra_id', $orden);
    $query = $this->db->get();
    return $query->result();
  }

  public function obtenerComprasFiltradas($id, $desde, $hasta) {
    $this->db->select('*');
    $this->db->from('compra');
    if ($id != 0) {
      $this->db->where('compra_cliente', $id);
    }
    $this->db->where('compra_fecha >=', $desde);
    $this->db->where('compra_fecha <=', $hasta);
    $this->db->join('cliente', 'cliente.cliente_id = compra.compra_cliente');
    $this->db->order_by('compra_id', "DESC");
    $query = $this->db->get();
    return $query->result();
  }

  public function obtenerDetallecompras() {
    $query = $this->db->get('detallecompra');
    return $query->result();
  }

  public function obtenerMasComprados() {
    $this->db->select('*');
    $this->db->join('producto', 'producto.producto_id = detallecompra.detallecompra_producto');

    //SELECT SUM(detallecompra_cantidad), detallecompra_producto
    $this->db->select_sum('detallecompra_cantidad');
    //FROM detallecompra
    $this->db->from('detallecompra');
    //GROUP BY detallecompra_producto
    $this->db->group_by('detallecompra_producto');
    //ORDER BY SUM(detallecompra_cantidad) DESC;
    $this->db->order_by('detallecompra_cantidad', 'DESC');

    $query = $this->db->get();
    return $query->result();
  }
}