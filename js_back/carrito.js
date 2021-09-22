function agregarArticulo(idA,nombre,precio){
    var sesion="NO";
    var cantidad=1;
    var datos = {
        "id":idA,
        "nombre":nombre,
        "precio":precio,
        "cantidad":cantidad
    };
    $.ajax({
        url: 'Controlador/ControllerValidarSesion.php',
        data: datos,
        type: 'POST',
        dataType: 'json'
    }).done(function(data){
        if(data=="OK"){
            // alert('Existe sesion');
            sesion="OK";
        }else{
            Swal.fire(
                'Agregado',
                'Revisa el carrito',
                'success'
            );
        }
    }).fail(function(data){
        console.log(data);
    });
}

function eliminarArticulo(idA){
    var datos = {
        "id":idA
    };
    $.ajax({
        url: '../Controlador/ControllerEliminarCar.php',
        data: datos,
        type: 'POST',
        dataType: 'json'
    }).done(function(data){
        if(data=="OK"){
            (async () => {
                await Swal.fire({
                    title: 'Eliminado',
                    text: 'Revisa el carrito',
                    icon: 'success',
                    timer: 5000
                });

                location.reload();
            })()
        }else{
            alert("No se puede eliminar");
        }
    }).fail(function(data){
        console.log(data);
    });
}