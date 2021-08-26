<div class="container shadow">

  <div class="form-group form-row">
    <div class="col">
      <h2>Listado</h2>
    </div>
    <div class="col">
        <?php
          $lista['0'] = 'Seleccione una categoria';
          foreach ($categorias as $row) {
            $lista[$row->categoria_id] = $row->categoria_nombre;
          }
          echo form_dropdown('categoria', $lista, $categoria, ['id' => 'categoria', 'class' => 'form-control w-50 float-right', 'onchange' => 'filtrarCategoria()']);
        ?>
    </div>
  </div>

  <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Categoria</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Stock</th>
        <th scope="col">Precio</th>
        <th scope="col">Oferta</th>
        <th scope="col">Imagen</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $row) : ?>
          <tr>
            <th scope="row"> <?php echo $row->producto_id; ?> </th>
            <td> <?php echo $row->categoria_nombre; ?> </td>
            <td> <?php echo $row->producto_nombre; ?> </td>
            <td> <?php echo $row->producto_descripcion; ?> </td>
            <td> <?php echo $row->producto_stock; ?> </td>
            <td>$<?php echo $this->cart->format_number($row->producto_precio); ?> </td>
            <td><?php echo $row->producto_oferta; ?>%</td>
            <td>
              <img src="<?php echo base_url('uploads/imagenes_producto/'.$row->producto_imagen); ?>" height="100" width="100" style="object-fit: contain;">
            </td>
            <td>
              <a class="btn btn-outline-secondary btn-sm" href="<?php echo base_url("admin/modificar/".$row->producto_id); ?>">Modificar</a>
            </td>
            <td>
              <?php if ($row->producto_estado) { ?>
                <a class="btn btn-outline-danger btn-sm" href="<?php echo base_url("Producto_controller/desactivarProducto/".$row->producto_id); ?>">Desactivar</a>
              <?php } else { ?>
                <a class="btn btn-outline-success btn-sm" href="<?php echo base_url("Producto_controller/activarProducto/".$row->producto_id); ?>">Activar</a>
              <?php } ?>
            </td>
          </tr>

        <?php endforeach ?>

    </tbody>
  </table>
  
  <?php echo $this->pagination->create_links(); ?>

</div>

<script>
  function filtrarCategoria() {
    switch (document.getElementById("categoria").value) {
      case '0': {
        window.location = "<?php echo base_url("admin/listado"); ?>";
        break;
      }
      case '1': {
        window.location = "<?php echo base_url("admin/listado/parlantes"); ?>";
        break;
      }
      case '2': {
        window.location = "<?php echo base_url("admin/listado/auriculares"); ?>";
        break;
      }
      case '3': {
        window.location = "<?php echo base_url("admin/listado/televisores"); ?>";
        break;
      }
      case '4': {
        window.location = "<?php echo base_url("admin/listado/accesorios"); ?>";
        break;
      }
    }
  }
</script>