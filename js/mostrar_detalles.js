

var modal = document.getElementById('detalles-producto');        // Obtengo la referncia al div del modal con los detalles del producto
var botones = document.getElementsByClassName('boton-detalles');    // Obtengo el array con la referencia a todos los botones correspondientes a cada uno de los productos

// Asigno la función anterior a cada uno de los botones
for (var i = 0; i < botones.length; i++){
     botones[i].addEventListener('click', mostrarInfo);
}


// Función que actualiza la información del modal al momento del display. 
// El parámetro producto hace referencia al contenedor del producto que dispara el evento

function mostrarInfo(producto){
    //alert("Entro");
    //console.log(producto);

    // Los siguientes son los valores tomados del producto que activa el evento
    var nombre = producto.querySelector('.nombre-producto').innerHTML;            // valor del nombre 
    var img = producto.querySelector('.imagen-producto').getAttribute('src');    // contenido de la imagen 
    var descripcion = producto.querySelector('.descrip-producto').innerHTML;    // descripcion
    var precio = producto.querySelector('.precio-producto').innerHTML;         // precio
    var vendedor = producto.getAttribute('data-vendedor');                    // usuario vendedor
    var fPublicacion = producto.getAttribute('data-fPublicacion');           // fecha de publicacion
    var fCaducidad = producto.getAttribute('data-fCaducidad');              // fecha de caducidad

    // Actualizo los valores dentro del modal
    document.getElementById('nombre-producto').innerHTML = nombre;
    document.getElementById('imagen-producto').setAttribute('src', img);
    document.getElementById('descripcion-producto').innerHTML = descripcion;
    document.getElementById('precio-producto').innerHTML = precio;
    document.getElementById('vendedor-producto').innerHTML = vendedor;
    document.getElementById('publicacion-producto').innerHTML = fPublicacion;
    document.getElementById('caducidad-producto').innerHTML = fCaducidad;
    
}


