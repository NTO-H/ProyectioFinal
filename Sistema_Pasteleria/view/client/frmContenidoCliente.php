<!DOCTYPE html>

<head>
    <link href="css/estilopublico.css" rel="stylesheet">
</head>
<title>Lively</title>

<body>
    <!-- menú de navegacion  -->
    <header>
        <div class="contenedor">
            <h1 class="marca">Lively</h1>
            <nav>
                <ul>
                    <ul class="lista">
                        <div class="menu">
                            <li>
                                <a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=interfazUsuario"> Pagina principal </a>
                            </li>
                            <li>
                                <a href="#">Más</a>
                                <ul class="">
                                    <li>
                                        <a href="/Sistema_Pasteleria/index?clase=controladorlogin&metodo=cerrarsesion">Cerrar sesión</a>
                                    </li>
                            </li>
                    </ul>
                    <li>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
    </header>

    <!-- Este es el cuerpo -->

    <?php include_once($vista); ?>

    <!-- Este es el pie de la pagina -->
    <!-- pie de pagina -->
    <div class="footer">
        <h1 class="Marca">Lively</h1>
        ¡somos únicos en los mejores sabores !
        <p> &copy; Sitio desarrollado por el equipo 5 2023 - <?php date('d-m-Y H:i') ?> </p>
    </div>

</body>

</html>