<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/backend/paginacion.php';

session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/logo.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GGTechStore</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mis_estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <style>
        body {padding-top: 36px;}
    </style>
</head>
<body>

    <?php 
        $ubicacion= $_SERVER["SCRIPT_FILENAME"];
        if (isset($_SESSION) && (empty($_SESSION) == true)) {
            // Modal Registro/Login
            include_once "loginRegister.php";
        } else { 
            // Modal Perfil Usuario
            include_once "modal_perfil.php"; }                     
    ?>

    <!-- Modal: Detalles Producto -->
        <?php include_once "modal_detalles_producto.html" ?> 

    <!-- Header/Navbar -->
    <header>
        <nav class="my-navbar main-nav navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="my-container container">
                <a href="index.php" class="navbar-brand"><span class="mr-lg-4">GG Tech Store</span></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
                aria-label="Menu de Navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar">

                    <!-- Menu de Categorias -->
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                            <!-- Este link funciona como etiqueta de los siguientes elementos: -->
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="1">
                                    <button type="submit" class="dropdown-item" value="1">Notebooks y Tablets</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="2">
                                    <button type="submit" class="dropdown-item" value="1">Perifericos</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="3">
                                    <button type="submit" class="dropdown-item" value="1">Memorias</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="4">
                                    <button type="submit" class="dropdown-item" value="1">Discos Almacenamiento</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="5">
                                    <button type="submit" class="dropdown-item" value="1">Gabinetes y Fuentes</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="6">
                                    <button type="submit" class="dropdown-item" value="1">Placas de video</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="7">
                                    <button type="submit" class="dropdown-item" value="1">Monitores</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="8">
                                    <button type="submit" class="dropdown-item" value="1">Procesadores</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="9">
                                    <button type="submit" class="dropdown-item" value="1">Placas Madre</button>
                                </form>
                                <form action="busquedaPorCategoria.php">
                                    <input type="hidden" name="idCategoria" value="10">
                                    <button type="submit" class="dropdown-item" value="1">Consolas</button>
                                </form>
                            </div>
                        </li>
                    </ul>

                    <!-- Botones de búsqueda según filtrado -->
                    <?php if ($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/busquedaPorCategoria.php") {
                        if (isset($_REQUEST['idCategoria'])&&isset($_REQUEST['nombre'])) { ?>
                              <form class="form-inline my-2 my-lg-0" action="busquedaPorNombre.php?idCategoria=<?= $idCategoria; ?>&nombre=<?= $nombre; ?>" method="POST">
                            <input type="hidden" name="accion" value="filtrarPorNombre">
                            <input type="search" name="nombre" class="form-control mr-sm-2" placeholder="Búsqueda" aria-label="Busqueda">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" id="botonBuscar">Buscar</button>
                        </form>
                         <?php }
                         else{  ?>
                        <form class="form-inline my-2 my-lg-0" action="busquedaPorNombre.php?idCategoria=<?= $idCategoria; ?>" method="POST">
                            <input type="hidden" name="accion" value="filtrarPorNombre">
                            <input type="search" name="nombre" class="form-control mr-sm-2" placeholder="Búsqueda" aria-label="Busqueda">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" id="botonBuscar">Buscar</button>
                        </form>
                    <?php } 
                    }
                    else{
                        if (isset($_REQUEST['idCategoria'])) { ?>
                            <form class="form-inline my-2 my-lg-0" action="busquedaPorNombre.php?idCategoria=<?= $idCategoria;?>" method="POST">
                            <input type="hidden" name="accion" value="filtrarPorNombre">
                            <input type="search" name="nombre" class="form-control mr-sm-2" placeholder="Búsqueda" aria-label="Busqueda">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" id="botonBuscar">Buscar</button>
                        </form>
                   <?php  }
                        else{ 
                      ?>
                      <form class="form-inline my-2 my-lg-0" action="busquedaPorNombre.php" method="POST">
                            <input type="hidden" name="accion" value="filtrarPorNombre">
                            <input type="search" name="nombre" class="form-control mr-sm-2" placeholder="Búsqueda" aria-label="Busqueda">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" id="botonBuscar">Buscar</button>
                        </form>
                    <?php } ?>
                    <!-- Modal: Login / Register Form -->
                    
                    <?php
                        }
                        $ubicacion= $_SERVER["SCRIPT_FILENAME"];
                        if (empty($_SESSION)) {
                            include_once "botonLoginRegister.php";
                        }
                        else{
                            include_once "Perfil_cerrarSesion.php";
                        }
                    ?>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Main --> 
    <div class="container">

        <!-- Inicio: Carousel de imagenes -->
        <div class="row mt-5">
            <div class="col">
                <div class="carousel slide" id="principal-carousel" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#principal-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#principal-carousel" data-slide-to="1"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/carrusel1.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/carrusel2.jpg" class="d-block w-100" alt="">
                        </div>
                    </div>
    
                    <a href="#principal-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a href="#principal-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>    
        <!-- Fin: Carousel imagenes -->

        <div class="row">
            <div class="col-12">
                <div class="py-4 border-bottom">
                    <h1 class="text-center">Productos</h1>
                </div>
            </div>
        </div>
        
        <!-- Botones Filtro -->
        <?php include_once "botonesOrdenar.php"; ?>
      
        <!-- Display del producto -->
        <div class="row dflex justify-content-center py-4">
            <?php $id = 0; $logged = false; if(!empty($_SESSION)){$logged=TRUE;}?>
            <?php foreach ($articulos as $articulo): ?>
                <div class="col-12 col-sm-6 col-lg-3 mb-4 d-flex align-items-stretch">
                    <div class="card" id="<?php echo 'producto-'.++$id ?>" data-id="<?php echo $articulo['idProducto']?>" data-vendedor="<?php echo $articulo['idUsuarioVendedor']?>"  data-fPublicacion="<?php echo $articulo['publicacion']?>" data-fCaducidad="<?php echo $articulo['caducidad']?>">
                        
                    <?php $blob = $articulo['contenidoimagen'];?>
                        <?php echo '<img id="img-'. $id . '" class="imagen-producto" src="data:image/png;base64,'.base64_encode($blob).'"/>'; ?>
                        
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title text-center nombre-producto" id="<?php echo 'nomProd-'. $id ?>" ><?php echo $articulo['nombre'] ?></h3>
                            <p class="card-text text-center descrip-producto" id="<?php echo 'descProd-'. $id ?>"><?php echo $articulo['descripcion'] ?></p>
                        </div>
                        <div><b><p class="text-center mt-4 precio-producto" id="<?php echo 'preProd-'.$id ?>"><?php echo '$ ' . $articulo['precio'] ?></p></b></div>

                        <div class="card-footer d-flex justify-content-around">
                            <button class="btn btn-info btn-sm boton-comprar" onclick="comprar(document.getElementById('<?php echo 'producto-'.$id ?>'),'<?php echo $logged === TRUE ? '1':'0'; ?>')">Comprar</button>
                            <button class="btn btn-sm btn-secondary boton-detalles" onclick="mostrarInfo(document.getElementById('<?php echo 'producto-'.$id ?>'))" data-toggle="modal" data-target="#modalProduct">Detalles</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

         <!-- Barra de paginacion -->
         <?php include_once "barraNormal.php";?>

    </div>
    
    <!-- Footer -->
    <footer class="container">
        <div class="row border-top py-5">
            <div class="col">
                <h3 class="lead">www.ggtechstore.com</h3>
            </div>
            <div class="col text-right">
                <a href="#" class="btn btn-link">Volver al inicio</a>
            </div>
        </div>
    </footer>
    
    <script src="js/validacionFormularios.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/mostrar_detalles.js"></script>
    <script src="js/comprar.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>