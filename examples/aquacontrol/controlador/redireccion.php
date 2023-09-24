<?php

$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");



$serialsql = $_SESSION['serialsql'];
$red=$conexion->query("select * from dispositivos where serial='$serialsql' ");
        
if ($datos=$red->fetch_object()) {
    $_SESSION["modo"]=$datos->modo;
}

if ( $_SESSION["modo"] == TRUE) {
    header("location: Menuauto.php");
}
else
{
    header("location: Menu.php");
}



?>