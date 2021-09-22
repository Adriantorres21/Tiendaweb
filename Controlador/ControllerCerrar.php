<?php
    require('../Modelo/sesion.php');
    require('../Persistencia/conexion.php');
    $con = new Coneccion();
    $sesion = new login();
    $res = $sesion->CerrarSesion();
    echo json_encode($res);
?>