<!-- <?php 

//include_once("C:\xampp\htdocs\Seminario_PHP\practica\e-shop_actual\backend/Productos.php");

?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Carga de Productos</title>
    <style>
        .form-margen {
            margin-top: 35px;
            border: 1px solid #000;
            background: #e2e2e2;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
    <body>
        <header class="container">
            <div class="row">
                <div class="col-10">
                    <p class="display-3">Pantalla de carga: Productos</p>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <!-- <p class="display-3">Pantalla de carga: Productos</p> -->
                    <form action='../../cargaProducto.php' method="POST" class="form-margen" onkeydown="return event.key != 'Enter';" enctype="multipart/form-data">

                        <!-- Para crear un formulario con Bootstrap, hay que encerrar el label y el input dentro de un div con la clase .form-group -->
                        <!-- Tanto los inputs como los text-area deben llevar la clase .form-control -->

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripcion</label>
                            <input type="text" class="form-control" id="inputDescripcion" name="descripcion" placeholder="Descripcion">
                        </div>
                        <div class="form-group">
                            <label for="idCategoria">Seleccione categoria del producto</label>
                            <select  class="form-control" id="idCategoria" name="categoria">
                                <option value="1">Notebooks y Tablets</option>
                                <option value="2">Perifericos</option>
                                <option value="3">Memorias</option>
                                <option value="4">Discos Almacenamiento</option>
                                <option value="5">Gabinetes y Fuentes</option>
                                <option value="6">Placas de Video</option>
                                <option value="7">Monitores</option>
                                <option value="8">Procesadores</option>
                                <option value="9">Placas Madre</option>
                                <option value="10">Consolas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>  
                            <input type="text" class="form-control" id="inputPrecio" name="precio" placeholder="Precio">
                        </div>
                        <div class="form-group">
                            <label for="inputFCad" class="col-sm-2 col-form-label">Fecha Caducidad</label>
                            <input type="date" class="form-control" id="inputFCad" name="inputFCad">
                        </div>

                        <div class=" row form-group dflex justify-content-around align-content-center">
                            <div class="col-3">
                                <label for="select_imag">Seleccione Archivo</label>
                                <input type="file" id="selec_imag"  name="f1">
                            </div>
                            <div class="col-3">
                                <label for="tipoImagen">Seleccione tipo de imagen</label>
                                <select name="cars" class="form-control" id="tipoImagen" name="tipoImagen">
                                    <option value="jpg">JPG</option>
                                    <option value="png">PNG</option>
                                    <option value="gif">GIF</option>
                                </select>
                            </div>
                            <input type="hidden" name="formName" value="agregarProducto">
                            <div class="col-3">     
                                <button type="submit" class="btn btn-dark" id="agregarProd">Agregar Producto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer class="container">
            <div class="row border-top py-5">
                <div class="col">
                    <h3 class="lead">www.ggtechstore.com</h3>
                </div>
                <div class="col text-right">
                    <a href="../../../index.php" class="btn btn-link">Volver al inicio</a>
                </div>
            </div>
        </footer>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="js/validacion.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>