
<?php 
    // require_once($_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/backend/autenticar.php');

    $errorDatosIncompletos = false; // Luego hay que setear un script para el error al final del html, para que lo active el submit en caso de error

    $userId = $_SESSION['idUsuario'];
    // $userFullName = $_SESSION['nombreCompleto'];
    $userName = $_SESSION['nombre'];
    $userSName = $_SESSION['apellido'];
    $userAccName = $_SESSION['usuario'];
    $userEmail =  $_SESSION['email'];
    $userTelephone = $_SESSION['telefono'];

?>

<!-- Inicio Modal: Perfil Usuario   -->
<div class="modal fade perfil" id="modalProfileForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center bg-dark text-light">
                    <h4 class="modal-title w-100 font-weight-300">Mi Perfil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form onkeydown="return event.key != 'Enter';" action="backend/autenticar.php" method="POST" enctype="multipart/form-data">

                        <div class="md-form mb-1">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="form34" class="form-control validate" name="gc_nombre" placeholder="<?php echo $userName ?>" value="<?php echo $userName ?>">
                            <label data-error="wrong" data-success="right" for="form34">Nombre de pila</label>
                            <input type="text" id="form38" class="form-control validate" name="gc_apellido" placeholder="<?php echo $userSName ?>" value="<?php echo $userSName ?>">
                            <label data-error="wrong" data-success="right" for="form38">Apellido</label>
                            <input type="text" id="form35" name="gc_userAccName" class="form-control validate" placeholder="<?php echo $userAccName ?>" value="<?php echo $userAccName ?>">
                            <label data-error="wrong" data-success="right" for="form35">Nombre de Usuario</label>
                        </div>

                        <div class="md-form mb-1">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="form29" name="gc_userEmail" class="form-control validate" placeholder="<?php echo $userEmail ?>" value="<?php echo $userEmail ?>">
                            <label data-error="wrong" data-success="right" for="form29">Su Email</label>
                        </div>

                        <div class="md-form mb-1">
                            <i class="fa fa-phone prefix grey-text"></i>
                            <input type="text" id="form36" name="gc_userTelephone" class="form-control validate" placeholder="<?php echo $userTelephone ?>" value="<?php echo $userTelephone ?>">
                            <label data-error="wrong" data-success="right" for="form36">Su Teléfono</label>
                        </div>
                        
                        <!-- Inputs para el cambio de contraseña -->
                        <h6 class="text-center mt-3">¿Desea cambiar su contraseña?</h6>
                    
                        <div class="md-form form-sm mb-3">
                            <input type="password" id="newPass1" name="gc_changePass1" class="form-control form-control-sm validate" aria-label="Ingrese nueva contraseña" placeholder="Ingrese nueva contraseña:" value="">
                        </div>
                        
                        <div class="md-form form-sm mb-3">
                            <input type="password" id="newPass2" name="gc_changePass2" class="form-control form-control-sm validate" aria-label="Repita nueva contraseña" placeholder="Repita nueva contraseña:" value="">
                        </div>
                        <div class="md-form form-sm">
                            <input type="hidden" name="gc_userId" value="<?php echo $userId?>">
                        </div>

                        <p class="text-center">Para confirmar cambios, ingrese su contraseña actual</p>

                        <div class="md-form form-sm mb-4">
                            <!-- <i class="fas fa-lock prefix"></i> -->
                            <input type="password" id="oldPassword" name="gc_passConfirm" class="form-control form-control-sm validate" aria-label="Contraseña actual" placeholder="Contraseña actual:" value="">
                        </div>
                        
                        <input type="hidden" name="formName" value="guardarCambios">
                        
                        <div class="modal-footer d-flex justify-content-around mt-4">
                            <button type="submit" id="guardarCambios" class="btn btn-dark">Guardar Cambios</button>
                            <a id="gestionProductos" href="http://localhost/e-shop_actual/gestion_productos.php" class="btn btn-dark">Gestionar Productos</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal: Perfil -->