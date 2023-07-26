
<?php
echo '<form  method="POST" enctype="multipart/form-data">';
echo '<link rel="stylesheet" href="css/Modal.css">';
echo '<div id="openModal" class="modalDialog">';
        echo '<input type="hidden" name="idprod" value="<?php echo $fila->idProducto; ?>">';
       echo ' <div>';
       echo '<a href="#close" title="Close" class="close">Cerrar</a>';
            echo '<h2>Editar Producto</h2>';
           echo ' <div class="form-group">';
                echo '<label for="nombre">Nombre:</label>';
                echo '<br>';
                echo '<input type="text" value="'.$Empleado->idempleado .'" name="txtNombre">';
            echo '</div>';
            echo '<br>';
            echo '<div class="form-group">
               <label for="Sabor">Sabor:</label>';
               echo ' <br>';
                echo '<Select name="txtSabor">';
                    while ($fila = $traeSabor->fetch_object()) { ?>
                        <option value="<?php echo $fila->idSabor; ?>">
                            <?php echo $fila->vchSabor; ?>
                        </option>
                    <?php } 
                 echo '</Select>';
                 echo '</div>
            <div class="form-group">';
            echo ' <label for="ap">Precio:</label>
                <br>';
                echo '<input type="text" id="precio"  value="'.$Empleado->idempleado .'"  name="txtPrecio" required>';
                echo ' </div>
            <br>
            <td><label>imagen</label>
                <br>';
                echo '<input type="file" class="form-control form-control-sm" name="imag" id="imag" class="form-control-file mt-2" id="exampleFormControlFile1">';
                echo ' </td>
            </tr>
            <br>
            <br>';

            echo ' <div class="form-group">
                <label for="tipo">Tipo:</label>
                <Select name="txtTipo">
                    <br>';
                  while ($fila = $traeTipo->fetch_object()) { 
                    echo '<option value="'. $fila->idTipo.'">'.
                          $fila->NombreTipo
                          .'</option>';
                  } 
                  echo '</Select>
            </div>
            <br>';
            echo '<div class="form-group">
                <button type="submit">Guardar</button>
            </div>';

            echo '</div>
    </div>
</form>';
?>
