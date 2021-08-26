<div class="container shadow">
  <div class="row">
    <div class="col-md-6 col-lg-7">
      <h3>Escribenos sus preguntas</h3>

      <!-- <form> -->
      <?php echo form_open('Consulta_controller/registrarConsulta'); ?>
        <div class="form-group form-row">
          <div class="col">
            <!-- <label for="nombre">Nombre</label> -->
            <?php echo form_label('Nombres', 'nombres'); ?>
            <!-- <input type="text" class="form-control" id="nombre"> -->
            <?php echo form_input(['name' => 'nombres', 'id' => 'nombres', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('nombres', $this->session->userdata('nombres') )]); ?>
          </div>
          <div class="col">
            <!-- <label for="apellido">Apellido *</label> -->
            <?php echo form_label('Apellidos', 'apellidos'); ?>
            <span class="text-danger"><?php echo form_error('apellidos'); ?></span>
            <!-- <input type="text" class="form-control" id="apellido" required> -->
            <?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('apellidos', $this->session->userdata('apellidos') )]); ?>
          </div>
        </div>

        <div class="form-group">
          <!-- <label for="email">Email *</label> -->
          <?php echo form_label('Email', 'email'); ?>

          <span class="text-danger"><?php echo form_error('email'); ?></span>

          <!-- <input type="email" class="form-control" id="email" required> -->
          <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'email', 'class' => 'form-control', 'value' => set_value('email', $this->session->userdata('email') )]); ?>
        </div>

        <div class="form-group form-row">
          <div class="col">
            <!-- <label for="telefono">Telefono</label> -->
            <?php echo form_label('Telefono', 'telefono'); ?>
            <!-- <input type="text" class="form-control" id="telefono"> -->
            <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'type' => 'text', 'class' => 'form-control', 'value' => set_value('telefono')]); ?>
          </div>
          <div class="col form-group">
            <!-- <label for="categoria">Categoria *</label> -->
            <?php echo form_label('Categoria', 'categoria'); ?>
            <!-- <select class="form-control" id="categoria" required>
              <option>Compras</option>
              <option>Envios</option>
              <option>Productos</option>
              <option>Cuenta</option>
              <option>Empresarial</option>
            </select> -->
            <select class="form-control" id="categoria" name="categoria" required>
              <option value="compra" <?php echo set_select('categoria', 'compra'); ?>>Compras</option>
              <option value="envio" <?php echo set_select('categoria', 'envio'); ?>>Envios</option>
              <option value="producto" <?php echo set_select('categoria', 'producto'); ?>>Productos</option>
              <option value="cuenta" <?php echo set_select('categoria', 'cuenta'); ?>>Cuenta</option>
              <option value="empresa" <?php echo set_select('categoria', 'empresa'); ?>>Empresarial</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <!-- <label for="FormControlTextarea">Sus consultas *</label> -->
          <?php echo form_label('Sus consultas', 'FormControlTextarea'); ?>

          <span class="text-danger"><?php echo form_error('consulta'); ?></span>

          <!-- <textarea class="form-control" id="FormControlTextarea" rows="5" required></textarea> -->
          <?php echo form_textarea(['name' => 'consulta', 'id' => 'FormControlTextarea', 'rows' => '5', 'maxlength' => '150', 'class' => 'form-control', 'value' => set_value('consulta')]); ?>
        </div>

        <!-- <button type="submit" class="btn btn-outline-secondary float-right">Enviar</button> -->
        <?php echo form_submit('enviar', 'Enviar', ['class' => 'btn btn-outline-secondary']); ?>
      <!-- </form> -->
      <?php echo form_close(); ?>

    </div>
    
    <div class="col-md-6 col-lg-5 ">
      <h3>Informacion de Contacto</h3>
      <p>Aguirre, Gonzalo Adolfo</p>
      <p>Bang & Olufsen S.A.</p>

      <p>
        9 de Julio 1449, 3400 Corrientes, Argentina <br>
        <a href="" class="btn-link" data-toggle="modal" data-target="#ModalDireccion">
          ver en el mapa
        </a>

        <div class="modal fade" id="ModalDireccion" tabindex="-1" role="dialog" aria-labelledby="ModalDireccionTitulo" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalDireccionTitulo">9 de Julio 1449, 3400 Corrientes, Argentina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-auto">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d442.5093563191351!2d-58.8324065!3d-27.466929!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb92ce3fedb0d7729!2sUnne+FaCENA+Centro!5e0!3m2!1sen!2sar!4v1554972457754!5m2!1sen!2sar" width="400" height="300" frameborder="1" style="border:1px solid black" allowfullscreen></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </p>

      <p>+54 379 000 000</p>
      <br>

    </div>

  </div>
</div>