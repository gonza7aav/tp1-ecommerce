<?php

class Producto_model extends CI_Model {
  public function _construct() {
    parent::_construct();
  }

  public function registrarProducto($data) {
    $this->db->insert('producto',$data);
  }

  public function selectCategorias() {
  	$query = $this->db->get('categoria');
  	return $query->result();
  }

  public function buscarProducto($id) {
    $this->db->select('*');
    $this->db->from('producto');
    $this->db->where('producto_id', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function obtenerProductos($categoria) {
    $this->db->select('*');
    $this->db->from('producto');
    if ($categoria != 0) {
      $this->db->where('producto_categoria =', $categoria);
    }
    $this->db->join('categoria', 'categoria.categoria_id = producto.producto_categoria');
    $query = $this->db->get();
    return $query->result();
  }

  public function obtenerProductosPaginacion($categoria, $limit, $row) {
    $this->db->select('*');
    $this->db->from('producto');
    if ($categoria != 0) {
      $this->db->where('producto_categoria =', $categoria);
    }
    $this->db->join('categoria', 'categoria.categoria_id = producto.producto_categoria');
    $this->db->order_by('producto_id', 'DESC');
    $this->db->limit($limit, $row);
    $query = $this->db->get();
    return $query->result();
  }

  public function obtenerCatalogo($categoria) {
    $this->db->select('*');
    $this->db->from('producto');
    $this->db->where('producto_estado =', 1);
    $this->db->where('producto_stock >', 0);
    if ($categoria != 0) {
      $this->db->where('producto_categoria =', $categoria);
    }
    $query = $this->db->get();
    return $query->result();
  }

  public function obtenerCatalogoPaginacion($categoria, $limit, $row) {
    $this->db->select('*');
    $this->db->from('producto');
    $this->db->where('producto_estado =', 1);
    $this->db->where('producto_stock >', 0);
    if ($categoria != 0) {
      $this->db->where('producto_categoria =', $categoria);
    }
    $this->db->limit($limit, $row);
    $query = $this->db->get();
    return $query->result();
  }

  public function obtenerOfertas() {
    $this->db->select('*');
    $this->db->from('producto');
    $this->db->where('producto_estado =', 1);
    $this->db->where('producto_stock >', 0);
    $this->db->where('producto_oferta >', 0);
    $query = $this->db->get();
    return $query->result();
  }

  public function obtenerOfertasPaginacion($limit, $row) {
    $this->db->select('*');
    $this->db->from('producto');
    $this->db->where('producto_estado =', 1);
    $this->db->where('producto_stock >', 0);
    $this->db->where('producto_oferta >', 0);
    $this->db->limit($limit, $row);
    $query = $this->db->get();
    return $query->result();
  } 

  public function actualizarProducto ($id, $data) {
    $this->db->where('producto_id', $id);
    $this->db->update('producto', $data);
  }

  public function buscarCoincidencias($busqueda) {
    $this->db->select('*');
    $this->db->from('producto');
    //WHERE `title` LIKE '%match%' ESCAPE '!' OR  `body` LIKE '%match%' ESCAPE '!'
    $this->db->like('producto_nombre', $busqueda);
    $this->db->or_like('producto_descripcion', $busqueda);
    $query = $this->db->get();
    return $query->result();
  }

}