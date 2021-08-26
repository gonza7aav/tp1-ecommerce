<div class="container shadow">

  <div class="w-75 mx-auto">
    <h2>Registro</h2>
    <?php echo form_open_multipart('Producto_controller/insertarProducto'); ?>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Nombre del Producto', 'nombre'); ?>
          <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('nombre')]); ?>            
          <span class="text-danger"><?php echo form_error('nombre'); ?></span>
        </div>
      </div>
      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Descripcion', 'descripcion'); ?>
          <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('descripcion')]); ?>
          <span class="text-danger"><?php echo form_error('descripcion'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Precio', 'precio'); ?>
          <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'type' => 'number', 'step' => '0.01', 'class' => 'form-control', 'value' => set_value('precio')]); ?>
          <span class="text-danger"><?php echo form_error('precio'); ?></span>
        </div>

        <div class="col">
          <?php echo form_label('Categoria', 'categoria'); ?>

          <?php
            $lista['0'] = 'Seleccione una categoria';
            foreach ($categoria as $row) {
              $lista[$row->categoria_id] = $row->categoria_nombre;
            }
            echo form_dropdown('categoria', $lista,'0','class="form-control"');
          ?>

          <span class="text-danger"><?php echo form_error('categoria'); ?></span>
        </div>

        <div class="col">
          <?php echo form_label('Stock', 'stock'); ?>
          <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'type' => 'number', 'class' => 'form-control', 'value' => set_value('stock')]); ?>
          <span class="text-danger"><?php echo form_error('stock'); ?></span>
        </div>
      </div>
      
      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Imagen', 'imagen'); ?>
          <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => '', 'value' => set_value('imagen')]); ?>
          <span class="text-danger"><?php echo form_error('imagen'); ?></span>
        </div>
      </div>
      <div class="form-group form-row">
        <?php echo form_submit('añadir', 'Añadir', ['class' => 'btn btn-outline-secondary w-25 mx-auto btn-sm']); ?>
      </div>
    <?php echo form_close(); ?>
  </div>

</div>
