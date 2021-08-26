<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MiControlador extends CI_Controller {
  
  public function _construct() {
    parent::_construct();
  }

  public function index()
  {
    $data['titulo'] = 'Principal';
    $this->load->view('header',$data);
    $this->load->view('nav');
    $this->load->view('principal');
    $this->load->view('footer');
  }

  public function quienes_somos()
  {
    $data['titulo'] = 'Quienes Somos';
    $this->load->view('header',$data);
    $this->load->view('nav');
    $this->load->view('quienes-somos');
    $this->load->view('footer');
  }

  public function comercializacion()
  {
    $data['titulo'] = 'Comercializacion';
    $this->load->view('header',$data);
    $this->load->view('nav');
    $this->load->view('comercializacion');
    $this->load->view('footer');
  }

  public function contacto()
  {
    $data['titulo'] = 'Contacto';
    $this->load->view('header',$data);
    $this->load->view('nav');
    $this->load->view('contacto');
    $this->load->view('footer');
  }
  
  public function terminos()
  {
    $data['titulo'] = 'Terminos de Uso';
    $this->load->view('header',$data);
    $this->load->view('nav');
    $this->load->view('terminos');
    $this->load->view('footer');
  }
}
