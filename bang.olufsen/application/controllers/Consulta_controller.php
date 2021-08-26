<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_controller extends CI_Controller {
  
  public function _construct() {
    parent::_construct();
  }

  public function verContacto() {
    $data['titulo'] = 'Contacto';

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view',$data);
    }
    
    $this->load->view('partes/nav_view');
    $this->load->view('contacto_view');
    $this->load->view('partes/footer_view');
  }

  public function verConsultas() {
    if ($this->session->userdata('perfil') == 1) {
      $data['titulo'] = 'Consultas';

      $this->load->model('Consulta_model');
      $data['consultas'] = $this->Consulta_model->obtenerConsultas();

      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');
      $this->load->view('admin/consulta_view', $data);
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }

  private function verificarConsulta() {
    $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
    $this->form_validation->set_rules('nombres', 'Nombres', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('consulta', 'Consulta', 'required');

    $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
    $this->form_validation->set_message('valid_email', 'El %s ingresado es invalido.');

    if ($this->form_validation->run()) {
      return true;
    } else {
      return false;
    }
  }

  public function registrarConsulta() {
    if ($this->verificarConsulta()) {
      $this->load->model('Consulta_model');

      $consulta = array(
        'consulta_nombres' => $this->input->post('nombres'),
        'consulta_apellidos' => $this->input->post('apellidos'),
        'consulta_email' => $this->input->post('email'),
        'consulta_telefono' => $this->input->post('telefono'),
        'consulta_categoria' => $this->input->post('categoria'),
        'consulta_texto' => $this->input->post('consulta'),
        'consulta_estado' => true
      );
      
      $this->Consulta_model->registrarConsulta($consulta);

      echo "<script type=\"text/javascript\">alert('Consulta enviada.');</script>";
      $this->verContacto();
    } else {
      $this->verContacto();
    }
  }

  public function desactivarConsulta($id) {
    if ($this->session->userdata('perfil') == 1) {
      $data = array(
        'consulta_estado' => false
      );
      
      $this->load->model('Consulta_model');
      $this->Consulta_model->actualizarConsulta($id, $data);

      redirect('admin/consultas');
    } else {
      redirect('acceso_invalido');
    }
  }

  public function activarConsulta($id) {
    if ($this->session->userdata('perfil') == 1) {
      $data = array(
        'consulta_estado' => true
      );
      
      $this->load->model('Consulta_model');
      $this->Consulta_model->actualizarConsulta($id, $data);

      redirect('admin/consultas');
    } else {
      redirect('acceso_invalido');
    }
  }
}
