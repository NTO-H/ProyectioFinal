

    <link rel="stylesheet" href="css/estiloTabla.css">
    <a href="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=AltaProducto">Agregar</a>
    <div class="table-container"></div>
        <table class="centered-table">
            <thead>
                <tr>

                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Sabor</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>tipo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $Consulta->fetch_object()) :
                ?>
                    <form class="form" action="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=EliminarXEditar" method="post">

                        <tr>
                            <td>
                                <input type="text" name="txtNo" value="<?php echo $fila->idProducto; ?>" readonly>
                            </td>
                            <td>
                                <input type="text" name="txtNombre" value=" <?php echo $fila->Nombre; ?>">
                            </td>
                            <td>
                                <input type="text" name="txtSabor" value="<?php echo $fila->idSabor; ?>">
                            </td>
                            <td>
                                <input type="text" name="txtPrecio" value="<?php echo $fila->Precio; ?>">
                            </td>
                            <td>
                                <img src="img/<?php echo $fila->imagen; ?>" width="150" height="150">
                            </td>
                            <td>
                                <input type="text" name="txtTipo" value="<?php echo $fila->tipo; ?>">
                            </td>

                            <td>
                                <input id="bo" type="submit" name="btnEliminar" value="Eliminar"></input>

                                <input id="bo" type="submit" name="btnEditar" value="Editar"></input>
                            </td>
                            </td>
                        </tr>
                    </form>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>
</form>
<!-- --------------------------- -,modal´- -------------------------------->