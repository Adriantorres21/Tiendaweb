<?php
    Class Cliente{   
        public function registrar($con,$nombre,$apellido,$correo,$pass,$gen,$domicilio){
            $mysql=$con->conectar();
            $sql = "INSERT INTO `usuario` (`idUsuario`, `idTipoUsuario`, `idFormaPago`,
                `idDepartamento`, `nombre`, `apellidos`, `Correo`, `Contrasena`, `genero`,
                `domicilio`, `rfc`, `puesto`, `salario`) 
                VALUES ('', '1', NULL, NULL, '$nombre', '$apellido', '$correo', 
                '$pass', '$gen', '$domicilio', NULL, NULL, NULL);";
            // INSERT INTO `formaspago` (`idForma`, `idUsuario`, `nombre`, `nCuenta`, `fechaVencimiento`, `opcionPago`, `CVV`) VALUES (NULL, '1', NULL, '1234567891234567', NULL, NULL, NULL);
            $stmt = $mysql->query($sql);
            return $stmt;
        }

    }
?>