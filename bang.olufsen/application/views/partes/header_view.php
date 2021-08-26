<!DOCTYPE html>
<html lang="es">
<head>
  
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/estilo.css'); ?>" rel="stylesheet">
<link rel="icon" href="<?php echo base_url('assets/img/logos/favicon.ico'); ?>">

<title><?php echo $titulo; ?>  |  B&O</title>
  
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <img src="<?php echo base_url('assets/img/logos/logo.png'); ?>" width="30" height="30" class="d-inline-block align-top" alt="logo Bang & Olufsen">
      Bang & Olufsen
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto">

        <li class="nav-item">
          <div class="dropdown d-lg-none d-xl-none">
            <?php echo form_open('Producto_controller/verBusqueda'); ?>
              <div class="form-group form-row d-flex justify-content-around">
                <?php echo form_input(['name' => 'busqueda', 'id' => 'busqueda', 'type' => 'text', 'class' => 'form-control form-control-sm w-75', 'value' => set_value('busqueda')]); ?>
                <?php echo form_submit('buscar', 'Buscar', ['class' => 'btn btn-outline-secondary btn-sm']); ?>
              </div>
            <?php echo form_close(); ?>
          </div>
        </li>

        <li class="nav-item">
          <div class="dropdown d-lg-none d-xl-none">
            <a class="btn-link" href="<?php echo base_url('login'); ?>">Ingresar</a>
          </div>
        </li>
      </ul>

      <div class="d-none d-lg-block d-xl-block">
        <?php echo form_open('Producto_controller/verBusqueda'); ?>
          <div class="form-group form-row m-auto">
            <div class="col">
              <?php echo form_input(['name' => 'busqueda', 'id' => 'busqueda', 'type' => 'text', 'class' => 'form-control form-control-sm', 'value' => set_value('busqueda')]); ?>
            </div>
            <div class="col">
              <?php echo form_submit('buscar', 'Buscar', ['class' => 'btn btn-outline-secondary btn-sm']); ?>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>

      <div class="dropdown float-right d-none d-lg-block d-xl-block mr-4">
        <a class="btn-link" href="<?php echo base_url('login'); ?>">Ingresar</a>
      </div>
    </div>
  </nav>
</header>