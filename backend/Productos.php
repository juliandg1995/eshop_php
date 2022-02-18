<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/BD.php');
    require_once("Autenticacion.php");
    require_once('Categorias_productos.php');
    
    class Productos{
        function obtenerProductos(){
            $conn = new Autenticacion;
            $conn->obtenerVariables();
            $conn = establecerConexion($conn->getServername(),$conn->getUsername(),$conn->getPassword(),$conn->getDbname());
            $sql = "SELECT * FROM productos";
            $resultado = $conn->query($sql);
            foreach ($resultado as $res){
                var_dump($res["nombre"]);
            }
            $conn->close();
        }

        function agregarProducto(){
            if (isset($_SESSION)) {
                $conn = new Autenticacion;
                $conn->obtenerVariables();
                $conn = establecerConexion($conn->getServername(),$conn->getUsername(),$conn->getPassword(),$conn->getDbname());
                $nombre = $_POST['nombre'];
                $categoria = $_POST['categoria'];
                $vendedor = $_SESSION['idUsuario'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $publicacion = date('Y-m-d');
                $caducidad = $_POST['inputFCad'];
                $contenidoImagen = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
                $tipoImagen = $_POST['cars'];
                $sql = "INSERT INTO
                    productos (idCategoriaProducto,IdUsuarioVendedor,nombre,descripcion,
                    precio,publicacion,caducidad,contenidoImagen,tipoImagen)
                    VALUES ($categoria,$vendedor,'$nombre','$descripcion',$precio,'$publicacion',
                    '$caducidad','$contenidoImagen','$tipoImagen')";
                $resultado = $conn->query($sql);
                //var_dump($conn->error);
                //ECHO"<br>";
                echo($resultado == true ? "Producto agregado correctamente" : "Producto no agregado");
                $conn->close();
                header('Location: ../gestion_productos.php');
                exit;
            }
            else{
                echo 'Debe tener una sesión iniciada para realizar una publicación de producto';
            }
         }

         function comprarProducto($idProducto,$idVendedor){
            if (isset($_SESSION)) {
                $idComprador = $_SESSION['idUsuario'];
                if ($idComprador != $idVendedor) {
                    $conn = new Autenticacion;
                    $conn->obtenerVariables();
                    $conn = establecerConexion($conn->getServername(),$conn->getUsername(),$conn->getPassword(),$conn->getDbname());
                    $sql = "UPDATE productos set idUsuarioComprador = $idComprador WHERE idProducto = $idProducto";

                    $resultado = $conn->query($sql);
                    // echo "Compra realizada con éxito";
                    echo "OK";
                    $conn->close();
                    // header('Location: ../gestion_productos.php')
                }
                else{
                    // echo "No puede comprar un producto que usted haya publicado";
                    echo "Owner";
                }
            }
            else{
                echo 'NotLogged';
            }
         }

         function editarProducto(){
            if (isset($_SESSION)) {
                $idProducto = $_POST['mp_idProducto'];
                $nombre = $_POST['nombre'];
                $categoria = $_POST['categoria'];
                $idUsuario = $_SESSION['idUsuario'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $publicacion = date('Y-m-d');
                $caducidad = $_POST['inputFCad'];
                $contenidoImagen = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
                $tipoImagen = $_POST['cars'];
                $conn = new Autenticacion;
                $conn->obtenerVariables();
                $conn = establecerConexion($conn->getServername(),$conn->getUsername(),$conn->getPassword(),$conn->getDbname());
                if ($contenidoImagen == null) {
                    $sql = "UPDATE productos set idCategoriaProducto = $categoria, IdUsuarioVendedor = $idUsuario, nombre = '$nombre',descripcion = '$descripcion', precio = $precio, publicacion = '$publicacion', caducidad = '$caducidad' WHERE idProducto = $idProducto";
                }
                else{
                    $sql = "UPDATE productos set idCategoriaProducto = $categoria, IdUsuarioVendedor = $idUsuario, nombre = '$nombre',descripcion = '$descripcion', precio = $precio, publicacion = '$publicacion', caducidad = '$caducidad', contenidoimagen = '$contenidoImagen', tipoImagen = '$tipoImagen' WHERE idProducto = $idProducto";
                }
                $resultado = $conn->query($sql);
                header('Location: ../gestion_productos.php');
                $conn->close();
            }
        }

        function borrarProducto(){
            if (isset($_SESSION)) {
                $conn = new Autenticacion;
                $conn->obtenerVariables();
                $conn = establecerConexion($conn->getServername(),$conn->getUsername(),$conn->getPassword(),$conn->getDbname());
                $idProducto = $_POST['idProducto'];
                $sql = "DELETE FROM productos WHERE idProducto = $idProducto AND idUsuarioComprador IS NULL";
                $resultado = $conn->query($sql);
                $conn->close();
                header('Location: ../gestion_productos.php');
            }
        }
    }
?>