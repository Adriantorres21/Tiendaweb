<?php
    require('../Modelo/sesion.php');
    require('../Modelo/carrito.php');
    $validar = new login();
    $car = new Carrito();

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];
    session_start();
    $res = $validar->validarSesion();

    if($res){
        echo json_encode("OK");
    }else{
        $car->sesionCar($id,$nombre,$precio,$cantidad);
        echo json_encode("Agregado");
    }
?>