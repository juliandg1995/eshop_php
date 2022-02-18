var botonesDetalles = document.getElementsByClassName("boton-detalles2");
var botonModal = document.getElementById('boton_modal_detalles');

for (var i = 0; i < botonesDetalles.length; i++){
    botonesDetalles[i].addEventListener('click', modificarBoton);
}

    function modificarBoton(){
        botonModal.innerHTML = "Modificar publicacion";
        botonModal.setAttribute('href', "http://localhost/e-shop_actual/backend/carga_datos/carga_productos/modificar_producto.php");
    }