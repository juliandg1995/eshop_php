<?php

    require_once "Autenticacion.php";
    class Categorias_productos{
        
        static function obtenerCategoriaPorNombre($nombre){
            $conn = new Autenticacion;
            $conn = establecerConexion($conn->servername,$conn->username,$conn->password,$conn->dbname);
            $sql = "SELECT idCategoriaProducto FROM categorias_productos where nombre = $nombre";
            $resultado = $conn->query($sql);
            foreach ($resultado as $res){
                var_dump($res["nombre"]);
            }
            $conn->close();
            return $resultado;
        }
        function agregarCategoria(){
            $conn = new Autenticacion;
            $conn = establecerConexion($this->servername,$this->username,$this->password,$this->dbname);
            $valor = $_POST['nombre'];
            $sql = "SELECT * FROM categorias_productos WHERE nombre = '$valor' limit 1";
            $resultado = $conn->query($sql)->fetch_assoc();
            if (!$resultado) {
                $sql = "INSERT INTO categorias_productos (nombre) VALUES ('$valor');";
                $resultado = $conn->query($sql);
                echo(($resultado) ? "Inserción exitosa" : "Inserción fallida");
            }
            else {
                echo"La categoría ya existe en la base de datos";
            }
            $conn->close();
        }
    }
?>