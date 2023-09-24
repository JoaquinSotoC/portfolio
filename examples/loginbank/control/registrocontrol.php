<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$db=$conexion = mysqli_connect("localhost","id20740173_usuario","jMJHC34r_NFB4Q\V","id20740173_based");

if (isset($_POST["registrar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $curp = $_POST["CURP"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

        if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["CURP"]) || empty($_POST["telefono"]) || empty($_POST["estado"])  || empty($_POST["email"]) || empty($_POST["pass"]) ) {
        echo '<div><font color="red"><center>Favor de llenar todos los campos</center></font></div>';
    } else {
        $sql_u = "SELECT * FROM clientes WHERE correo='$email'";
        $res_u = $db->query($sql_u);
        if ($res_u->num_rows > 0) {
            echo '<div><font color="red"><center>El correo ya está en uso</center></font></div>';
        } else {
            $sql=$conexion->query( "insert into clientes(nombre, apellido, curp, telefono, estado, correo, clave) values ('$nombre', '$apellido', '$curp', '$telefono', '$estado', '$email', '$pass');");
                echo '<div><font color="green"><center>Usuario registrado con éxito!, favor de iniciar sesión</center></font></div>';
        }
    }

}

?> 