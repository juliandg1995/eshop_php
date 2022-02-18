// fInicioSesion --> Id del form: inicio sesión
// modalLRInput10 --> Id input para el mail
// modalLRInput11 --> Id input para la contraseña
// submitInicio --> Id submit

// fRegistro --> Id del form de Registro
// orangeForm-name --> Id del nombre 
// orangeForm-sname --> Id del apellido 
// orangeForm-usName --> Id del nombre usuario 
// orangeForm-telephone --> Id del telefono 
// modalLRInput12 --> Id del mail
// modalLRInput13 --> Id de la contraseña
// modalLRInput14 --> Id de la confirmacion de contraseña
// submitRegistro --> Id del submit

const login = document.getElementById("fInicioSesion");   //fInicioSesion
const registro = document.getElementById("fRegistro"); //fRegistro

const mailInicio = document.getElementById('modalLRInput10');
const passInicio = document.getElementById('modalLRInput11');

const nombreReg = document.getElementById('orangeForm-name');
const apellidoReg = document.getElementById('orangeForm-sname');
const nomUsRegistro = document.getElementById('orangeForm-usName');
const telefonoReg = document.getElementById('orangeForm-telephone');
const mailReg = document.getElementById('modalLRInput12');
const passReg = document.getElementById('modalLRInput13');
const confirmPassReg = document.getElementById('modalLRInput14');

function setMsj (titulo, tipo, mensaje) {
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

// Validación del login
function checkInputsLogin(ok){

    var contenidoMail = mailInicio.value.trim();
    var contenidoPass = passInicio.value.trim();

    if (contenidoMail == '' || contenidoPass == ''){
        setMsj('Error', 'error', 'Por favor, llene todos los campos');
    } else {
        ok = true;
    }
    return ok;
}
/*
function validarInicioSesion(){
        var contenidoMail = mailInicio.value.trim();
        var contenidoPass = passInicio.value.trim();

        var url = "backend/autenticar.php";
        var params = "formName=iniciarSesion&si_email="+contenidoMail+"$si_password="+contenidoPass; //PARAMETROS
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "backend/autenticar.php?formName=iniciarSesion&si_email="+contenidoMail+"$si_password="+contenidoPass , true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        //xhr.send(params);
        //console.log(contenidoMail);
        //console.log(contenidoPass);
        xhr.onreadystatechange = function() { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                setMsj('Error', 'error', this.responseText);
                alert('ENTRO ACA al IF');
            }
        };
        xhr.send(params);
        
    }
*/






// Validación del Registro
function checkInputsRegistro(ok){

    var contenidoNombre = nombreReg.value.trim();
    var contenidoApe = apellidoReg.value.trim();
    var contenidoUser = nomUsRegistro.value.trim();
    var contenidoTel = telefonoReg.value.trim();
    var contenidoMail = mailReg.value.trim();
    var contenidoPass = passReg.value.trim();
    var contenidoConfPass = confirmPassReg.value.trim();

    if(contenidoNombre == '' || 
       contenidoApe == '' || 
       contenidoUser == '' || 
       contenidoTel == '' || 
       contenidoMail == '' || 
       contenidoPass == '' || 
       contenidoConfPass == '') {

        setMsj('Error', 'error', 'Por favor, llene todos los campos correctamente');

    } else if (contenidoPass != contenidoConfPass ) {
            
        setMsj('Atención', 'warning', 'Las dos contraseñas ingresadas no coinciden'); 
    
    } else if ((contenidoMail.search('@') == -1) || (contenidoMail.search('.com') == -1)) {
    
       setMsj('Atención', 'warning', 'Verifique el formato del mail ingresado');
    
    } else {
        ok = true;
    }
    return ok;
}

login.addEventListener('submit', (e) => {
    var ok = false;
    if (!checkInputsLogin(ok)){
        e.preventDefault();
    } else {
        e.unbind('submit').submit();
    }
});

registro.addEventListener('submit', (e) => {
    var ok = false;
    if (!checkInputsRegistro(ok)){
        e.preventDefault();
    } else {
        e.unbind('submit').submit();
    }
});



