<?php   
    if($_POST){
        $nombre=$_POST['txtBusqueda'];
        $busqueda = $articulos->Buscar($con,$nombre);
    }
?>