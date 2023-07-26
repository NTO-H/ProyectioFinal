
<head>
        <link rel="stylesheet" href="/css/frmLogin.css">
    <link rel="stylesheet" href="C:\xampp\htdocs\Sistema_Pasteleria\css\frmLogin.css">
    <meta charset="UTF-8">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>

body {
    font-family: sans-serif;
    width: 100%;
    text-decoration: uppercase;
    text-align: center;
    /* background: #221728; */
    /* background: #40576d; */
    background: url(images/Background.png) no-repeat 0px 0px ;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    backdrop-filter: inherit;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    /* background-color: #40576d; */

    background-blend-mode: overlay color-burn;
    /* background-blend-mode: darken; */
    /* background-blend-mode: lighten */
    /* background-blend-mode: color-dodge; */
    /* background-blend-mode: color-burn; */
    /* background-blend-mode: hard-light; */
    padding-top: 4rem;
    padding-bottom: 4rem;
    padding-left: 4rem;
}
.login-form {
    justify-content: center;
    width: 30%;
    margin: 0 auto;
    background-size: cover;
    color: #ffffff;
    background-position: center;
    opacity: inherit;
    
    padding:3rem;
    border-radius: 30px;
    box-shadow: #fff 20px 5px 399px;
    top: 0%;
    left: 0%;
}
input{
    width:200px;
    height:40px;
    color: #000000;
}
input:hover{
  

    background-color: #cade86;

}
 input:hover{ 
    background-color: #cade86;

}


.abt:hover{
color: #fff;
    background-color: #004cb6;

}
.abt{
text-decoration: none;
background-color: #e9e9e9;
/* border-radius: 25px; */
/* margin: black; */
color: #000000;
border-radius: 3px;
/* width: 4px; */
/* height: 8px; */
/* font-weight: 70px; */
    padding:2px 15px;
    margin: 1px 10px;
border: 2px solid  #a9a9a9;
box-shadow: #f0e2e2 2px 2px 23px;


}
.Registrarse:hover{
color: #75baff;


}


    </style>
    

    
    <form data-aos="zoom-out-down" id="login-form" class="login-form" action="/Sistema_Pasteleria/index?clase=controladorCliente&metodo=AltaCliente" method="POST">

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
</body>.
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>