<?php
    Class Carrito{
        public function eliminarArticulo($id){
            foreach($_SESSION['Carrito'] as $indice=>$articulo){
                if($articulo['ID']==$id){
                    unset($_SESSION['Carrito'][$indice]);
                }
            }
            return "OK";
        }
        public function sesionCar($id,$nombre,$precio,$cantidad){
            $repite=false;
            if(!isset($_SESSION['Carrito'])){
                $articulo = array(
                    'ID'=> $id,
                    'NOMBRE'=> $nombre,
                    'PRECIO'=> $precio,
                    'CANTIDAD'=> $cantidad
                );
                $_SESSION['Carrito'][0]=$articulo;
            }else{
                foreach($_SESSION['Carrito'] as $indice=>$articulo){
                    if($articulo['ID']==$id){
                        $articulo = array(
                            'ID'=> $id,
                            'NOMBRE'=> $nombre,
                            'PRECIO'=> $precio,
                            'CANTIDAD'=> ($articulo['CANTIDAD']+1)
                        );
                        $repite=true;
                        $_SESSION['Carrito'][$indice]=$articulo;
                    }
                }
                if(!$repite){
                    $numArticulos=count($_SESSION['Carrito']);
                    $articulo = array(
                        'ID'=> $id,
                        'NOMBRE'=> $nombre,
                        'PRECIO'=> $precio,
                        'CANTIDAD'=> $cantidad
                    );
                    $_SESSION['Carrito'][$numArticulos]=$articulo;
                }
            }
        }
    }
?>