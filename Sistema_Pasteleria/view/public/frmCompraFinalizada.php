<form class="form" style="height: 16rem;" action="/Sistema_Pasteleria/index?clase=controladorlogin&metodo=cerrarsesion_compra_carrito" method="POST" enctype="multipart/form-data">
<!-- controladorlogin cerrarsesion -->
    <h2>
        <?php   echo "num. compra: " . $idVenta . "<br>";?>
    </h2>

    <link rel="stylesheet" href="css/estiloTabla.css">

    <div class="form-group">
        <label for="nombre">Nombre cliente </label>
        <br>
        <input type="text" id="sabor" name="txtNombre" value=" <?php   echo  $cliente->vchnombre ;?>">
    </div>
    <div class="form-group">
        <label for="nombre"> correo:</label>
      
        <label for="nombre"> <?php   echo $cliente->vchCorreo ;?> </label>
        
    </div>
    <div class="form-group">
        <label for="nombre"> total de pago de la compra:</label>
      
        <label for="nombre"> $<?php   echo $totalVenta ;?> </label>
        
    </div>
    <br>
    <div class="form-group">
        <button type="submit">terminar</button>
    </div>
</form>

<br></br>