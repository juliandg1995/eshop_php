<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/e-shop_actual/BD.php');

class Autenticacion {
    
    private $servername = "localhost"; private $username = "root"; 
    private $password = ""; private $dbname = "basedeclientes"; private $conn;
    
    function obtenerVariables(){
        $s = $this->servername;
        $u = $this->username;
        $p = $this->password;
        $db = $this->dbname;
        $array = array($s,$u,$p,$db);
        return $array;
    }

    function registrarse(){
        if (isset($_POST) && (filter_var($_POST['rg_email'], FILTER_VALIDATE_EMAIL))){ 
            if (!in_array('',$_POST)){
                $this->conn = establecerConexion($this->servername,$this->username,$this->password,$this->dbname);
                $user = $_POST['rg_nomUsuario'];
                $correo = $_POST['rg_email'];
                $sql = "SELECT * FROM usuarios WHERE nombredeusuario = '$user' or email = '$correo'";
                $result = ($this->conn->query($sql))->fetch_assoc();
                if ($result == null) {
                    if ($_POST['rg_passw'] == $_POST['rg_passwRep']) {
                        $nombredeusuario = $_POST['rg_nomUsuario']; $clave = $_POST['rg_passw']; $apellido = $_POST['rg_apellido'];
                        $nombre = $_POST['rg_nombre']; $email = $_POST['rg_email']; $telefono = $_POST['rg_telefono'];
                        $sql = "INSERT INTO usuarios (nombredeusuario,clave,apellido,nombre,email,telefono) VALUES ('$nombredeusuario','$clave','$apellido','$nombre','$email','$telefono')";
                        $resultadoQuery = $this->conn->query($sql);
                        echo(($resultadoQuery)?("Registrado correctamente <br>"):("Registro fallido <br>"));
                        header('Location: ../index.php');
                    }
                    else {
                        echo "Las claves no son iguales, intente nuevamente";
                    }
                }
                else { 
                    echo "Usuario ya registrado anteriormente"; 
                    header('Location: ../index.php');
                }
            $this->conn->close();
            }
            else{
                echo "Por favor, llene todos los campos<br>";
            }
        }
        else{
            echo "Hay un problema seteando el POST<br>";
        }
    }
    function iniciarSesion(){  
        if(isset($_POST)){
            if(!in_array('',$_POST)){
                //session_start();
                $this->conn = establecerConexion($this->servername,$this->username,$this->password,$this->dbname);
                $email = $_POST['si_email'];
                $sql = "SELECT * from usuarios where email='$email' limit 1";
                $result = $this->conn->query($sql)->fetch_assoc();
                if ($result){
                    try {
                        if($result['clave'] == $_POST['si_password']){
                            $_SESSION['nombre'] = $result['nombre'];
                            $_SESSION['apellido'] = $result['apellido'];
                            $_SESSION['usuario'] = $result['nombredeusuario'];
                            $_SESSION['email'] = $result['email'];
                            $_SESSION['telefono'] = $result['telefono'];
                            $_SESSION['idUsuario'] = $result['idUsuario'];
                            header('Location: ../index.php');
                        }
                        else {
                            throw new Exception('Los datos que ha ingresado para iniciar sesion son incorrectos');
                        }
                    }
                    catch (Exception $e) {
                        echo $e->getMessage();
                        echo "   <a href='../index.php'>Atrás</a>";
                    }
                }
                else{
                    header('Location: ../index.php');
                    
                }
            $this->conn->close();
            }
            else {
                echo "Por favor, llene todos los campos<br>";
            }
        }
        else {
            echo "Hay un problema seteando el POST<br>";
        }
    }

/*
try {
    if($result['clave'] == $_POST['si_password']){
        // $_SESSION['nombreCompleto'] = $result['nombre'] . " " . $result['apellido'];
        $_SESSION['nombre'] = $result['nombre'];
        $_SESSION['apellido'] = $result['apellido'];
        $_SESSION['usuario'] = $result['nombredeusuario'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['telefono'] = $result['telefono'];
        $_SESSION['idUsuario'] = $result['idUsuario'];
        header('Location: ../index.php');
    }
    else {
        throw new Exception('Los datos que ha ingresado para iniciar sesion son incorrectos');
  }
catch (Exception $e) {
  echo $e->getMessage();
}
*/










    function cerrarSesion(){
        session_unset();
        header('Location: ../index.php');

    }

    function guardarCambios(){
        if(isset($_POST)){

                $this->conn = establecerConexion($this->servername,$this->username,$this->password,$this->dbname);

                $userId = $_SESSION['idUsuario'];
                $nuevoNombre = $_POST['gc_nombre'];
                $nuevoApellido = $_POST['gc_apellido'];
                $nuevoNomCuenta = $_POST['gc_userAccName'];
                $nuevoEmail = $_POST['gc_userEmail'];
                $nuevoTelefono = $_POST['gc_userTelephone'];
                $passConfirm = $_POST['gc_passConfirm'];
                $nuevaPass1 = $_POST['gc_changePass1'];
                $nuevaPassConfirm = $_POST['gc_changePass2'];

                var_dump($passConfirm);
                echo $nuevaPass1;
                echo $nuevaPassConfirm;

                if ($nuevaPass1 == '' || $nuevaPassConfirm == '' ){

                    
                    $sql = "UPDATE usuarios SET nombredeusuario='$nuevoNomCuenta', apellido='$nuevoApellido', nombre='$nuevoNombre', email='$nuevoEmail', telefono='$nuevoTelefono' 
                            WHERE idUsuario=$userId AND clave='$passConfirm'";
                    
                    $resultado = $this->conn->query($sql);

                    if ($resultado == TRUE && $this->conn->affected_rows > 0) {

                        $_SESSION['nombre'] = $nuevoNombre;
                        $_SESSION['apellido'] = $nuevoApellido;
                        $_SESSION['usuario'] = $nuevoNomCuenta;
                        $_SESSION['email'] = $nuevoEmail;
                        $_SESSION['telefono'] = $nuevoTelefono;

                        echo 'Datos actualizados correctamente';
                        header('Location: ../index.php');
                        echo "<script>alert('Datos actualizados correctamente')</script>";
                        } else {
                        echo 'Error al actualizar los datos: ' . $this->conn->error;
                        header('Location: ../index.php');
                        echo "<script>alert('Error al actualizar los datos')</script>";
                        }
                } elseif ($nuevaPass1 == $nuevaPassConfirm) {

                    $sql = "UPDATE usuarios SET clave='$nuevaPass1' WHERE idUsuario=$userId AND clave='$passConfirm'";
                    
                    $resultado = $this->conn->query($sql);

                    if ($resultado == TRUE && $this->conn->affected_rows > 0) {

                            $_SESSION['nombre'] = $nuevoNombre;
                            $_SESSION['apellido'] = $nuevoApellido;
                            $_SESSION['usuario'] = $nuevoNomCuenta;
                            $_SESSION['email'] = $nuevoEmail;
                            $_SESSION['telefono'] = $nuevoTelefono;

                            echo "Contraseña modificada correctamente";
                            header('Location: ../index.php');
                            echo "<script>alert('Contraseña actualizada correctamente')</script>";
                        } else {
                            echo "Error al modificar contraseña: " . $this->conn->error;
                            header('Location: ../index.php');
                            echo "<script>alert('Error al modificar la contraseña')</script>";
                        }
                }         
        }
    }

    public function getServername()
    {
        return $this->servername;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getDbname()
    {
        return $this->dbname;
    }
}
?>