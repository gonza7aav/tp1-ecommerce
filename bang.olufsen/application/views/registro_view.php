<div class="container shadow pb-5">
  <div class="w-75 mx-auto">
    <h2>Registro</h2>
    <?php echo form_open('Cliente_controller/registrarCliente'); ?>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Apellidos', 'apellidos'); ?>
          <?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('apellidos')]); ?>
          <span class="text-danger"><?php echo form_error('apellidos'); ?></span>
        </div>
        <div class="col">
          <?php echo form_label('Nombres', 'nombres'); ?>
          <?php echo form_input(['name' => 'nombres', 'id' => 'nombres', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('nombres')]); ?>            
          <span class="text-danger"><?php echo form_error('nombres'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <?php echo form_label('Email', 'email'); ?>
        <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'email', 'class' => 'form-control', 'value' => set_value('email')]); ?>
        <span class="text-danger"><?php echo form_error('email'); ?></span>
      </div>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Pais', 'pais'); ?>
          <?php echo form_input(['name' => 'pais', 'id' => 'pais', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('pais')]); ?>
          <span class="text-danger"><?php echo form_error('pais'); ?></span>
        </div>
        <div class="col">
          <?php echo form_label('Provincia', 'provincia'); ?>
          <?php echo form_input(['name' => 'provincia', 'id' => 'provincia', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('provincia')]); ?>            
          <span class="text-danger"><?php echo form_error('provincia'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <?php echo form_label('Ciudad', 'ciudad'); ?>
        <?php echo form_input(['name' => 'ciudad', 'id' => 'ciudad', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('ciudad')]); ?>
        <span class="text-danger"><?php echo form_error('ciudad'); ?></span>
      </div>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Calle', 'calle'); ?>
          <?php echo form_input(['name' => 'calle', 'id' => 'calle', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('calle')]); ?>
          <span class="text-danger"><?php echo form_error('calle'); ?></span>
        </div>
        <div class="col">
          <?php echo form_label('Altura', 'altura'); ?>
          <?php echo form_input(['name' => 'altura', 'id' => 'altura', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('altura')]); ?>            
          <span class="text-danger"><?php echo form_error('altura'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_label('Contrase??a', 'contrase??a'); ?>
          <?php echo form_input(['name' => 'contrase??a', 'id' => 'contrase??a', 'type' => 'password', 'class' => 'form-control', 'value' => set_value('contrase??a')]); ?>
          <span class="text-danger"><?php echo form_error('contrase??a'); ?></span>
        </div>
        <div class="col">
          <?php echo form_label('Repetir Contrase??a', 'repeticionContrase??a'); ?>
          <?php echo form_input(['name' => 'repeticionContrase??a', 'id' => 'repeticionContrase??a', 'type' => 'password', 'class' => 'form-control', 'value' => set_value('')]); ?>            
          <span class="text-danger"><?php echo form_error('repeticionContrase??a'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <div class="col">
          <?php echo form_checkbox(['name' => 'aceptoTerminos', 'id' => 'aceptoTerminos', 'value' => TRUE]); ?>
          Acepto los <a href="<?php echo base_url('terminos'); ?>" class="btn-link">Terminos de uso</a>.
          <span class="text-danger"><?php echo form_error('aceptoTerminos'); ?></span>
        </div>
      </div>

      <div class="form-group form-row">
        <?php echo form_submit('registrar', 'Registrar', ['class' => 'btn btn-outline-secondary w-25 mx-auto btn-sm']); ?>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>