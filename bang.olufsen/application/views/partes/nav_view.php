<div class="container-fluid bg-light barra-navegacion">
  <div class="text-sm-center d-flex justify-content-around">
    <?php if ($this->session->userdata('perfil') == 1) { ?>
      <div>
        <a class="btn-link" href="<?php echo base_url('admin/listado'); ?>">Listado</a>
      </div>
      <div>
        <a class="btn-link" href="<?php echo base_url('admin/producto'); ?>">Producto</a>
      </div>
      <div>
        <a class="btn-link" href="<?php echo base_url('admin/consultas'); ?>">Consultas</a>
      </div>
      <div>
        <a class="btn-link" href="<?php echo base_url('admin/compras'); ?>">Ventas</a>
      </div>
    <?php } else { ?>
      <div>
        <a class="btn-link" href="<?php echo base_url('catalogo/parlantes'); ?>">Parlantes</a>
      </div>
      <div>
        <a class="btn-link" href="<?php echo base_url('catalogo/auriculares'); ?>">Auriculares</a>
      </div>
      <div>
        <a class="btn-link" href="<?php echo base_url('catalogo/televisores'); ?>">Televisores</a>
      </div>
      <div>
        <a class="btn-link" href="<?php echo base_url('catalogo/accesorios'); ?>">Accesorios</a>
      </div>
    <?php } ?>
  </div>
</div>