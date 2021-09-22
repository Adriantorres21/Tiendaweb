<?php
    Class login{
        public function validarSesion(){
            $correcto = false;
            if(isset($_SESSION['usuario'])){
                $correcto = true;
            }
            return $correcto;
        }
        public function iniciarSesion($con,$user,$pass){
            $mysql=$con->conectar();
        
            $sql = "SELECT * FROM `usuario` WHERE Correo= '$user' AND Contrasena = '$pass'";
            $stmt = $mysql->query($sql);
            $res = $stmt->fetch_assoc();
            return $res ;
        }
        public function CerrarSesion(){
            session_start();
            session_unset();
            session_destroy();
            return "OK";
        }
    }
?>