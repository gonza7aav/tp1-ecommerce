<div class="container shadow">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Administrador</h1>
    <p class="lead"></p>
  </div>
</div>

<h2>Los más vendidos</h2>
<div class="row">
  <?php $contador = 0; ?>
  <?php foreach ($productos as $row) : ?>
    <?php if ($contador < 3) { ?>
      <div class="col-xs-12 col-md-6 col-xl-4">
        <div class="card mb-3 mx-center">
          <div class="row no-gutters">
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"> <?php echo $row->producto_nombre; ?> </h5>
                <p class="card-text"> <?php echo $row->detallecompra_cantidad; ?> vendidos </p>

                <?php if ($row->producto_oferta > 0) { ?>
                  <p class="card-text"><s><small class="text-muted">$<?php echo $this->cart->format_number($row->producto_precio); ?> </small></s>
                      <small class="text-danger"> $<?php echo $this->cart->format_number(($row->producto_precio - ($row->producto_precio * $row->producto_oferta / 100)));?></small>
                  </p>
                <?php } else { ?>
                  <p class="card-text"><small class="text-muted">$<?php echo $this->cart->format_number($row->producto_precio); ?> </small></p>
                <?php } ?>


                <?php if ($row->producto_oferta <= 0) {
                  echo form_open('Producto_controller/verModificarProducto/'.$row->producto_id);
                  echo form_submit('ofertar', 'Poner en oferta', 'class="btn btn-outline-success btn-sm"');
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
<hr>

<h2>Porcentajes de ventas</h2>
<div class="row">
  <!-- arreglar -->
  <div class="card-group mx-3 w-100">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Parlantes</h5>
        <p class="card-text"><?php echo $this->cart->format_number(100 * $ventas[0] / $ventasTotal); ?>%</p>
        <p class="card-text"><small class="text-muted"><?php echo $ventas[0]; ?> vendidos</small></p>
      </div>
    </div>
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Auriculares</h5>
        <p class="card-text"><?php echo $this->cart->format_number(100 * $ventas[1] / $ventasTotal); ?>%</p>
        <p class="card-text"><small class="text-muted"><?php echo $ventas[1]; ?> vendidos</small></p>
      </div>
    </div>
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Televisores</h5>
        <p class="card-text"><?php echo $this->cart->format_number(100 * $ventas[2] / $ventasTotal); ?>%</p>
        <p class="card-text"><small class="text-muted"><?php echo $ventas[2]; ?> vendidos</small></p>
      </div>
    </div>
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Accesorios</h5>
        <p class="card-text"><?php echo $this->cart->format_number(100 * $ventas[3] / $ventasTotal); ?>%</p>
        <p class="card-text"><small class="text-muted"><?php echo $ventas[3]; ?> vendidos</small></p>
      </div>
    </div>
  </div>
</div>

</div>
