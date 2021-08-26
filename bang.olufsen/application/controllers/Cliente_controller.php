<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_controller extends CI_Controller {
  
  public function _construct() {
    parent::_construct();
  }

  public function verRegistro() {
    if ($this->session->userdata('login')) {
      redirect('principal');
    } else {
      $data['titulo'] = 'Registro';
      $this->load->view('partes/header_view',$data);
      $this->load->view('partes/nav_view');
      $this->load->view('registro_view');
      $this->load->view('partes/footer_view');
    }
  }

  private function verificarDatos($esRegistro) {
    $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
    $this->form_validation->set_rules('nombres', 'Nombres', 'required');
    $this->form_validation->set_rules('pais', 'Pais', 'required');
    $this->form_validation->set_rules('provincia', 'Provincia', 'required');
    $this->form_validation->set_rules('ciudad', 'Ciudad', 'required');
    $this->form_validation->set_rules('calle', 'Calle', 'required');
    $this->form_validation->set_rules('altura', 'Altura', 'required');

    if ($esRegistro) {
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuario.usuario_email]');
      $this->form_validation->set_rules('contraseña', 'Contraseña', 'required');
      $this->form_validation->set_rules('repeticionContraseña', '', 'matches[contraseña]');
    }

    $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
    $this->form_validation->set_message('valid_email', 'El %s ingresado es invalido.');
    $this->form_validation->set_message('is_unique', 'El %s ingresado ya esta registrado.');
    $this->form_validation->set_message('matches', 'Las contraseñas no coinciden.');

    if ($this->form_validation->run()) {
      return true;
    } else {
      return false;
    }
  }

  public function registrarCliente() {
    if ($this->verificarDatos(true)) {
      $cliente = array(
        'cliente_apellidos' => $this->input->post('apellidos'),
        'cliente_nombres' => $this->input->post('nombres'),
        'cliente_pais' => $this->input->post('pais'),
        'cliente_provincia' => $this->input->post('provincia'),
        'cliente_ciudad' => $this->input->post('ciudad'),
        'cliente_calle' => $this->input->post('calle'),
        'cliente_altura' => $this->input->post('altura'),
        'cliente_perfil' => 2
      );
      
      $this->load->model('Cliente_model');
      $this->Cliente_model->registrarCliente($cliente);

      $id_cliente = $this->db->insert_id();

      $usuario = array(
        'usuario_email' => $this->input->post('email'),
        'usuario_contraseña' => base64_encode($this->input->post('contraseña')),
        'usuario_cliente' => $id_cliente
      );

      $this->load->model('Usuario_model');
      $this->Usuario_model->registrarUsuario($usuario);

      redirect('login');
    } else {
      $this->verRegistro();
    }
  }

  public function verModificarCliente() {
    if ($this->session->userdata('login')) {
      $data['titulo'] = 'Modificar';

      $this->load->model('Cliente_model');
      $data['cliente'] = $this->Cliente_model->buscarCliente($this->session->userdata('id'));

      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');
      $this->load->view('modificar_usuario_view', $data);
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }

  public function modificarCliente() {
    if ($this->verificarDatos(false)) {
      $data = array(
        'cliente_apellidos' => $this->input->post('apellidos'),
        'cliente_nombres' => $this->input->post('nombres'),
        'cliente_pais' => $this->input->post('pais'),
        'cliente_provincia' => $this->input->post('provincia'),
        'cliente_ciudad' => $this->input->post('ciudad'),
        'cliente_calle' => $this->input->post('calle'),
        'cliente_altura' => $this->input->post('altura')
      );
      
      $this->load->model('Cliente_model');
      $this->Cliente_model->modificarCliente($this->session->userdata('id'), $data);

      $datosCliente = array(
        'apellidos' => $this->input->post('apellidos'),
        'nombres' => $this->input->post('nombres')
      );

      $this->session->set_userdata($datosCliente);

      echo "<script type=\"text/javascript\">alert('Datos modificados.');</script>";
      $this->verModificarCliente();
    } else {
      $this->verModificarCliente();
    }
  }
}

