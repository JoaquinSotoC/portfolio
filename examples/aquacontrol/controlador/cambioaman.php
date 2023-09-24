<?php
$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
if (!empty($_POST["btnman"])){
    $serialsql = $_SESSION['serialsql'];
    header("location: Menu.php");
    
    $sql = $conexion->query("update dispositivos set modo=(0) where serial=('$serialsql') "); #activa modo manual en la base de datos.
     $sql = $conexion->query("update dispositivos set estadovalvula=(0) where serial=('$serialsql') "); ##cierravavula cuando cambie a manual
        $sql = $conexion->query("update dispositivos set modoautoactivado=(0) where serial=('$serialsql') "); #desactiva modo automatico en la base de datos.
}
?>