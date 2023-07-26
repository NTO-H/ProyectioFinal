<!DOCTYPE html>

<head>
  <link href="css/estilopublico.css" rel="stylesheet">
  <!-- <link href="css/style.css" rel="stylesheet"> -->

  <?php
  if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    $productosSeleccionados = $_SESSION['carrito'];
  } else {
    $productosSeleccionados = array(); // Crear un arreglo vacío por defecto
  }
  ?>
  <style>
    .carrito-formulario {
      text-align: center;
      margin-top: 10px;
    }

    .carrito-formulario button {
      /* position: absolute; */
      display: flex;
      padding: 2px 5px;
      background-color: #131313;
      /* color: white; */
      border: none;
      border-radius: 50px;
      font-size: 16px;
      cursor: pointer;
    }

    .can {
      padding: 1.5px 6px;
      position: absolute;
      border-radius: 50%;
      background-color: #f57c00;

    }

    .carrito-formulario button:hover {
      /* background-color: #e65400; */
    }
  </style>

<body>
  <header>
    <div class="contenedor">
      <h1 class="marca">Lively</h1>

      <div class="menu">
 


        <nav>
          
          <ul>
            
            <ul class="lista">
              
              <li>
                <a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=inicio"> Pagina principal </a>
              </li>
              <li>
              <li>
                <a href="#openModal">Contactanos</a>
                <div id="openModal" class="modalDialog">
                  <div>

                    <link rel="stylesheet" href="css/Modal.css">
                    <a href="#close" title="Close" class="close">X</a>
                    <h>Nos gustaria saber su opinión para seguir mejorando </h>
                    <br>

                    <h>Dejanos un mensaje por vía Whastapp o facebook </h>
                    <br>
                    <a href="https://wa.me/527713491211"> <img width="35px" height="35px" src="icons/whatsapp.png" alt="">
                    </a>
                    <br>
                    <p>
                      <a href="https://www.facebook.com/">

                        <img width="30px" height="30px" src="icons/facebook (1).png" alt="">
                      </a>
                    </p>
                  </div>
                </div>

                <!-- <a href="#">contactanos</a> -->
              </li>
              <!-- <li><a href="#">Más información</a> -->
              <li><a href="/Sistema_Pasteleria/index?clase=controladorprincipal&metodo=iniciar">Iniciar sesión</a>
              </li>
              <li>
                <form id="carrito-form" class="carrito-formulario" action="/Sistema_Pasteleria/index?clase=controladorCarrito&metodo=procesa_lista" method="post">
                  <button type="submit">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEO0lEQVR4nO2Yf2wURRTHh6DGEInWhpvZPQqkBguFAAmhxUpnrngkQCktpEWP2xUaoSXGiPEXwRhNjKGHSiKGSGKE+I+AUP/RECigbZRw0NsGIugfJi2htJ0hEO4fFRKBMbPHzc1xgHvX3Wub3DeZ5O7NzuR99r2ZN7MAFFRQQQWNCiGEtyEN/4s0whMN/4U0HIUQrwEAjAOjXch2OOn8PQ2RCBh7ESBpbZJeXQXGkoqLqyZCDbcrUfgajDVBGKhMAkCEr97vGYTwXqSR2w9MPxcaROQ61Mj3EJJpWQFo2vwJ6kTiv9pfVBR80kvHUQYIvubT8XPZRQHhq3ICGKgciQggFULDVla7IkLk29Q6qG4FIyAIyWz1RWa1oUBI3lHod4MREtLId6lMsGuTM/l0ElSK2+mkvdu8YloGpZbJeD5adVmzTKM9tcevWyZ7wxGArr9QrOwG/wDQNN5qGZxgGezvfDl/xhjkJf7g3Y0kwLtCvba9x6DNjiAgwpdT6wDP/G3tpaJ8OW+ZjLev6pZvf25po9onM+KhQoj8kJzAp5GQsFkmHcoXwKfBQxKgYc7b0h4z6TlnEdDwR0pF3i5sMZMeyRfAqws/kwBvPr9L6aP7HEYAr1YAjiUiwCL5Alg66zUJsGvpj6k+g251BODzLSpVq6EdgTAL5QtgxtSVEuBw4/lUX5jWOgIQlU+cR5KTTJ682H/mZTorH853rPlDOv9MyXKR97Kve/1AiVMAsQ66UoWErOgk/BHLYDe8Bti97IgECJZvkvaYQeMc8KyOFJ8r6+B9YbNM1uM1wLuLvpQArRXblfxnXY6dtyMAyXrlSNEubDGT7fUaoHHeFgnQFjygAnyRFcAkf81c5VTYa0cgzDZ7DTC/9CUJcLAhqvZtzAqgvLz8MYjwzbuT3RF3gViYBrx0/uTaS1zXa2zn/fpiHg1fViJAM472/yuISE+qIuMlp17pf9pLgG9WdMq3v3C6qS7g2xearjyRPYBGdihp9JN9sDNYv1cADXPekgAbKralAEz6J8hFul5TlvblAuETXy3r+FWcFt10/GjT7/zFee8pV9kAP9RwWnmG2ptITkIIf+DW9XDmtHq+v/6UdOz1qp22TTisPpe2fSZ2oA9zBhBVWUAoC3pYrbXyE9upX0J9GX0CpHnBx7zbGEoDiJmsHgxX9vkIkT2aFhgQO8RwIxAzKa+dvdm2i8uL+L1v5cnMFDPYjbPr4k8BN2WZbKdb+d8V6s144+kAdIerztsALfxRy2CHvdxSrYTzHZ3rLj7uOoAocuKiM8W/JP5sSd3NlopIPBru77NM2vuwFg33921c0BYvm1p3a8aUulsPHGewn60w23CwiY8HXkh8vc7lizbKcZzrQhoZylykmHo1znUhRAbvdQQiPODVONd1/1TAbV6N82oRR+w3mmgRYfNqXEEFFVQQGDX6D2Gx4W5rhNSXAAAAAElFTkSuQmCC" type="submit">
                    <input type="hidden" name="carrito" id="carrito-input" value="<?php echo htmlspecialchars(json_encode($productosSeleccionados)); ?>">
                    <div class="can" id="cantidad-carrito">
                      <?php
                      echo count($productosSeleccionados);
                      ?>
                    </div>
                  </button>

                </form></a>
              </li>
            </ul>
          </ul>
        </nav>
      </div>
    </div>
  </header>


  <!-- Este es el cuerpo -->
  <?php include_once($vista); ?>
  <div class="footer">
    <h1 class="Marca">Lively</h1>
    </head>

    <body>

      <h1 data-heading="¡somos únicos en los mejores sabores !">
        ¡somos únicos en los mejores sabores !
      </h1>
      <p> &copy; Sitio desarrollado por el equipo 5 2023 -
        <?php date('d-m-Y H:i') ?>
      </p>
  </div>

</body>

</html>