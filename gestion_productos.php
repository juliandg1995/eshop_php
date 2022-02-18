<?php 
    session_start();

    require_once($_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/BD.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/backend/Autenticacion.php');
    
    if (isset($_SESSION)){

        $auth = new Autenticacion();
        $array = $auth->obtenerVariables();
        $s = $array[0];
        $u = $array[1];
        $p = $array[2];
        $db = $array[3];
        $conn = establecerConexion($s,$u,$p,$db);

        $userId = $_SESSION['idUsuario'];

        $sql = "SELECT * FROM productos 
                WHERE idUsuarioVendedor = $userId AND idUsuarioComprador IS NULL";


        if ($conn->query($sql) == TRUE) {

            $resultado = ($conn->query($sql));
            $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
            
            } else {
                echo $conn->error;
                echo "<script>alert('Error al cargar productos')</script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Gestion de Productos</title>
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
        <div class="row border-top py-5">
            <p class="display-3">Pantalla de gestion de productos</p>
            <div class="col text-right">
                <a href="index.php" class="btn btn-link">Volver al inicio</a>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Modal Detalles Producto -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/modal_detalles_producto.html' ?> 

        <!-- Display del producto -->
        <div class="row dflex justify-content-center py-4">
            <?php $id = 0 ?>
            <?php foreach ($articulos as $articulo): ?>
                <div class="col-12 col-sm-6 col-lg-3 mb-4 d-flex align-items-stretch">
                    <div class="card" id="<?php echo 'producto-'.++$id ?>">
                        
                    <?php $blob = $articulo['contenidoimagen'];?>
                        <?php echo '<img id="img-'. $id . '" class="imagen-producto" src="data:image/png;base64,'.base64_encode($blob).'"/>'; ?>
                        
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title text-center nombre-producto" id="<?php echo 'nomProd-'. $id ?>" ><?php echo $articulo['nombre'] ?></h3>
                            <p class="card-text text-center descrip-producto" id="<?php echo 'descProd-'. $id ?>"><?php echo $articulo['descripcion'] ?></p>
                        </div>
                        <div><b><p class="text-center mt-4 precio-producto" id="<?php echo 'preProd-'.$id ?>"><?php echo '$ ' . $articulo['precio'] ?></p></b></div>

                        <div class="card-footer d-flex justify-content-around">
                            <div class="form-group mr-1">
                                <form action="backend/carga_datos/carga_productos/modificar_producto.php" method="POST">
                                    <input type="hidden" name="formName" value="gestionProducto">
                                    <input type="hidden" name="gp_prodId" value="<?php echo $articulo['idProducto'];?>">
                                    <input type="hidden" name="gp_uVendedor" value="<?php echo $articulo['idUsuarioVendedor']?>"> 
                                    <input type="hidden" name="gp_publicacion" value="<?php echo $articulo['publicacion']?>">
                                    <input type="hidden" name="gp_caducidad" value="<?php echo $articulo['caducidad']?>">
                                    <input type="hidden" name="gp_categoria" value="<?php echo $articulo['idCategoriaProducto']?>">
                                    <input type="hidden" name="gp_nombre" value="<?php echo $articulo['nombre']?>">
                                    <input type="hidden" name="gp_descripcion" value="<?php echo $articulo['nombre']?>">
                                    <input type="hidden" name="gp_precio" value="<?php echo $articulo['precio']?>">
                                    <button type="submit" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modalProduct">Modificar Publicacion</button>
                                </form>
                            </div>
                            <div class="form-group ml-1">
                                <form action="backend/autenticar.php" method="POST">
                                    <input type="hidden" name="formName" value="borrarProducto">
                                    <input type="hidden" name="idProducto" value="<?php echo $articulo['idProducto'];?>">
                                    <button type="submit" class="btn btn-sm btn-secondary">Borrar Producto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
    <footer class="container">
        <div class="row border-top py-5">
            <div class="col">
                <h3 class="lead">www.ggtechstore.com</h3>
            </div>
            <div class="col text-right">
                <a href="index.php" class="btn btn-link">Volver al inicio</a>
            </div>
        </div>
    </footer>
    <script src="js/detalles_modificado.js"></script>
    <script src="js/mostrar_detalles.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>