
const nombre = document.getElementById('inputNombre');
const descripcion = document.getElementById('inputDescripcion');
const categoria = document.getElementById('idCategoria');
const precio = document.getElementById('inputPrecio');
const fCad = document.getElementById('inputFCad');
const img = document.getElementById('selec_imag');
const imType = document.getElementById('tipoImagen');
const botonSubm = document.getElementById('agregarProd');


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
       stopKeydownPropagation: false
   })
}

function validarProducto(ok){
    if (nombre.innerHTML == null || 
        descripcion.innerHTML == null ||
        categoria.innerHTML == null ||
        precio.innerHTML == null ||
        fCad.innerHTML == null ||
        img.value == '' ||
        imType == null){
            ok = false;
        }
        return ok;
}

botonSubm.addEventListener('click', (e) => {
    var ok = true;
    if (!validarProducto(ok)){
        e.preventDefault();
        setMensaje('Atención', 'warning', 'Por favor, llene todos los campos con la información del producto');
    } else {
        this.unbind('submit').submit();
    }
});