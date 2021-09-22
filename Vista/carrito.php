<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hoja de estilo personalizada -->
    <link rel="stylesheet" href="Estilo/estilo.css">
    <link rel="stylesheet" href="Estilo/estiloListaCar.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="icomoon/style.css">
    <title>Carrito</title>
</head>
<body>
    <!-- Menu -->
    <div id="bar-nav">
        <div id="logo">
            <a href="../index.php"><img src="img/logo.jpg" alt="Mi logo" id="imagenLogo"></a>
        </div>
        <form id="busqueda">
            <input type="text" name="palabra" id="txtBusqueda" placeholder="Buscar...">
            <button type="submit" value="Buscar" id="btnBuscar"><span class="icon-search"></span></button>
        </form>
        <a class="btnMenu icon-align-justify"></a>
        <div id="der" class="derOcultar">
            <a class="bar-der animacion textMenu" href="sesion.html">Iniciar sesión</a>
            <a class="bar-der animacion textMenu" href="">Pedidos</a>
            <a class="bar-der animacion carrito" href="#"><span class="icon-shopping-cart"></a>
        </div>
    </div>
    <!-- Menu fin -->
    <br>
    <h3 class="Titulolista">Lista de articulos</h3>
    <?php
        session_start();
        $total=0;
        if(!empty($_SESSION['Carrito'])){?>
    <table class="tbArticulo">
        <tbody>
            <tr>
                <th class="tnombre">Nombre</th>
                <th class="tprecio">Cantidad</th>
                <th class="tcant">Precio</th>
                <th class="ttotal">Total</th>
            </tr>
            <?php foreach($_SESSION['Carrito'] as $indice=>$articulo){ ?>
            <tr>
                <td class="tnombre"><?php echo $articulo['NOMBRE'];?></td>
                <td class="tprecio"><?php echo $articulo['CANTIDAD'];?></td>
                <td class="tcant">$<?php echo $articulo['PRECIO'];?></td>
                <td class="ttotal">$<?php echo number_format($articulo['PRECIO']*$articulo['CANTIDAD'],2);?></td>
                <td class="tbtn"><button class="btnEliminar" onclick="eliminarArticulo(<?php echo $articulo['ID'];?>)">Eliminar</button></td>
            </tr>
            <?php $total+= ($articulo['PRECIO']*$articulo['CANTIDAD']);?>
            <?php } ?>
        </tbody>
    </table>
    <h3 class="ResTotal">Total: $ <?php echo number_format($total,2); ?></h3>
    <div class="compra">
         <button class="btnAgregar btnComprar">Comprar</button>
    </div>
        

    <?php }else{ ?>
        <h3 class="Nohay">No hay articulos</h3>
    <?php } ?>
    <footer class="pie">
        <div class="info">
            <h2>Mas información</h2>
            <p>Esta compañia se dedica a la venta de diversos productos</p>
        </div>
        <div class="Redes">
            <h2>Redes Sociales</h2>
            <a href=""><img src="img/facebook.png" alt=""> Siguenos en Facebook</a>
            <a href=""><img src="img/twitter.png" alt=""> Siguenos en Twitter</a>
            <a href=""><img src="img/instagram.png" alt=""> Siguenos en Instagram</a>
            <a href=""><img src="img/google-plus.png" alt=""> Siguenos en Google Plus</a>
            <a href=""><img src="img/pinterest.png" alt=""> Siguenos en Pinterest</a>
        </div>
        <div class="Contacto" >
            <h2>Contacto</h2>
            <a href=""><img src="img/house.png" alt="">Tiendita</a>
            <a href=""><img src="img/smartphone.png" alt="">+52 477 1 23 45 66</a>
            <a href=""><img src="img/contact.png" alt="">tiendita@somos.com</a>
        </div>
    </footer>
    <!-- Ventanas de sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../js_back/carrito.js"></script>
    <script src="js/btnMenu.js"></script>
</body>
</html>