<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {
  
  public function _construct() {
    parent::_construct();
  }

  public function verCarrito () {
    if ($this->session->userdata('login')) {
      $data['titulo'] = 'Carrito';
      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');
      $this->load->view('carrito_view');
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }

  public function agregar() {
    $data = array(
      'id' => $this->input->post('id'),
      'name' => $this->input->post('nombre'),
      'price' => $this->input->post('precio'),
      'qty' => 1
    );
    $this->cart->insert($data);
    redirect('carrito');
  }

  public function quitar($rowid) {
    if ($rowid == 'all') {
      $this->cart->destroy();
    } else {
      $item = $this->cart->get_item($rowid);
      $data = array(
        'rowid' => $rowid,
        'qty' => 0
      );
      $this->cart->update($data);
    }
    redirect('carrito');
  }

  public function agregarUnidad($rowid) {
    $item = $this->cart->get_item($rowid);
    $this->load->model('Producto_model');
    $producto = $this->Producto_model->buscarProducto($item['id']);

    if ($item['qty'] < $producto->producto_stock) {
      $data = array(
        'id' => $item['id'],
        'name' => $item['name'],
        'price' => $item['price'],
        'qty' => 1
      );
      $this->cart->insert($data);
    }
    redirect('carrito');
  }

  public function quitarUnidad($rowid) {
    $item = $this->cart->get_item($rowid);
    $data = array(
      'rowid' => $rowid,
      'qty' => $item['qty'] - 1
    );
    $this->cart->update($data);
    redirect('carrito');
  }

  public function comprar() {
    if ($this->session->userdata('login')) {
      if (!empty($this->cart->contents())) {
        $this->load->model('Producto_model');
        $hayStock = true;
        foreach ($this->cart->contents() as $item) {
          $producto = $this->Producto_model->buscarProducto($item['id']);
          if ($item['qty'] > $producto->producto_stock) {
            $hayStock = false;
            break;
          }
        }

        if ($hayStock) {
          $compra = array(
            'compra_cliente' => $this->session->userdata('id'),
            'compra_fecha' => date('Y-m-d')
          );

          $this->load->model('Compra_model');
          $this->Compra_model->registrarCompra($compra);

          $compra_id = $this->db->insert_id();

          foreach ($this->cart->contents() as $item) {
            $detallecompra = array(
              'detallecompra_compra' => $compra_id,
              'detallecompra_producto' => $item['id'],
              'detallecompra_cantidad' => $item['qty'],
              'detallecompra_precio' => $item['price']
            );

            $this->Compra_model->registrarDetallecompra($detallecompra);

            $producto = $this->Producto_model->buscarProducto($item['id']);
            $productoActualizado = array(
              'producto_stock' => $producto->producto_stock - $item['qty']
            );
            $this->Producto_model->actualizarProducto($item['id'], $productoActualizado);
          }

          $this->cart->destroy();

          echo "<script type=\"text/javascript\">alert('Gracias por comprar con nosotros.');</script>";
          $this->verCarrito();
        } else {
          echo "<script type=\"text/javascript\">alert('Al menos un producto que se quiere comprar, no posee stock.');</script>";
          $this->verCarrito();
        }
      } else {
        echo "<script type=\"text/javascript\">alert('El carrito de compras se encuentra vacio.');</script>";
        $this->verCarrito();
      }
    } else {
      redirect('acceso_invalido');
    }
  }

  public function verCompras($id, $orden) {
    if ($this->session->userdata('login')) {
      $data['titulo'] = 'Compras';

      $this->load->model('Compra_model');
      $this->load->model('Producto_model');

      if ($orden == 'ASC') {
        $data['orden'] = 0;
      } else {
        $data['orden'] = 1;
      }
      $data['id_recibida'] = $id;
      $data['compras'] = $this->Compra_model->obtenerCompras($id, $orden);
      $data['detallecompras'] = $this->Compra_model->obtenerDetallecompras();
      $data['productos'] = $this->Producto_model->obtenerProductos(0);

      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');
      $this->load->view('compra_view', $data);
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }
}
