
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
#user,#pass{
    width:200px;
    height:40px;
    color: #000000;
}
#user:hover{
  

    background-color: #cade86;

}
 #pass:hover{ 
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
    

    
    <form   data-aos="zoom-out-down" id="login-form" class="login-form" method="post" action="/Sistema_Pasteleria/index?clase=controladorlogin&metodo=Acceder">
        <h1>Bienvenido</h1>
        <!-- <link rel="stylesheet" href="/css/frmLogin.css"> -->
       <div>
           <input type="text"   id="user" name="txtusuario" required placeholder="nombre de usuario">

       </div>
        
        
        <br><br />
        <div>
            <input type="password"  id="pass" width="60px" height="100px" name="txtpassword"  required placeholder="ingrese su password">
            
        </div>
        <br>
        <br>
        <div>
             
            <input class="abt" type="submit" value="Acceder" name="registrar">   
             <a class="abt" href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=interfazUsuario"  type="submit" value="Volver">Volver</a>         
        </div>
<br>
        <a class="Registrarse" href="/Sistema_Pasteleria/index?clase=controladorCliente&metodo=AltaCliente" id="registrar">Registrarme</a>
  
      
    </form>
</body>.
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>