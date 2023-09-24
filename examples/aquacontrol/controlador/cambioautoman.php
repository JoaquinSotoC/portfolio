<?php
$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
if (!empty($_POST["btnauto"])){

    $serialsql = $_SESSION['serialsql'];
    
    $sql = $conexion->query("update dispositivos set estadovalvula=(0) where serial=('$serialsql') "); #manda variable a db para cerrar la valvula
    $sql = $conexion->query("update dispositivos set modo=(1) where serial=('$serialsql') "); #ya permite la busqueda de la variable

    header("location: Menuauto.php");
 echo $_SESSION['valvulacolor']='<div class="valcerrada">';
}
?>