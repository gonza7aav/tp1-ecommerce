<div class="container shadow">

  <h2><?php echo $titulo; ?></h2>
  <br>
  <div class="row">

    <?php foreach ($productos as $row) : ?>
      <div class="col-xs-12 col-md-6 col-xl-4">
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

                <?php if ($this->session->userdata('login') && $row->producto_estado == 1 && $row->producto_stock > 0) {
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
              <img src="<?php echo base_url('uploads/imagenes_producto/'.$row->producto_imagen); ?>" class="card-img" height="100" width="100">
            </div>
          </div>
          <?php if ($this->session->userdata('perfil') == 1) : ?>
            <div class="mx-auto pb-3">
              <a class="btn btn-outline-secondary btn-sm" href="<?php echo base_url("admin/modificar/".$row->producto_id); ?>">Modificar</a>

              <?php if ($row->producto_estado) { ?>
                <a class="btn btn-outline-danger btn-sm" href="<?php echo base_url("Producto_controller/desactivarProducto/".$row->producto_id); ?>">Desactivar</a>
              <?php } else { ?>
                <a class="btn btn-outline-success btn-sm" href="<?php echo base_url("Producto_controller/activarProducto/".$row->producto_id); ?>">Activar</a>
              <?php } ?>
              <br>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach ?>

  </div>
</div>