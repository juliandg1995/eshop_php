function setMensaje (titulo, tipo, mensaje) {
    Swal.fire({
       title: titulo,
       text: mensaje,
       icon: tipo,
       confirmButtonText: 'OK',
       width: '40%',
       backdrop: true,
       timer: 10000,
       timerProgressBar: true,
       padding: '1rem',
       allowOutsideClick: false,
       allowEscapeKey: true,
       allowEnterKey: true,
       stopKeydownPropagation: false,
       onClose: function(){
            window.location.reload()
        }
   })
}

var modal = document.getElementById('detalles-producto');
var botones = document.getElementsByClassName('boton-compra');

// Asigno la función anterior a cada uno de los botones

for (var i = 0; i < botones.length; i++){
    botones[i].addEventListener('click', comprar); 
}

// Función que actualiza la información del modal al momento del display SÓLO CUANDO EL USUARIO ESTÁ LOGGEADO. 
// El parámetro producto hace referencia al contenedor del producto que dispara el evento

function comprar(producto, status){

    // console.log(status);
    // console.log(producto);

    if (status == '1'){ 

        var idProducto = producto.getAttribute('data-id');
        var idVendedor = producto.getAttribute('data-vendedor');
        var url = "backend/autenticar.php"; //URL del servidor 
        var params = "idProducto=" + idProducto + "&idVendedor=" + idVendedor + "&formName=comprarProducto"; //PARAMETROS
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'backend/autenticar.php', true);
    
        //Send the proper header information along with the request
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onreadystatechange = function() { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Request finished. Do processing here. 

            if (this.response == 'OK'){
                    setMensaje('Gracias!', 'success', 'Compra realizada con éxito');
            } else if (this.response == 'Owner'){
                setMensaje('Advertencia', 'warning', 'No puede comprar sus propios productos');
                 }
            }
        }

        xhr.send(params);

    } else {
        setMensaje('Advertencia', 'warning', 'Debe iniciar sesión con su usuario para poder comprar');
    }
}