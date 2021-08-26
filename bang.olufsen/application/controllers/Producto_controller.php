<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_controller extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->load->model('Producto_model');
  }

  public function verListado($categoria, $pagina) {
    if ($this->session->userdata('perfil') == 1) {
      $data['titulo'] = 'Listado';
      $data['categorias'] = $this->Producto_model->selectCategorias();
      $data['categoria'] = $categoria;

      $porPagina = 6;
      $data['productos'] = $this->Producto_model->obtenerProductosPaginacion($categoria, $porPagina, $pagina);
      $this->load->library('pagination');
      $url = "admin/listado/";
      switch ($categoria) {
        case 1: $url = $url."parlantes/"; break;
        case 2: $url = $url."auriculares/"; break;
        case 3: $url = $url."televisores/"; break;
        case 4: $url = $url."accesorios/"; break;
      }
      $this->pagination->initialize($this->configurarPaginacion(
        $url,
        count ($this->Producto_model->obtenerProductos($categoria)),
        $porPagina
      ));


      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');
      $this->load->view('admin/listado_producto_view', $data);
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }

  public function verRegistro() {
    if ($this->session->userdata('perfil') == 1) {
      $data['titulo'] = 'Registro';

      $data['categoria'] = $this->Producto_model->selectCategorias();

      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');
      $this->load->view('admin/registro_producto_view', $data);
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }

  public function verCatalogo($categoria, $pagina) {
    switch ($categoria) {
      case 0:
        $data['titulo'] = 'Catalogo';
        $url = "catalogo/";
        break;
      case 1:
        $data['titulo'] = 'Parlantes';
        $url = "catalogo/parlantes/";
        break;
      case 2:
        $data['titulo'] = 'Auriculares';
        $url = "catalogo/auriculares/";
        break;
      case 3:
        $data['titulo'] = 'Televisores';
        $url = "catalogo/televisores/";
        break;
      case 4:
        $data['titulo'] = 'Accesorios';
        $url = "catalogo/accesorios/";
        break;
    }
    $porPagina = 6;
    $this->load->library('pagination');
    $this->pagination->initialize($this->configurarPaginacion(
      $url,
      count ($this->Producto_model->obtenerCatalogo($categoria)),
      $porPagina
    ));

    $data['productos'] = $this->Producto_model->obtenerCatalogoPaginacion($categoria, $porPagina, $pagina);

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view', $data);
    }

    $this->load->view('partes/nav_view');
    $this->load->view('catalogo_view', $data);
    $this->load->view('partes/footer_view');
  }

  public function verOferta($pagina) {
    $data['titulo'] = 'Ofertas';

    $porPagina = 6;
    $this->load->library('pagination');
    $this->pagination->initialize($this->configurarPaginacion(
      "catalogo/ofertas/",
      count ($this->Producto_model->obtenerOfertas()),
      $porPagina
    ));

    $data['productos'] = $this->Producto_model->obtenerOfertasPaginacion($porPagina, $pagina);

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view', $data);
    }

    $this->load->view('partes/nav_view');
    $this->load->view('catalogo_view', $data);
    $this->load->view('partes/footer_view');
  }


  function verificarCampos($esRegistro) {
    $this->form_validation->set_rules('nombre', 'Nombre del Producto', 'required');
    $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
    $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
    $this->form_validation->set_rules('categoria', 'Seleccionar una categoria', 'required|callback_validarSelect');
    $this->form_validation->set_rules('stock', 'Stock', 'required|is_natural');
    if ($esRegistro) {
      $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validarImagen');
    } else {
      $this->form_validation->set_rules('oferta', 'Oferta', 'required|numeric');
    }

    $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
    $this->form_validation->set_message('numeric', 'El campo %s debe poseer un numero.');
    $this->form_validation->set_message('is_natural', 'El campo %s debe poseer un numero natural.');

    if ($this->form_validation->run()) {
      return true;
    } else {
      return false;
    }
  }

  public function insertarProducto() {
    if ($this->verificarCampos(true)) {
      $config['upload_path'] = './uploads/imagenes_producto';
      $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
      $config['remove_spaces'] = TRUE;
      $config['max_size'] = '1024'; //KiloBytes

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('imagen')) {
        echo "<script type=\"text/javascript\">alert('No se puso cargar el archivo.');</script>";
        $this->verRegistro();
      } else {

        $producto = array(
          'producto_categoria' => $this->input->post('categoria'),
          'producto_nombre' => $this->input->post('nombre'),
          'producto_descripcion' => $this->input->post('descripcion'),
          'producto_precio' => $this->input->post('precio'),
          'producto_oferta' => 0,
          'producto_stock' => $this->input->post('stock'),
          'producto_imagen' => $_FILES['imagen']['name'],
          'producto_estado' => 1
        );
        
        $this->Producto_model->registrarProducto($producto);

        echo "<script type=\"text/javascript\">alert('Producto registrado.');</script>";
        $this->verListado(0, 0);
      }
    } else {
      $this->verRegistro();
    }
  }

  public function validarSelect($categoria) {
    if ($categoria == "0") {
      $this->form_validation->set_message('validarSelect', 'Seleccione una categoria');
      return false;
    } else {
      return true;
    }
  }

  public function validarImagen($imagen) {
    $nombre_imagen = $_FILES['imagen']['name']; //obtiene el nombre de la imagen
    if (empty($nombre_imagen)) {
      $this->form_validation->set_message('validarImagen', 'Seleccione una imagen');
      return false;
    } else {
      return true;
    }
  }

  public function verModificarProducto($id) {
    if ($this->session->userdata('perfil') == 1) {
      $data['titulo'] = 'Modificar';

      $data['categoria'] = $this->Producto_model->selectCategorias();
      $data['producto'] = $this->Producto_model->buscarProducto($id);

      $this->load->view('partes/header_usuario_view', $data);
      $this->load->view('partes/nav_view');
      $this->load->view('admin/modificar_producto_view', $data);
      $this->load->view('partes/footer_view');
    } else {
      redirect('acceso_invalido');
    }
  }

  public function modificarProducto($id) {
    if ($this->verificarCampos(false)) {
      if (empty($_FILES['imagen']['name'])) {
        $data = array(
          'producto_nombre' => $this->input->post('nombre'),
          'producto_descripcion' => $this->input->post('descripcion'),
          'producto_precio' => $this->input->post('precio'),
          'producto_oferta' => $this->input->post('oferta'),
          'producto_categoria' => $this->input->post('categoria'),
          'producto_stock' => $this->input->post('stock')
        );
      } else {
        $data = array(
          'producto_nombre' => $this->input->post('nombre'),
          'producto_descripcion' => $this->input->post('descripcion'),
          'producto_precio' => $this->input->post('precio'),
          'producto_oferta' => $this->input->post('oferta'),
          'producto_categoria' => $this->input->post('categoria'),
          'producto_stock' => $this->input->post('stock'),
          'producto_imagen' => $_FILES['imagen']['name']
        );

        $config['upload_path'] = './uploads/imagenes_producto';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
        $config['remove_spaces'] = TRUE;
        $config['max_size'] = '1024'; //KiloBytes

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('imagen')) {
          echo "<script type=\"text/javascript\">alert('No se puso cargar el archivo.');</script>";
          $this->verModificarProducto($id);
        }
      }
      
      $this->Producto_model->actualizarProducto($id, $data);

      echo "<script type=\"text/javascript\">alert('Producto modificado.');</script>";
      $this->verListado(0, 0);
    } else {
      $this->verModificarProducto($id);
    }
  }

  public function activarProducto($id) {
   $data = array(
      'producto_estado' => 1
    );
    
    $this->Producto_model->actualizarProducto($id, $data);

    redirect('admin/listado'); 
  }

  public function desactivarProducto($id) {
   $data = array(
      'producto_estado' => 0
    );
    
    $this->Producto_model->actualizarProducto($id, $data);

    redirect('admin/listado'); 
  }

  private function configurarPaginacion($url, $total, $porPagina) {
    $config['base_url'] = base_url($url);
    $config['total_rows'] = $total;
    $config['per_page'] = $porPagina;
    $config['num_links'] = 1;

    $config['first_link'] = '<<';
    $config['prev_link'] = '<';
    $config['next_link'] = '>';
    $config['last_link'] = '>>';

    $config['full_tag_open'] = '<ul class="pagination justify-content-end">';
    $config['full_tag_close'] = '</ul>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');

    return $config;
  }

  public function verBusqueda() {
    $data['titulo'] = 'Busqueda';

    $busqueda = $this->input->post('busqueda');
    $data['productos'] = $this->Producto_model->buscarCoincidencias($busqueda);

    if ($this->session->userdata('login')) {
      $this->load->view('partes/header_usuario_view', $data);
    } else {
      $this->load->view('partes/header_view', $data);
    }

    $this->load->view('partes/nav_view');
    $this->load->view('busqueda_view', $data);
    $this->load->view('partes/footer_view');
  }
}

