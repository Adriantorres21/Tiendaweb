<?php
    require('../Modelo/sesion.php');
    require('../Persistencia/conexion.php');
    $con = new Coneccion();
    $sesion = new login();

    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $res = $sesion->iniciarSesion($con,$user,$pass);
    
    if($res){
        echo json_encode("OK");
        session_start();
        $_SESSION['cliente']=$res['nombre'];
    }else{
        echo json_encode("NO");
    }
?>