<div class="container shadow pb-5">
  <div class="w-75 mx-auto">
    <h2>Mis datos</h2>
    <?php echo form_open('Cliente_controller/modificarCliente/'); ?>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Apellidos', 'apellidos'); ?>
          <?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('apellidos', $cliente->cliente_apellidos)]); ?>
          <span class="text-danger"><?php echo form_error('apellidos'); ?></span>
        </div>
        <div class="col">
          <?php echo form_label('Nombres', 'nombres'); ?>
          <?php echo form_input(['name' => 'nombres', 'id' => 'nombres', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('nombres', $cliente->cliente_nombres)]); ?>            
          <span class="text-danger"><?php echo form_error('nombres'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Pais', 'pais'); ?>
          <?php echo form_input(['name' => 'pais', 'id' => 'pais', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('pais', $cliente->cliente_pais)]); ?>
          <span class="text-danger"><?php echo form_error('pais'); ?></span>
        </div>
        <div class="col">
          <?php echo form_label('Provincia', 'provincia'); ?>
          <?php echo form_input(['name' => 'provincia', 'id' => 'provincia', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('provincia', $cliente->cliente_provincia)]); ?>            
          <span class="text-danger"><?php echo form_error('provincia'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <?php echo form_label('Ciudad', 'ciudad'); ?>
        <?php echo form_input(['name' => 'ciudad', 'id' => 'ciudad', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('ciudad', $cliente->cliente_ciudad)]); ?>
        <span class="text-danger"><?php echo form_error('ciudad'); ?></span>
      </div>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Calle', 'calle'); ?>
          <?php echo form_input(['name' => 'calle', 'id' => 'calle', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('calle', $cliente->cliente_calle)]); ?>
          <span class="text-danger"><?php echo form_error('calle'); ?></span>
        </div>
        <div class="col">
          <?php echo form_label('Altura', 'altura'); ?>
          <?php echo form_input(['name' => 'altura', 'id' => 'altura', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('altura', $cliente->cliente_altura)]); ?>            
          <span class="text-danger"><?php echo form_error('altura'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <?php echo form_submit('modificar', 'Modificar', ['class' => 'btn btn-outline-secondary w-25 mx-auto btn-sm']); ?>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>