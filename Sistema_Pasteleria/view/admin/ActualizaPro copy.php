<?php
$fila = $Consulta2->fetch_object();
?>
<form class="form" action="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=Guardar" method="POST" enctype="multipart/form-data">
    <h2>Actualizar Producto</h2>
    <link rel="stylesheet" href="css/estiloTabla.css">


    <div class="form-group">
        <!-- <label type="hidd" for="Numero">Numero:</label> -->
        <!-- <br> -->
        <input type="hidden" name="txtNo" value=" <?php echo $fila->idProducto; ?>">

    </div>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" name="txtNombre" value=" <?php echo $fila->Nombre; ?>">

    </div>

    <div class="form-group">
        <label for="Sabor">Sabor:</label>
        <br>
        <Select name="txtSabor">
            <?php while ($combo1 = $traeSabor->fetch_object()) { ?>
                <option value="<?php echo $combo1->idSabor; ?>">
                    <?php echo $combo1->vchSabor; ?>
                </option>
            <?php } ?>
        </Select>
    </div>
    <div class="form-group">
        <label for="ap">Precio:</label>
        <br>
        <input type="text" id="precio" name="txtPrecio" value="<?php echo  $fila->Precio; ?>">

    </div>
    <br>
    <td><label>imagen</label>
        <br>
        <img src="img/<?php echo $fila->imagen; ?>" width="150" height="150">
        <br>
        <input type="file" class="form-control form-control-sm" name="imag" id="imag" class="form-control-file mt-2" id="exampleFormControlFile1">
    </td>
    </tr>
    <br>
    <br>
    <div class="form-group">
        <label for="tipo">Tipo:</label>
        <Select name="txtTipo">
            <br>
            <?php while ($combo3 = $traeTipo->fetch_object()) { ?>
                <option value="<?php echo $combo3->idTipo; ?>">
                    <?php echo $combo3->NombreTipo; ?>
                </option>
            <?php } ?>
        </Select>
    </div>
    <br>
    <div class="form-group">
        <button name="btnGuardar" value="btnGuardar" type="submit">Guardar</button>
    </div>
</form>