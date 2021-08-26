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

    <form class="form-inline d-none d-md-block d-lg-block d-xl-block offset-lg-1">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto">
        <li class="nav-item">
          <form class="form-inline d-md-none d-lg-none d-xl-none">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link item-link" href="<?php echo base_url('ingreso'); ?>" tabindex="-1" aria-disabled="true">Ingresar</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link item-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mi Cuenta
            </a>
            <div class="dropdown-menu bg-light" aria-labelledby="dropdownenuLink">
              <a class="dropdown-item" href="<?php echo base_url('pedidos'); ?>">Mis Pedidos</a>
              <a class="dropdown-item" href="<?php echo base_url('configuracion'); ?>">Configuracion</a>
              <a class="dropdown-item" href="<?php echo base_url('salir'); ?>">Salir</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link item-link d-lg-none d-xl-none" href="<?php echo base_url('carro'); ?>">Carro</a>
        </li>
      </ul>

      <a class="nav-item float-right d-none d-lg-block d-xl-block" href="<?php echo base_url('carro'); ?>">
        <img src="<?php echo base_url('assets/img/logos/carro.png'); ?>" width="20" height="20" alt="carro de compra">
      </a>
    </div>
  </nav>
</header>