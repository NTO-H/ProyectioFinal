<form class="form" action="/Sistema_Pasteleria/index?clase=controladorCliente&metodo=AltaCliente" method="POST">

    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

    <h2>Bienvenido</h2>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="txtNombreP" required>
    </div>
    <div class="form-group">

        <div class="form-group">
            <label for="ap">Apellido Paterno:</label>
            <input type="text" id="ap" name="txtAP" required>
        </div>
        <div class="form-group">
            <label for="ap">Apellido Materno:</label>
            <input type="text" id="am" name="txtAM" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="txtCorreo">
        </div>
        
        <div class="form-group">
            <label for="tel">Número télefonico</label>
            <input type="number" id="numero" name="txtNTel">
        </div>

        <div>
            <label for="usuario"> Usuario:</label>
            <input type="text" id="usuario" name="txtUsuario" required></inp>

        </div>
        <div class="form-group">
            <label for="password">password:</label>
            <input type="password" id="password" name="txtPassword"></input>
        </div>
    </div>

    <!-- <div class="form-group">
        <label for="estatura">Cantidad Leches:</label>
        <input type="text" id="estatura" name="txt" required>
    </div> -->

    <div class="form-group">
        <button type="submit">Crear cuenta</button>
    </div>

</form>

<br></br>