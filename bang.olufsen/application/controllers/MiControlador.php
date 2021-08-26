<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MiControlador extends CI_Controller {
  
  public function _construct() {
    parent::_construct();
  }

  public function index() {
    $this->verPrincipal();
  }

  public function verPrincipal() {
    $data['titulo'] = 'Principal';

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view',$data);
    }
    
    $this->load->view('partes/nav_view');
    $this->load->view('principal_view');
    $this->load->view('partes/footer_view');
  }

  public function verQuienesSomos() {
    $data['titulo'] = 'Quienes Somos';

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view',$data);
    }
    
    $this->load->view('partes/nav_view');
    $this->load->view('quienes_somos_view');
    $this->load->view('partes/footer_view');
  }

  public function verComercializacion() {
    $data['titulo'] = 'Comercializacion';

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view',$data);
    }
    
    $this->load->view('partes/nav_view');
    $this->load->view('comercializacion_view');
    $this->load->view('partes/footer_view');
  }

  public function verTerminos() {
    $data['titulo'] = 'Terminos de Uso';

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view',$data);
    }
    
    $this->load->view('partes/nav_view');
    $this->load->view('terminos_view');
    $this->load->view('partes/footer_view');
  }

  public function verAccesoInvalido() {
    $data['titulo'] = 'Acceso Invalido';

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view',$data);
    }
    
    $this->load->view('partes/nav_view');
    $this->load->view('acceso_invalido_view');
    $this->load->view('partes/footer_view');
  }

  public function verAdmin() {
    if ($this->session->userdata('perfil') == 1) {
      $data['titulo'] = 'Admin';
      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');

      $this->load->model('Compra_model');
      $data['productos'] = $this->Compra_model->obtenerMasComprados();
      // arreglar
      $data['ventas'] = array(0, 0, 0, 0);
      $data['ventasTotal'] = 0;
      foreach ($data['productos'] as $row) {
        $data['ventas'][$row->producto_categoria - 1] += $row->detallecompra_cantidad;
        $data['ventasTotal'] += $row->detallecompra_cantidad;
      }

      $this->load->view('admin/principal_admin_view', $data);
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }
}