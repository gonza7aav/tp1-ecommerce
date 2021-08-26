<div class="container shadow">

  <!--<section>
    <div class="card mb-3 border-white">
      <div class="row no-gutters">
        <div class="col-md-6">
          <div class="card-body">
            <h1 class="card-title">Colección Verano 2019</h1>
            <p class="card-text">Inspirada en los sutiles y etéreos colores de un verano escandinavo, la colección Bang & Olufsen Verano 2019 captura la belleza única del norte. Desde el suelo, elevándonos, atravesando el bosque y hacia el cielo, estamos introduciendo una nueva paleta de colores: Arcilla. Pino. Cielo.</p>
            <a class="btn btn-outline-secondary" href="<?php echo base_url('verano2019'); ?>">Conocé más</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="carousel slide mx-auto" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/verano2019/verano2019-arcilla.jpg'); ?>" width="500" height="500">
              </div>
              <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/verano2019/verano2019-pino.jpg'); ?>" width="500" height="500">
              </div>
              <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/verano2019/verano2019-cielo.jpg'); ?>" width="500" height="500">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="jumbotron fondo-img text-light" style="background-image: url('<?php echo base_url('assets/img/ejemplo-beosound-shape.jpg'); ?>');">
      <h1 class="display-4 text-uppercase">Beosound Shape</h1>
      <p class="lead">Lo mejor de Øivind Alexander Slaato</p>
      <hr class="my-4 bg-light">
      <p class="text-right">BeoSound Shape es un sistema de parlantes inalámbricos de pared para amantes de la música conscientes del diseño, que ofrece una puesta en escena de sonido envolvente, un diseño personalizable y amortiguadores de ruido integrados para mejorar la acústica de la habitación.</p>
      <a class="btn btn-outline-light btn-lg float-right" href="<?php echo base_url('beosound-shape'); ?>" role="button">Conocé más</a>
      <br>
    </div>
  </section>-->

  <section>
    <div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo base_url('assets/img/ejemplo-auriculares2.jpg'); ?>" class="d-block w-100" height="250px" style="object-fit: cover; object-position: 50% 65%;">
            <div class="carousel-caption d-sm-block">
              <h5>¿Qué estas esperando?</h5>
              <a class="btn btn-outline-secondary btn-lg" href="<?php echo base_url('login'); ?>" role="button">Registrate</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/forma-pago.jpg'); ?>" class="d-block w-100" height="250px" style="object-fit: cover; object-position: 50% 55%;">
            <div class="carousel-caption d-sm-block">
              <h5>Formas de Pago</h5>
              <p>Aceptamos todas las tarjetas.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/ejemplo-parlantes2.jpg'); ?>" class="d-block w-100" height="250px" style="object-fit: cover; object-position: 50% 0%;">
            <div class="carousel-caption d-sm-block">
              <h5>Todos los accesorios</h5>
              <a class="btn btn-outline-secondary btn-lg" href="<?php echo base_url('catalogo/accesorios'); ?>" role="button">Compra ya</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
    </div>
  </section>

  <section>
    <div class="row">
      <div class="col-md-6">
        <div class="text-center item-link">
          <a href="<?php echo base_url('catalogo'); ?>">
            <img src="<?php echo base_url('assets/img/b&o-catalogo.jpg'); ?>" width="337" height="190">
            <h2>Catalogo</h2>
          </a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="text-center item-link">
          <a href="<?php echo base_url('catalogo/ofertas'); ?>">
            <img src="<?php echo base_url('assets/img/b&o-ofertas.jpg'); ?>" width="337" height="190">
            <h2>Ofertas</h2>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section>
    <h2>Los más vendidos</h2>
    <div class="row">
      <?php $contador = 0; ?>
      <?php foreach ($productos as $row) : ?>
        <?php if ($contador < 2) { ?>
          <div class="col-xs-12 col-md-6 col-xl-6">
            <div class="card mb-3 mx-center">
              <div class="row no-gutters">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"> <?php echo $row->producto_nombre; ?> </h5>
                    <p class="card-text"> <?php echo $row->producto_descripcion; ?> </p>
                    <?php if ($row->producto_oferta > 0) { ?>
                      <p class="card-text"><s><small class="text-muted">$<?php echo $this->cart->format_number($row->producto_precio); ?> </small></s>
                          <small class="text-danger"> $<?php echo $this->cart->format_number(($row->producto_precio - ($row->producto_precio * $row->producto_oferta / 100)));?></small>
                      </p>
                    <?php } else { ?>
                      <p class="card-text"><small class="text-muted">$<?php echo $this->cart->format_number($row->producto_precio); ?> </small></p>
                    <?php } ?>

                    <?php if ($this->session->userdata('perfil') == 2) {
                      echo form_open('Carrito_controller/agregar');

                      echo form_hidden('id', $row->producto_id);
                      echo form_hidden('nombre', $row->producto_nombre);
                      echo form_hidden('precio', $row->producto_precio - ($row->producto_precio * $row->producto_oferta / 100));

                      echo form_submit('comprar', 'agregar al carrito', 'class="btn btn-outline-secondary btn-sm"');

                      echo form_close();
                     } ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="<?php echo base_url('uploads/imagenes_producto/'.$row->producto_imagen); ?>" class="card-img" height="100" width="100" style="object-fit: contain;">
                </div>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <?php break; ?>
        <?php } ?>
        <?php $contador += 1; ?>
      <?php endforeach; ?>
    </div>
  </section>

</div>