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
            <div class="menu">
                <nav>
                    <ul>
                        <ul class="lista">
                            <li>
                                <a href="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=AltaProducto">Producto</a>
                            </li>
                            <li>
                                <a href="/Sistema_Pasteleria/index?clase=controladorEmpleado&metodo=insertarEmpleado">Empleado</a>
                            </li>

                            <li>
                                <a href="/Sistema_Pasteleria/index?clase=controladorProducto&metodo=VerProductos">Ver Productos</a>
                            </li>
                            <li>
                                <a href="/Sistema_Pasteleria/index?clase=controladorEmpleado&metodo=VerEmpleados">Ver Empleados</a>
                            </li>

                            <li>
                                <a href="#">Ventas </a>

                                <!-- <ul>
                                    <li><a href="">Ver ventas</a></li>

                                </ul> -->
                            </li>

                            <li><a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=InterfazAdministrador">Pagina principal </a></li>
                            <li><a href="/Sistema_Pasteleria/index?clase=controladorlogin&metodo=cerrarsesion">Cerrar sesión</a></li>



                        </ul>

                        <li>
                        </li>
                    </ul>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <link rel="stylesheet" href="css/estiload.css">
    <!-- <estyle>
.texto_ad{
    color:
}




</estyle> -->

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