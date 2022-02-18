<?php
    function establecerConexion($servername,$username,$password,$dbname){
        $conn = new mysqli($servername,$username,$password,$dbname);
        $conn->connect_error ? die('Conexión fallida: ' . $conn->connect_error) : $conn;
    return $conn;
    }
?>