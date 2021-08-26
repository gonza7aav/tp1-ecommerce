<div class="container shadow">

  <div class="form-group form-row">
    <div class="col">
      <h2>Compras</h2>
    </div>
    <div class="col">
        <?php
          $lista['0'] = 'Mas antiguo primero';
          $lista['1'] = 'Mas nuevo primero';
          echo form_dropdown('orden', $lista, $orden, ['id' => 'orden', 'class' => 'form-control w-50 float-right', 'onchange' => 'ordenar()']);
        ?>
    </div>
  </div>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Factura</th>
        <?php if ($id_recibida == 0) : ?>
          <th scope="col">Cliente</th>
        <?php endif; ?>
        <th scope="col">Fecha</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($compras as $compraItem) : ?>
        <tr>
          <th scope="row"> <?php echo $compraItem->compra_id; ?> </th>
          <?php if ($id_recibida == 0) : ?>
            <td> <?php echo $compraItem->cliente_apellidos; ?> </td>
          <?php endif; ?>
          <td> <?php echo $compraItem->compra_fecha; ?> </td>
          <td>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#Modal<?php echo $compraItem->compra_id; ?>">
              Ver mas
            </button>

            <div class="modal fade" id="Modal<?php echo $compraItem->compra_id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel<?php echo $compraItem->compra_id; ?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel<?php echo $compraItem->compra_id; ?>">Compra #<?php echo $compraItem->compra_id; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><b>Cliente:</b> <?php echo $compraItem->cliente_apellidos; ?> </p>
                    <p> <?php echo $compraItem->compra_fecha; ?> </p>
                    <div class="dropdown-divider"></div>

                    <table class="table table-hover table-responsive">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      <?php $total = 0; ?>
                      <?php foreach ($detallecompras as $detalleItem): ?>
                        <?php if ($detalleItem->detallecompra_compra == $compraItem->compra_id) : ?>
                          <tr>
                            <td>
                              <?php foreach ($productos as $productoItem): ?> 
                                <?php if ($productoItem->producto_id == $detalleItem->detallecompra_producto): ?>
                                  <?php echo $productoItem->producto_nombre; ?>
                                <?php endif ?>
                              <?php endforeach ?>
                            </td>
                            <td> <?php echo $detalleItem->detallecompra_cantidad; ?> </td>
                            <td> <?php echo $this->cart->format_number($detalleItem->detallecompra_precio); ?> </td>
                            <td> <?php echo $this->cart->format_number($detalleItem->detallecompra_precio * $detalleItem->detallecompra_cantidad); ?> </td>
                            <?php $total += $detalleItem->detallecompra_precio * $detalleItem->detallecompra_cantidad; ?>
                          </tr>
                        <?php endif ?>
                      <?php endforeach ?>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col">Total</th>
                          <th scope="col">$<?php echo $this->cart->format_number($total); ?></th>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>

        <?php endforeach ?>

    </tbody>
  </table>
</div>

<script>
  function ordenar() {
    <?php if ($id_recibida == 0) { $url = "admin/compras/"; } else { $url = "compras/".$id_recibida."/"; } ?>
    switch (document.getElementById("orden").value) {
      case '0': {
        window.location = "<?php echo base_url($url."ASC"); ?>";
        break;
      }
      case '1': {
        window.location = "<?php echo base_url($url."DESC"); ?>";
        break;
      }
    }
  }
</script>