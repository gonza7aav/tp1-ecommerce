<div class="container shadow">
  <div class="row">
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

    <div class="col-md-6 col-lg-7">
      <h3>Escribenos sus preguntas</h3>

      <form>
        <div class="form-group form-row">
          <div class="col">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre">
          </div>
          <div class="col">
            <label for="apellido">Apellido *</label>
            <input type="text" class="form-control" id="apellido" required>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" class="form-control" id="email" required>
        </div>

        <div class="form-group form-row">
          <div class="col">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono">
          </div>
          <div class="col form-group">
            <label for="FormControlSelect">Categoria *</label>
            <select class="form-control" id="FormControlSelect" required>
              <option>Compras</option>
              <option>Envios</option>
              <option>Productos</option>
              <option>Cuenta</option>
              <option>Empresarial</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="FormControlTextarea">Sus consultas *</label>
          <textarea class="form-control" id="FormControlTextarea" rows="5" required></textarea>
        </div>

        <div class="form-group form-row">
          <div class="col">
            <label for="FormControlFile">Adjuntar</label>
            <input type="file" class="form-control-file" id="FormControlFile">
          </div>
          <div class="col">
            <br>
            <button type="submit" class="btn btn btn-outline-secondary float-right">Enviar</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>