<!-- Inicio Modal: Login / Register Form -->
<div class="modal fade login-reg" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <!--Content-->
            <div class="modal-content"> 
            <!--Modal pestañas en cascada-->
                <div class="modal-c-tabs">  
                    <!-- Pestañas de navegador -->
                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                            Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                            Registrar</a>
                        </li>
                    </ul>

                    <!-- Paneles de pestaña -->
                    <div class="tab-content">

                        <!--Inicio: Panel 1-->
                        <div class="tab-pane fade in  show active" id="panel7" role="tabpanel">
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <form id="fInicioSesion" class="customForm" onkeydown="return event.key != 'Enter';" action="backend/autenticar.php" method="POST">
                                    <div class="md-form form-sm mb-3">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input type="text" id="modalLRInput10" name="si_email" class="form-control form-control-sm validate" aria-label="Ingrese Email" placeholder="Su Email:">
                                        <!-- <label data-error="wrong" data-success="right" for="modalLRInput10">Email</label> -->
                                    </div>
                    
                                    <div class="md-form form-sm mb-3">
                                        <i class="fas fa-lock prefix"></i>
                                        <input type="password" id="modalLRInput11" name="si_password" class="form-control form-control-sm validate" aria-label="Ingrese contraseña" placeholder="Su Contraseña:">
                                        <!-- <label data-error="wrong" data-success="right" for="modalLRInput11">Su contraseña</label> -->
                                    </div>
                                    <div class="text-center mt-2">
                                        <input type="hidden" name="formName" id="submitInicio" value="iniciarSesion">
                                        <button type="submit" class="btn btn-outline-dark waves-effect ml-auto" value="Log in">Log In</button> <i class="fas fa-sign-in ml-1"></i>
                                    </div>
                                    <?php if(!empty($errores)): ?>
                                        <div class="error">
                                            <ul>
                                                <?php echo $errores; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </form>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        <!--/ Fin: Panel 1-->
            
                        <!--Inicio: Panel 2-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">
                            <!--Body-->
                            <div class="modal-body">
                                <form class="customForm" id="fRegistro" onkeydown="return event.key != 'Enter';" action="backend/autenticar.php" method="POST">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-12 col-md-6 md-form form-sm mb-1">
                                            <i class="fas fa-user prefix grey-text"></i>
                                            <input type="text" id="orangeForm-name" name="rg_nombre" class="form-control form-control-sm validate" aria-label="nombre" placeholder="Nombre:">
                                            <!-- <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre</label> -->
                                        </div>
                                        <div class="col-12 col-md-6 md-form form-sm mb-1 mt-md-4">
                                            <input type="text" id="orangeForm-sname" name="rg_apellido" class="form-control form-control-sm validate" aria-label="apellido" placeholder="Apellido:">
                                            <!-- <label data-error="wrong" data-success="right" for="orangeForm-sname">Apellido</label> -->
                                        </div>
                                    </div>
                                    <div class="md-form form-sm mb-3">
                                        <input type="text" id="orangeForm-usName" name="rg_nomUsuario" class="form-control form-control-sm validate" aria-label="Nombre de usuario" placeholder="Nombre Usuario:">
                                        <!-- <label data-error="wrong" data-success="right" for="orangeForm-usName">Nombre de usuario</label> -->
                                    </div>

                                    <div class="md-form form-sm mb-3">
                                        <i class="fa fa-phone prefix" ></i>
                                        <input type="text" id="orangeForm-telephone" name="rg_telefono" class="form-control form-control-sm validate" aria-label="Telefono" placeholder="Telefono:">
                                        <!-- <label data-error="wrong" data-success="right" for="orangeForm-telephone">Telefono</label> -->
                                    </div>

                                    <div class="md-form form-sm mb-3">
                                        <i class="far fa-envelope"></i>
                                        <input type="text" id="modalLRInput12" name="rg_email" class="form-control form-control-sm validate" aria-label="Email" placeholder="Email:">
                                        <!-- <label data-error="wrong" data-success="right" for="modalLRInput12">Email</label> -->
                                    </div>
                    
                                    <div class="md-form form-sm mb-1">
                                        <i class="fas fa-lock prefix"></i>
                                        <input type="password" id="modalLRInput13" name="rg_passw" class="form-control form-control-sm validate" aria-label="Contraseña" placeholder="Contraseña:">
                                        <!-- <label data-error="wrong" data-success="right" for="modalLRInput13">Su contraseña</label> -->
                                    </div>
                    
                                    <div class="md-form form-sm mb-3">
                                        <input type="password" id="modalLRInput14" name="rg_passwRep" class="form-control form-control-sm validate" aria-label="Repita contraseña" placeholder="Repita Contraseña:">
                                        <!-- <label data-error="wrong" data-success="right" for="modalLRInput14">Repita la contraseña</label> -->
                                    </div>
                    
                                    <div class="text-center form-sm mt-2">
                                        <input type="hidden" name="formName" value="registrar">
                                        <input type="submit" id="submitRegistro" value="Registrarse"> <i class="fas fa-sign-in ml-1"></i>
                                    </div>
                                    <?php if(!empty($errores)): ?>
                                        <div class="error">
                                            <ul>
                                                <?php echo $errores; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                        <!--/Fin: Panel 2-->

                    </div>
                </div>
            </div>
          <!--/.Content-->
        </div>
    </div>
    <!-- Fin Modal: Login / Register Form-->