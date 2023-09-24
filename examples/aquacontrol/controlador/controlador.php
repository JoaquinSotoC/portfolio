<?php
session_start();
if (!empty($_POST["btningresar"])){
    if (empty($_POST["correo"]) and empty($_POST["password"])) {
        echo '<div class="alertaincorrecto"><font color="red"><center>introducir inicio de session</center></font color="red"></div>';
    } else {
        $correo=$_POST["correo"];
        $clave=$_POST["password"];
        $sql=$conexion->query("select * from usuario where correo='$correo' and clave='$clave' ");
        
        if ($datos=$sql->fetch_object()) {
            $_SESSION["iden"]=$datos->id;
            $_SESSION["nom"]=$datos->nombre;
            $_SESSION["ape"]=$datos->apellidos;
            $_SESSION['serialsql']=$datos->serial;
            $_SESSION['correosql']=$datos->correo;
            
            
         
            include("controlador/redireccion.php");


        } else {
            echo '<br><div class="alertaincorrecto"><font color="red"><center>Contraseña o usuario incorrecto</center></font color="red"></div>';
        }   
    
        
    }







}


?>