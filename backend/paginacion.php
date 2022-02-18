<?php 
require_once('Autenticacion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/BD.php');

$auth = new Autenticacion();
$array = $auth->obtenerVariables();
$s = $array[0];
$u = $array[1];
$p = $array[2];
$db = $array[3];

function calcularPaginasFiltradasPorCategoria($conexion,$limite,$categoria){
    $inicio = 0;
    $resultado = $conexion->query("SELECT count(idProducto) AS idProducto from productos WHERE idCategoriaProducto = $categoria AND caducidad >= now() AND idUsuarioComprador IS NULL");
    $nroArticulos = $resultado->fetch_all(MYSQLI_ASSOC);
    $totalArticulos = $nroArticulos[0]['idProducto'];
    $nroPaginas = ceil( $totalArticulos / $limite );
    return $nroPaginas;
}

function calcularPaginasFiltradasPorNombre($conexion,$limite,$nombre,$inicio){
    $inicio = 0;
	$resultado1 = $conexion->query("SELECT count(idProducto) AS idProducto FROM productos where  nombre like '%$nombre%' AND caducidad >= now() AND idUsuarioComprador IS NULL LIMIT $inicio, $limite");
	$nroArticulos = $resultado1->fetch_all(MYSQLI_ASSOC);
	$totalArticulos = $nroArticulos[0]['idProducto'];
	$nroPaginas =  ceil( $totalArticulos / $limite );
	return $nroPaginas;
}
function calcularPaginasFiltradasPorNombreYCategoria($conexion,$limite,$nombre,$categoria,$inicio){
    $inicio = 0;
    $resultado1 = $conexion->query("SELECT count(idProducto) AS idProducto FROM productos where  nombre like '%$nombre%' AND idCategoriaProducto = '$categoria' AND caducidad >= now() AND idUsuarioComprador IS NULL LIMIT $inicio, $limite");
    $nroArticulos = $resultado1->fetch_all(MYSQLI_ASSOC);
    $totalArticulos = $nroArticulos[0]['idProducto'];
    $nroPaginas =  ceil( $totalArticulos / $limite );
    return $nroPaginas;
}
function calcularPaginas($conexion,$limite,$inicio){
    $inicio = 0;
	$resultado1 = $conexion->query("SELECT count(idProducto) AS idProducto FROM productos where caducidad >= now() AND idUsuarioComprador IS NULL");
	$nroArticulos = $resultado1->fetch_all(MYSQLI_ASSOC);
	$totalArticulos = $nroArticulos[0]['idProducto'];
	$nroPaginas =  ceil( $totalArticulos / $limite );
	return $nroPaginas;
}
$conexion = establecerConexion($s,$u,$p,$db);
$limite = 5;
$pagina = isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1;
if (isset($_REQUEST['nombre'])) {
    $inicio = ($pagina -1) * $limite;
    $nombre = $_REQUEST['nombre'];
    $resultado = $conexion->query("SELECT * FROM productos where  nombre like '%$nombre%' AND caducidad >= now() AND idUsuarioComprador IS NULL LIMIT $inicio, $limite "); 
    $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
    $nroPaginas = calcularPaginasFiltradasPorNombre($conexion,$limite,$nombre,$inicio);
    
} elseif ($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/busquedaPorCategoria.php"){
    if (isset($_REQUEST['idCategoria'])){
        $idCategoria = $_REQUEST['idCategoria'];
        $inicio = ($pagina-1) * $limite;
        $resultado = $conexion->query("SELECT * FROM productos WHERE idCategoriaProducto = $idCategoria AND caducidad >= now() AND idUsuarioComprador IS NULL LIMIT $inicio, $limite");
        $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
        $nroPaginas = calcularPaginasFiltradasPorCategoria($conexion,$limite,$idCategoria,$inicio);
    }
} 
else {
    $inicio = ($pagina -1) * $limite;
    $resultado = $conexion->query("SELECT * FROM productos where caducidad >= now() AND idUsuarioComprador IS NULL LIMIT $inicio, $limite ");
    $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
    $nroPaginas = calcularPaginas($conexion,$limite,$inicio);
}

if ($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/ordenarPorPrecio.php") { 
                if (isset($nombre)) {
                    $resultado = $conexion->query("SELECT * FROM productos WHERE nombre like '%$nombre%' AND caducidad >= now() AND idUsuarioComprador IS NULL ORDER BY precio ASC LIMIT $inicio, $limite"); 
                    $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
                }
                else{
                    if (isset($_REQUEST['idCategoria'])) {
                        $idCategoria = $_REQUEST['idCategoria'];
                        $resultado = $conexion->query("SELECT * FROM productos WHERE idCategoriaProducto = $idCategoria AND caducidad >= now() AND idUsuarioComprador IS NULL ORDER BY precio ASC LIMIT $inicio, $limite "); 
                        $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
                        $nroPaginas = calcularPaginasFiltradasPorCategoria($conexion,$limite,$idCategoria,$inicio);
                    }
                    else{
                        $resultado = $conexion->query("SELECT * FROM productos where caducidad >= now() AND idUsuarioComprador IS NULL ORDER BY precio ASC LIMIT $inicio, $limite"); 
                        $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
                    }
                }                             
            }
            elseif (isset($_REQUEST['nombre'])&&isset($_REQUEST['idCategoria'])) {
                $nombre = $_REQUEST['nombre'];
                $idCategoria = $_REQUEST['idCategoria'];
                $resultado = $conexion->query("SELECT * FROM productos WHERE idCategoriaProducto = $idCategoria AND nombre like '%$nombre%' AND caducidad >= now() AND idUsuarioComprador IS NULL LIMIT $inicio, $limite ");
                $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
                $nroPaginas = calcularPaginasFiltradasPorNombreYCategoria($conexion,$limite,$nombre,$idCategoria,$inicio);

            }
            else{
                if ($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/ordenarPorFecha.php") {
                    if (isset($nombre)) {
                        $resultado = $conexion->query("SELECT * FROM productos where nombre like '%$nombre%' AND caducidad >= now() AND idUsuarioComprador IS NULL ORDER BY caducidad DESC LIMIT $inicio, $limite"); 
                        $articulos = $resultado->fetch_all(MYSQLI_ASSOC); 
                    }
                    else{
                        if (isset($_REQUEST['idCategoria'])) {
                            $idCategoria = $_REQUEST['idCategoria'];
                            $resultado = $conexion->query("SELECT * FROM productos WHERE idCategoriaProducto = $idCategoria AND caducidad >= now() AND idUsuarioComprador IS NULL ORDER BY precio ASC LIMIT $inicio, $limite "); 
                            $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
                            $nroPaginas = calcularPaginasFiltradasPorCategoria($conexion,$limite,$idCategoria,$inicio);
                        }
                        else{
                            $resultado = $conexion->query("SELECT * FROM productos where caducidad >= now() AND idUsuarioComprador IS NULL ORDER BY caducidad DESC LIMIT $inicio, $limite"); 
                        $articulos = $resultado->fetch_all(MYSQLI_ASSOC);
                        } 
                    }
                }   
            }

$Previous = $pagina - 1;
$Next = $pagina + 1;
?>