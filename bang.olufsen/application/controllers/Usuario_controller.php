<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {
  
  public function _construct() {
    parent::_construct();
  }

  public function verLogin() {
    if ($this->session->userdata('login')) {
      redirect('principal');
    } else {
      $data['titulo'] = 'Inicio';
      $this->load->view('partes/header_view',$data);
      $this->load->view('partes/nav_view');
      $this->load->view('login_view');
      $this->load->view('partes/footer_view');
    }
  }

  public function iniciarSesion() {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('contraseña', 'Contraseña', 'required|callback_verificarContraseña');

    $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
    $this->form_validation->set_message('valid_email', 'El email ingresado es invalido.');

    if ($this->form_validation->run()) {
      switch ($this->session->userdata('perfil')) {
        case '1':
          redirect('admin');
          break;

        case '2':
          redirect('principal');
          break;

        default:
          redirect('login');
      }
    } else {
      $this->verLogin();
    }
  }

  function verificarContraseña($contraseña) {
    $email = $this->input->post('email');
    $contraseña = $this->input->post('contraseña');
    
    $this->load->model('Usuario_model');
    $usuario = $this->Usuario_model->buscarUsuario($email, base64_encode($contraseña));

    if ($usuario) {
      $this->load->model('Cliente_model');
      $cliente = $this->Cliente_model->buscarCliente($usuario->usuario_cliente);

      $datosCliente = array(
        'id' => $cliente->cliente_id,
        'apellidos' => $cliente->cliente_apellidos,
        'nombres' => $cliente->cliente_nombres,
        'perfil' => $cliente->cliente_perfil,
        'email' => $usuario->usuario_email,
        'login' => true
      );

      $this->session->set_userdata($datosCliente);
      return true;
    } else {
      $this->form_validation->set_message('verificarContraseña', 'El email o la contraseña es incorrecto.');
      return false;
    }
  }

  public function cerrarSesion() {
    if ($this->session->userdata('login')) {
      $this->session->sess_destroy();
      redirect('login');
    }
  }

}

