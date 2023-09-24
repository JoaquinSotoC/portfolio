<?php
if (!empty($_POST["btnabrirvalvula"])){
    $serialsql = $_SESSION['serialsql'];
    $sql = $conexion->query("update dispositivos set estadovalvula=(1) where serial=('$serialsql') "); #manda variable a bd para abrir valvula
   echo $_SESSION['valvulacolor']='<div class="valactivado">';
}


if (!empty($_POST["btncerrarvalvula"])){
    $serialsql = $_SESSION['serialsql'];
    $sql = $conexion->query("update dispositivos set estadovalvula=(0) where serial=('$serialsql') "); #manda variable a db para cerrar la valvula
    echo $_SESSION['valvulacolor']='<div class="valcerrada">';
}


?>