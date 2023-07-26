<div class="cont">
    <?php
    while ($fila = $Consulta->fetch_object()) :
    ?>

        <form action="" method="post">

            <input type="hidden" name="idp" value="<?php echo $fila->idProducto; ?>" />

            <div class="card">
                <div class="imgBox">

                    <img    src="img/<?php echo $fila->imagen; ?>" width="150px" height="250">
                </div>

                <div class="details">
                    <div class="title">
                        <h3>
                            <?php echo $fila->Nombre; ?><br>
                            <small>Pastel sabor a helado de vainilla</small>
                        </h3>
                    </div>
                    <div class="descripcion">
                        <h4>Descripcion</h4>
                        <ul>
                            <li>
                                <?php echo $fila->Nombre; ?>
                            </li>
                            <li>3 leches</li>
                            <li>Sin genero </li>
                        </ul>
                    </div>
                    <div class="size"></div>
                    <div class="buy">
                        <div class="price">
                            <sup>$</sup>
                            <span>569.<small>59</small></span>
                        </div>

                        <div class="btn">
                            <a class="comprar" onclick="alert('tiene que iniciar sesión como cliente');">Comprar</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>


    <?php
    endwhile;
    ?>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
        <h5 class="card-title">Siempre elegimos algo fascinante como tu sonrisa animada</h5>
    </div>
</section>