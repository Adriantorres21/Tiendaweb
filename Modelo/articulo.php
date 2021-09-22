<?php
    Class Articulo{
        
        public function listarArticulos($con){
            $mysql=$con->conectar();
        
            $sql = "SELECT * FROM articulo";
            $stmt = $mysql->query($sql);

            return $stmt;
        }
        public function Buscar($con,$nombre){
            $mysql=$con->conectar();
        
            $sql = "SELECT * FROM articulo WHERE Nombre Like'%$nombre%'";
            $stmt = $mysql->query($sql);
            return $stmt;
        }  

    }
?>