<?php
if (!empty($_POST["inimauto"])){
    $serialsql = $_SESSION['serialsql'];
    $sql = $conexion->query("update dispositivos set modoautoactivado=(1) where serial=('$serialsql') "); #manda variable a bd para abrir activar el modo automatico
   $sql = $conexion->query("update dispositivos set estadovalvula=(1) where serial=('$serialsql') "); #manda variable a db para abrir desactivar el modo
   
}


if (!empty($_POST["detmauto"])){
    $serialsql = $_SESSION['serialsql'];
    $sql = $conexion->query("update dispositivos set modoautoactivado=(0) where serial=('$serialsql') "); #manda variable a db para abrir desactivar el modo automatico
     $sql = $conexion->query("update dispositivos set estadovalvula=(0) where serial=('$serialsql') "); #manda variable a db para abrir desactivar el modo
   
}


?>