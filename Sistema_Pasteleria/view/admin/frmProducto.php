<form class="form" action="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=AltaProducto" method="POST" enctype="multipart/form-data">

    <h2>Dar de alta Producto</h2>

    <link rel="stylesheet" href="css/estiloTabla.css">

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" id="sabor" name="txtNombre" required>
    </div>
    <br>
    <div class="form-group">
        <label for="Sabor">Sabor:</label>
        <br>
        <Select name="txtSabor">
            <?php while ($fila = $traeSabor->fetch_object()) { ?>
                <option value="<?php echo $fila->idSabor; ?>">
                    <?php echo $fila->vchSabor; ?>
                </option>
            <?php } ?>
        </Select>
    </div>
    <div class="form-group">
        <label for="ap">Precio:</label>
        <input type="text" id="precio" name="txtPrecio" required>
    </div>
    <br>
    <td><label>imagen</label>
        <br>
        <input  type="file" class="form-control form-control-sm" name="imag" id="imag" class="form-control-file mt-2" id="exampleFormControlFile1">
    </td>
    </tr>
    <br>
    <br>

    <div class="form-group">
        <label for="tipo">Tipo:</label>
        <Select name="txtTipo">
            <br>
            <?php while ($fila = $traeTipo->fetch_object()) { ?>
                <option value="<?php echo $fila->idTipo; ?>">
                    <?php echo $fila->NombreTipo; ?>
                </option>
            <?php } ?>

        </Select>
    </div>
    <br>
    <div class="form-group">
        <button type="submit">Agregar</button>
    </div>
    <a href="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=VerProductos">Ver producto</a>
</form>
<div>
    <?php include_once($vista); ?>
</div>
<br></br>
