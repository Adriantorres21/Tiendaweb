<?php
    require('../Modelo/carrito.php');
    $car = new Carrito();
    $id=$_POST['id'];
    session_start();
    $res= $car->eliminarArticulo($id);
    echo json_encode($res);
?>