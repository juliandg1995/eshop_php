<?php
	session_start();
	require_once("Productos.php");
	$controladorPro = new Productos;
	$controladorPro->agregarProducto();
?>