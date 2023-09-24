<?php

if (isset($_POST["iniciarsesion"])) {
    if (empty($_POST["email"]) && empty($_POST["pass"])) {
        echo '<div><font color="red"><center>Introducir inicio de sesión</center></font></div>';
    } else {
        $correo = $_POST["email"];
        $clave = $_POST["pass"];
        $conexion = new mysqli("localhost","id20740173_usuario","jMJHC34r_NFB4Q\V","id20740173_based");
        $sql = $conexion->query("SELECT * FROM clientes WHERE correo='$correo' AND clave='$clave'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["iden"] = $datos->id;
            $_SESSION["nom"] = $datos->nombre;
            $_SESSION["ape"] = $datos->apellido;
            $_SESSION["priv"] = $datos->priv;
            $privilegio = $_SESSION["priv"];
            if ($privilegio == 'admin') {
                header("Location: tablasuper.php"); 
                $conexion->close();
            } else {
                header("Location: tablanormal.php");
                $conexion->close();
            }
        } else {
            echo '<br><div><font color="red"><center>Usuario no existente</center></font></div>';
        }   
    }
}
?>