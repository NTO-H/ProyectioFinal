       
<form class="form" action="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=BuscarXimprimir" method="POST">

<div class="form-group">
    <label for="nombre">Buscar Nombre:</label>
    <input type="text" id="nombre" name="txtPalabra" required>
    <button type="submit" name="btnBuscar" value="btnBuscar">Buscar</button>
    <button type="submit" name="btnimprimir" value="btnimprimir">Imprimir</button>
</div>
</form>
<?php
// session_start();

// Verificar si hay un arreglo del carrito en la sesión
if (isset($_SESSION['carrito'])) {
  $carrito = $_SESSION['carrito'];
  $productosSeleccionados = $carrito;
} else {
  // Si no hay un arreglo del carrito, inicialízalo o realiza alguna acción predeterminada
  $carrito = array();
  $productosSeleccionados = $carrito;
}

// Verificar si se ha enviado el formulario de agregar al carrito
if (isset($_POST['idp'])) {
  $idProducto = $_POST['idp'];
  // Verificar si el producto ya está en el carrito
  if (!in_array($idProducto, $productosSeleccionados)) {
    // Agregar el producto al carrito
    $productosSeleccionados[] = $idProducto;
    // Actualizar la variable de sesión con el carrito actualizado
    $_SESSION['carrito'] = $productosSeleccionados;
  }
}
?>
<style>
   .oculto {
        display: none;
      }
      
    .producto-seleccionado {
        background-color: #dd57d3;
        /* Color de fondo */
        color: #fff;
        /* Color del texto */
        padding: 5px 10px;
        /* Espaciado interno */
        border-radius: 5px;
        /* Borde redondeado */
      }

</style>

<div class="cont">
  <?php while ($fila = $Consulta->fetch_object()): ?>

    <form action="" method="post">

      <input type="hidden" name="idp" value="<?php echo $fila->idProducto; ?>" />
      <div class="card">
        <div class="imgBox">
          <img src="img/<?php echo $fila->imagen; ?>" width="150px" height="250">
        </div>
        <div class="details">
          <?php
          // Verificar si el producto está en el carrito
          $enCarrito = in_array($fila->idProducto, $productosSeleccionados);
          $clase = $enCarrito ? 'seleccionado' : '';
          ?>
          <?php if ($enCarrito): ?>
            <div class="producto-seleccionado">Seleccionado</div>
          <?php endif; ?>
          <div class="title">
            <h3>
              <?php echo $fila->Nombre; ?><br>
              <small>
                <h3>
                  <?php echo $fila->idSabor; ?>
                </h3>

              </small>
            </h3>
          </div>
          <div class="descripcion">
            <h4>Descripcion</h4>
           <ul>
           <li>
                <h3>
                 Sabor: <?php echo $fila->idSabor; ?>
                </h3>
              </li>  
            </ul>
            <ul>
              <li>
                <h3>
                  Categoría:<?php echo $fila->tipo; ?>

                </h3>
              </li>
            </ul>
          </div>
          <div class="size"></div>
          <div class="buy">
            <div class="price">
              <sup>$</sup>
              <span>
                <?php echo $fila->Precio; ?>.<small>00</small>
              </span>
            </div>
            <div  class="btn <?php echo $enCarrito ? 'oculto' : ''; ?>">
            <a id="btn-comprar-<?php echo $fila->idProducto; ?>" class="comprar <?php echo $enCarrito ? 'oculto' : ''; ?>" onclick="agregarAlCarrito(<?php echo $fila->idProducto; ?>);">Comprar</a>
            </div>
          </div>
        </div>
      </div>
    </form>
  <?php endwhile; ?>
</div>

<script>
  var carrito = <?php echo json_encode($productosSeleccionados); ?>; // Arreglo para almacenar los productos seleccionados
  function agregarAlCarrito(idProducto) {
    if (!carrito.includes(idProducto)) {
      carrito.push(idProducto);
      console.log("Producto agregado al carrito: " + idProducto);
      console.log("Contenido del carrito: " + carrito);
      actualizarCarrito();
    }
  }
  function actualizarCarrito() {
    var cantidadCarrito = document.getElementById("cantidad-carrito");
    // Mostrar la cantidad de productos en el carrito
    var cantidadProductos = carrito.length;
    cantidadCarrito.textContent = "" + cantidadProductos;
    // Actualizar el valor del campo de entrada oculto con el arreglo de productos del carrito
    var carritoInput = document.getElementById("carrito-input");
    carritoInput.value = JSON.stringify(carrito);
    // Obtener el botón de compra correspondiente al ID del producto
  }
</script>
<!-- <section>
  <div class="card">
    <div class="card-body">
    </div>
    <h5 class="card-title">Siempre elegimos algo fascinante como tu sonrisa animada</h5>
    <img src="img/facebook.png" width="40px" height="40px">
  </div>
</section> -->