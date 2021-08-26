<div class="container shadow">
  <h2>Consultas pendientes</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Categoria</th>
        <th scope="col">Descripcion</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($consultas as $row) : ?>
        <?php if ($row->consulta_estado) : ?>
          <tr>
            <th scope="row"> <?php echo $row->consulta_id; ?> </th>
            <td> <?php echo $row->consulta_categoria; ?> </td>
            <td> <?php echo $row->consulta_texto; ?> </td>
            <td>
              <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#Modal<?php echo $row->consulta_id; ?>">
                Ver mas
              </button>

              <div class="modal fade" id="Modal<?php echo $row->consulta_id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel<?php echo $row->consulta_id; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ModalLabel<?php echo $row->consulta_id; ?>">Consulta #<?php echo $row->consulta_id; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p><b>Categoria:</b> <?php echo $row->consulta_categoria; ?> </p>
                      <p> <?php echo $row->consulta_texto; ?> </p>
                      <div class="dropdown-divider"></div>
                      <p><b>Apellidos:</b> <?php echo $row->consulta_apellidos; ?> </p>
                      <p><b>Nombres:</b> <?php echo $row->consulta_nombres; ?> </p>
                      <p><b>Email:</b> <?php echo $row->consulta_email; ?> </p>
                      <p><b>Telefono:</b> <?php echo $row->consulta_telefono; ?> </p>
                    </div>
                    <div class="modal-footer">
                      <?php echo form_open('Consulta_controller/desactivarConsulta/'.$row->consulta_id); ?>
                        <?php echo form_submit('realizar', 'Realizar', ['class' => 'btn btn-outline-success btn-sm']); ?>
                      <?php echo form_close(); ?>
                      <!--<a class="btn btn-success" data-dismiss="modal" href="#">Realizar</a>-->
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endif ?>
      <?php endforeach ?>

    </tbody>
  </table>

  <hr>

  <h2>Consultas realizadas</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Categoria</th>
        <th scope="col">Descripcion</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($consultas as $row) : ?>
        <?php if ($row->consulta_estado == false) : ?>
          <tr>
            <th scope="row"> <?php echo $row->consulta_id; ?> </th>
            <td> <?php echo $row->consulta_categoria; ?> </td>
            <td> <?php echo $row->consulta_texto; ?> </td>
            <td>
              <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#Modal<?php echo $row->consulta_id; ?>">
                Ver mas
              </button>

              <div class="modal fade" id="Modal<?php echo $row->consulta_id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel<?php echo $row->consulta_id; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ModalLabel<?php echo $row->consulta_id; ?>">Consulta #<?php echo $row->consulta_id; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p><b>Categoria:</b> <?php echo $row->consulta_categoria; ?> </p>
                      <p> <?php echo $row->consulta_texto; ?> </p>
                      <div class="dropdown-divider"></div>
                      <p><b>Apellidos:</b> <?php echo $row->consulta_apellidos; ?> </p>
                      <p><b>Nombres:</b> <?php echo $row->consulta_nombres; ?> </p>
                      <p><b>Email:</b> <?php echo $row->consulta_email; ?> </p>
                      <p><b>Telefono:</b> <?php echo $row->consulta_telefono; ?> </p>
                    </div>
                    <div class="modal-footer">
                      <?php echo form_open('Consulta_controller/activarConsulta/'.$row->consulta_id); ?>
                        <?php echo form_submit('deshacer', 'Deshacer', ['class' => 'btn btn-outline-danger btn-sm']); ?>
                      <?php echo form_close(); ?>
                      <!--<a class="btn btn-success" data-dismiss="modal" href="#">Deshacer</a>-->
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endif ?>
      <?php endforeach ?>

    </tbody>
  </table>
</div>
