<head>
    <link rel="stylesheet" href="css/carro.css">
</head>

<div class="table-container">
    <table class="centered-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Sabor</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Acción</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $index => $producto): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($producto['idProducto']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($producto['Nombre']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($producto['idSabor']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($producto['Precio']); ?>
                    </td>
                    <td><img src="img/<?php echo htmlspecialchars($producto['imagen']); ?>" width="85" height="100"></td>
                    <td>
                        <?php echo htmlspecialchars($producto['tipo']); ?>
                    </td>
                    <td>
                        <form class="form">
                            <input type="hidden" name="indiceProducto" value="<?php echo $index; ?>">
                            <input type="hidden" name="carrito"
                                value="<?php echo htmlspecialchars(json_encode($productosSeleccionados)); ?>">
                            <div class="cantidad-container">
                                <button type="button" class="cantidad-button btnAumentar"
                                    onclick="incrementarCantidad(<?php echo $index; ?>)">+</button>
                                <input type="number" name="cantidadProducto[<?php echo $index; ?>]" class="cantidad-input"
                                    value="<?php echo isset($producto['Cantidad']) ? htmlspecialchars($producto['Cantidad']) : 1; ?>"
                                    data-precio="<?php echo isset($producto['Precio']) ? htmlspecialchars($producto['Precio']) : 0; ?>">
                                <button type="button" class="cantidad-button btnDisminuir"
                                    onclick="decrementarCantidad(<?php echo $index; ?>)">-</button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form class="form"
                            action="/Sistema_Pasteleria/index?clase=controladorCarrito&metodo=elimina_de_list"
                            method="post">
                            <input type="hidden" name="indiceProducto" value="<?php echo $index; ?>">
                            <input type="hidden" name="carrito"
                                value="<?php echo htmlspecialchars(json_encode($productosSeleccionados)); ?>">
                            <button type="submit" name="btnEliminar" class="submit-button">Eliminar</button>
                        </form>
                    </td>
                    <td class="precio-total">
                        <?php echo isset($producto['PrecioTotal']) ? htmlspecialchars($producto['PrecioTotal']) : ""; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="volver-catalogo">
    <form class="form" action="/Sistema_Pasteleria/index?clase=controladorCarrito&metodo=volver_Catalogo" method="post">
        <input type="hidden" name="carrito"
            value="<?php echo htmlspecialchars(json_encode($productosSeleccionados)); ?>">
        <button type="submit" name="volver" class="submit-button">volver</button>
    </form>
</div>

<div class="total-precio-cantidad">
    Total Precio Cantidad: <span id="total-precio-cantidad"></span>
</div>

<form id="nameForm" action="" method="POST" class="form-inline justify-content-center">
    <div class="form-group">
        <div class="form-row align-items-center">
            <div class="card">
                <div class="card-body">
                    <h1 align="center">Envios</h1>
                    <select name="txtSabor" onchange="mostrarCostoEnvio();" class="form-control">
                        <?php while ($lista = $localidades->fetch_object()): ?>
                            <option value="<?php echo htmlspecialchars($lista->intIdCostoEnv); ?>"
                                data-costo="<?php echo htmlspecialchars($lista->fltCosto); ?>">
                                <?php echo htmlspecialchars($lista->vchDireccion); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <label for="exampleFormControlTextarea1">Costo Envio</label>
                    <span id="costo-envio">
                    </span>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="total-final">
    <p>Total Final: $<span id="total-final-precio">0.00</span></p>
</div>

<div class="procesar-compra">
    <button onclick="procesarCompra()">continuar</button>
</div>

