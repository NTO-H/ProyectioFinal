<?php
$fila = $Consulta2->fetch_object();
?>

<form class="form" action="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=Guardar" method="POST" enctype="multipart/form-data">
    <h2>Actualizar Producto</h2>
    <link rel="stylesheet" href="css/estiloTabla.css">

    <div class="form-group">
        <input type="hidden" name="txtNo" value="<?php echo $fila->idProducto; ?>">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" name="txtNombre" value="<?php echo $fila->Nombre; ?>">
    </div>

    <div class="form-group">
        <label for="Sabor">Sabor:</label>
        <br>
        <select name="txtSabor">
            <?php while ($combo1 = $traeSabor->fetch_object()) { ?>
                <option value="<?php echo $combo1->idSabor; ?>">
                    <?php echo $combo1->vchSabor; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="ap">Precio:</label>
        <br>
        <input type="text" id="pokin" name="txtPrecio" value="<?php echo $fila->Precio; ?>">
    </div>

    <br>

    <div class="form-group">
        <label>Imagen:</label>
        <br>
        <?php if (isset($fila->imagen) && !empty($fila->imagen)): ?>
            <img src="img/<?php echo $fila->imagen; ?>" width="150" height="150">
            <br>
        <?php endif; ?>
        <input type="file" class="form-control form-control-sm" name="imag" id="imag" class="form-control-file mt-2" id="exampleFormControlFile1">
        <!-- verifica si  la imagen es diferente a vacio muestra el contenido actual de la variable de la consulta  -->
        <?php if (isset($fila->imagen) && !empty($fila->imagen)): ?>
            <input type="hidden" name="foto_actual" value="<?php echo $fila->imagen; ?>">
        <?php endif; ?>
    </div>

    <br>

    <div class="form-group">
        <label for="tipo">Tipo:</label>
        <select name="txtTipo">
            <br>
            <?php while ($combo3 = $traeTipo->fetch_object()) { ?>
                <option value="<?php echo $combo3->idTipo; ?>">
                    <?php echo $combo3->NombreTipo; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <br>

    <div class="form-group">
        <button name="btnGuardar" value="btnGuardar" type="submit">Guardar cambios</button>
    </div>
</form>
