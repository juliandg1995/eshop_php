<?php
session_start();
require_once("Autenticacion.php");
require_once("Categorias_productos.php");
require_once("Productos.php");

$controladorAuth = new Autenticacion;
$controladorCat = new Categorias_productos;
$controladorPro = new Productos;

switch ($_POST['formName']) {
    case 'iniciarSesion':
        $controladorAuth->iniciarSesion();
        break;
    case 'registrar':
        $controladorAuth->registrarse();
        break;
    case 'cerrarSesion':
        $controladorAuth->cerrarSesion();
        break;
    case "obtenerCategoria":
        $controladorCat->obtenerCategoriaPorNombre($_POST['nombre']);
        break;
    case "agregarCategorias":
        $controladorCat->agregarCategoria();
        break;
    case "obtenerProductos":
        $controladorPro->obtenerProductos();
        break;
    case "agregarProducto":
        $controladorPro->agregarProducto();
        break;
    case "guardarCambios":
        $controladorAuth->guardarCambios();
        break;
    case "comprarProducto":
        $controladorPro->comprarProducto($_POST['idProducto'],$_POST['idVendedor']);
        break;
    case "cambiarProducto":
        $controladorPro->editarProducto();
        break;
    case "borrarProducto":
        $controladorPro->borrarProducto();
        break;
}
?>