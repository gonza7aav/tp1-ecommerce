<div class="container shadow">

  <h2>Carrito
    <a href="<?php echo base_url('catalogo'); ?>" class="btn btn-outline-secondary btn-sm float-right">Continuar comprando</a>
  </h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Subtotal</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        
        <?php foreach ($this->cart->contents() as $items) : ?>
          <tr>
            <td> <?php echo $items['name']; ?> </td>
            <td>
              <a href="<?php echo base_url('Carrito_controller/quitarUnidad/'.$items['rowid']); ?>" class="btn btn-outline-secondary rounded-circle">-</a>
              <?php echo $items['qty']; ?>
              <a href="<?php echo base_url('Carrito_controller/agregarUnidad/'.$items['rowid']); ?>" class="btn btn-outline-secondary rounded-circle">+</a></td>
            <td> $<?php echo $this->cart->format_number($items['price']); ?> </td>
            <td> $<?php echo $this->cart->format_number($items['subtotal']); ?> </td>
            <td> <a href="<?php echo base_url('Carrito_controller/quitar/'.$items['rowid']); ?>" class="btn btn-outline-secondary rounded-circle">x</a> </td>
          </tr>

        <?php endforeach; ?>

      <thead>
        <tr>
          <th></th>
          <th></th>
          <th class="right"><strong>Total</strong></th>
          <th class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></th>
          <th></th>
        </tr>
      </thead>
    </tbody>
  </table>
  <button type="button" onclick="eliminarCarrito()" class="btn btn-outline-secondary btn-sm">Vaciar</button>
  <?php if (!empty($this->cart->contents())) : ?>
    <!--<a href="<?php echo base_url('Compra_controller/comprar'); ?>" class="btn btn-outline-secondary">Comprar</a>-->
    <a href="<?php echo base_url('Carrito_controller/comprar'); ?>" class="btn btn-outline-secondary btn-sm">Comprar</a>
  <?php endif; ?>
</div>

<script>
  function eliminarCarrito() {
    var result = confirm("Desea vaciar el Carrito?");
    if (result) {
      window.location = "<?php echo base_url('Carrito_controller/quitar/all'); ?>";
    } else {
      return false;
    }
  }
</script>