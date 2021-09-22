function iniciarSesion(){
    var user = document.getElementById('user').value;
    var pass = document.getElementById('pass').value;

    var datos = {
        "user":user,
        "pass":pass
    };

    $.ajax({
        url: '../Controlador/ControllerInicio.php',
        data: datos,
        type: 'POST',
        dataType: 'json'
    }).done(function(data){
        if(data=="OK"){
            window.location='../index.php';
        }else{
            alert("No se puede iniciar sesión");
        }
    }).fail(function(data){
        console.log(data);
    });
}

function cerrarSesion(){
    $.ajax({
        url: 'Controlador/ControllerCerrar.php',
        type: 'POST',
        dataType: 'json'
    }).done(function(data){
        if(data=="OK"){
            location.reload();
        }else{
            alert("No se puede cerrar sesión");
        }
    }).fail(function(data){
        console.log(data);
    });
}