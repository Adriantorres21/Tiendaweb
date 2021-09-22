<?php
session_start();
include('Controlador/ControllerListar.php');
include('Controlador/ControllerBuscar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hoja de estilo personalizada -->
    <link rel="stylesheet" href="Vista/Estilo/estilo.css">
    <link rel="stylesheet" href="Vista/icomoon/style.css">
    
    <title>Tiendita web</title>
</head>
<body>
    <!-- Menu -->
    <div id="bar-nav">
        <div id="logo">
            <a href="index.php"><img src="Vista/img/logo.jpg" alt="Mi logo" id="imagenLogo"></a>
        </div>
        <form action="" method="POST" id="busqueda">
            <input type="text" name="txtBusqueda"  id="txtBusqueda" placeholder="Buscar...">
            <button type="submit" value="Buscar" id="btnBuscar"><span class="icon-search"></span></button>
        </form>
        <a class="btnMenu icon-align-justify"></a>
        <div id="der" class="derOcultar">
            <?php if(isset($_SESSION['cliente'])){?>
                <a class="bar-der animacion textMenu" onclick="cerrarSesion();" href="#">Cerrar sesión</a>
            <?php }else{ ?>
                <a class="bar-der animacion textMenu" href="Vista/sesion.html">Iniciar sesión</a>
            <?php }?>
            
            <a class="bar-der animacion textMenu" href="">Pedidos</a>
            <a class="bar-der animacion carrito" href="Vista/carrito.php"><span class="icon-shopping-cart"></a>
        </div>
    </div>
    <!-- Menu fin -->
    <!-- banner -->
    <div class="banner">
        <h1>Bienvenido</h1>
    </div>
    <!-- banner fin -->
    <!-- Resultados de busqueda -->
    <?php if($_POST){?>
            <h2 class="tituloBus">Busqueda</h2>
            <div id="resBusc" class="cards-content busqueda">
                <div class="container">
                <?php while ($fila=$busqueda->fetch_assoc()) {
                        echo ' 
                        <div class="card">
                            <div class="imgBx">
                                <img src="data:image/jpg;base64, '.base64_encode($fila['Imagen']).'"alt="">
                            </div>
                            <div class="content">
                                <h2>'.$fila['Nombre'].'</h2>
                                <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
                                <h3>Precio: $'.$fila['Precio'].'</h3>
                                <input class="btnAgregar" type="submit" value="Agregar" 
                                onclick="agregarArticulo('.$fila['idArticulo'].',\''.$fila['Nombre'].
                                '\' ,'.$fila['Precio'].');">
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
    <?php }?>
    <!-- Resultados de busqueda fin -->
    <!-- Cards -->

    <div id="Cat"class="cards-content">
        <div class="container">
            <?php while ($fila=$lista->fetch_assoc()) {
                echo ' 
                <div class="card">
                    <div class="imgBx">
                        <img src="data:image/jpg;base64, '.base64_encode($fila['Imagen']).'"alt="">
                    </div>
                    <div class="content">
                        <h2>'.$fila['Nombre'].'</h2>
                        <h3>Descripcion: <a class="descripcion" href="#">Leer más...</a></h3>
                        <h3>Precio: $'.$fila['Precio'].'</h3>
                        <input class="btnAgregar" type="submit" value="Agregar" 
                        onclick="agregarArticulo('.$fila['idArticulo'].',\''.$fila['Nombre'].
                        '\' ,'.$fila['Precio'].');">
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>     
    <!-- Fin Cards -->
    <footer class="pie">
        <div class="info">
            <h2>Mas información</h2>
            <p>Esta compañia se dedica a la venta de diversos productos</p>
        </div>
        <div class="Redes">
            <h2>Redes Sociales</h2>
            <a href=""><img src="Vista/img/facebook.png" alt=""> Siguenos en Facebook</a>
            <a href=""><img src="Vista/img/twitter.png" alt=""> Siguenos en Twitter</a>
            <a href=""><img src="Vista/img/instagram.png" alt=""> Siguenos en Instagram</a>
            <a href=""><img src="Vista/img/google-plus.png" alt=""> Siguenos en Google Plus</a>
            <a href=""><img src="Vista/img/pinterest.png" alt=""> Siguenos en Pinterest</a>
        </div>
        <div class="Contacto" >
            <h2>Contacto</h2>
            <a href=""><img src="Vista/img/house.png" alt="">Tiendita</a>
            <a href=""><img src="Vista/img/smartphone.png" alt="">+52 477 1 23 45 66</a>
            <a href=""><img src="Vista/img/contact.png" alt="">tiendita@somos.com</a>
        </div>
    </footer>
    <!-- Ventanas de sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="js_back/carrito.js"></script>
    <script src="js_back/log.js"></script>
    <script src="Vista/js/btnMenu.js"></script>
</body>
</html>