<div class="container shadow pb-5">
  <div class="w-75 mx-auto">
    <h2>Inicio de Sesion</h2>
    <?php echo form_open('Usuario_controller/iniciarSesion'); ?>

      <div class="form-group form-row w-75 mx-auto">
        <?php echo form_label('Email', 'email'); ?>
          <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('email')]); ?>            
          <span class="text-danger"><?php echo form_error('email'); ?></span>
      </div>

      <div class="form-group form-row w-75 mx-auto">
        <?php echo form_label('Contraseña', 'contraseña'); ?>
        <?php echo form_input(['name' => 'contraseña', 'id' => 'contraseña', 'type' => 'password', 'class' => 'form-control', 'value' => set_value('contraseña')]); ?>
        <span class="text-danger"><?php echo form_error('contraseña'); ?></span>
      </div>

      <div class="form-group form-row w-75 mx-auto">
        <?php echo form_submit('ingresar', 'Ingresar', ['class' => 'btn btn-outline-secondary w-25 mx-auto btn-sm']); ?>
      </div>
      
    <?php echo form_close(); ?>

  </div>
  <div class="text-center">
    <a class="btn-link" href="<?php echo base_url('registro'); ?>">Registrate</a>
   </div>
</div>