<script>
    function incrementarCantidad(index) {
        var input = document.querySelector('input[name="cantidadProducto[' + index + ']"]');
        var precio = parseFloat(input.getAttribute("data-precio"));
        var cantidad = parseInt(input.value);
        cantidad += 1;
        input.value = cantidad;
        // Calcular el precio total y actualizar en la tabla
        var precioTotal = cantidad * precio;
        var precioTotalElement = document.getElementsByClassName("precio-total")[index];
        precioTotalElement.textContent = precioTotal.toFixed(2);
        actualizarPrecioTotal(); // Actualizar el total general
    }
    function decrementarCantidad(index) {
        var input = document.querySelector('input[name="cantidadProducto[' + index + ']"]');
        var precio = parseFloat(input.getAttribute("data-precio"));
        var cantidad = parseInt(input.value);
        if (cantidad > 1) {
            cantidad -= 1;
            input.value = cantidad;
            // Calcular el precio total y actualizar en la tabla
            var precioTotal = cantidad * precio;
            var precioTotalElement = document.getElementsByClassName("precio-total")[index];
            precioTotalElement.textContent = precioTotal.toFixed(2);

            actualizarPrecioTotal(); // Actualizar el total general
        }
    }
    function actualizarPrecioTotal() {
        var total = 0;
        var precioTotalElements = document.getElementsByClassName("precio-total");
        for (var i = 0; i < precioTotalElements.length; i++) {
            var precioTotal = parseFloat(precioTotalElements[i].textContent);
            if (!isNaN(precioTotal)) {
                total += precioTotal;
            }
        }
        document.getElementById("total-precio-cantidad").textContent = total.toFixed(2);

        // Obtener el costo de envío seleccionado
        var selectElement = document.querySelector('select[name="txtSabor"]');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var costoEnvio = parseFloat(selectedOption.getAttribute("data-costo"));
        document.getElementById("costo-envio").textContent = "Costo de envío: $" + costoEnvio.toFixed(2);
        // Calcular y actualizar el total final
        var totalFinal = total + costoEnvio;
        document.getElementById("total-final-precio").textContent = totalFinal.toFixed(2);
    }

    function mostrarCostoEnvio() {
        var selectElement = document.querySelector('select[name="txtSabor"]');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var costoEnvio = selectedOption.getAttribute('data-costo');
        document.getElementById('costo-envio').textContent = "Costo de envío: $" + costoEnvio;
        actualizarPrecioTotal();
    }

    // Documento listo, inicializar cálculos
    document.addEventListener("DOMContentLoaded", function () {
        // Obtener todos los elementos de cantidad y precio
        var cantidadInputs = document.getElementsByClassName("cantidad-input");
        var precioElements = document.getElementsByClassName("precio-total");

        // Calcular el precio total al cargar la página
        var total = 0;
        for (var i = 0; i < cantidadInputs.length; i++) {
            var cantidad = parseInt(cantidadInputs[i].value);
            var precio = parseFloat(cantidadInputs[i].getAttribute("data-precio"));
            var precioTotal = cantidad * precio;
            precioElements[i].textContent = precioTotal.toFixed(2);
            total += precioTotal;
        }

        // Actualizar el total en la página
        document.getElementById("total-precio-cantidad").textContent = total.toFixed(2);
        mostrarCostoEnvio(); // Mostrar el costo de envío inicialmente
    });
    function procesarCompra() {
        // Obtener el formulario con los datos necesarios
        var form = document.getElementById("nameForm");
        // Crear campos input ocultos para el carrito y las cantidades de cada producto
        var carritoInput = document.createElement("input");
        carritoInput.type = "hidden";
        carritoInput.name = "carrito";
        carritoInput.value = JSON.stringify(<?php echo json_encode($productosSeleccionados); ?>);
        form.appendChild(carritoInput);

        var cantidadInputs = document.getElementsByClassName("cantidad-input");
        for (var i = 0; i < cantidadInputs.length; i++) {
            var cantidadInput = document.createElement("input");
            cantidadInput.type = "hidden";
            cantidadInput.name = "cantidadProducto[" + i + "]";
            cantidadInput.value = cantidadInputs[i].value;
            form.appendChild(cantidadInput);
        }
        // Enviar el formulario al servidor
        form.action = "/Sistema_Pasteleria/index?clase=controladorCarrito&metodo=procesa_compra"; // Reemplaza esto con la ruta hacia tu función 'procesa_compra' en el controlador
        form.method = "POST";
        form.submit();
    }
</script>