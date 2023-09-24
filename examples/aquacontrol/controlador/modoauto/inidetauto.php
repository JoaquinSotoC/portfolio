<?php
##establece el limite de litros de modo automatico en la base de datos.
$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
if (!empty($_POST["limitt"])) {

    if (empty($_POST["limitepost"]) OR $_POST["limitepost"] < '0') {
        
        echo '<br><div class="alertaincorrectomenu"><font color="red"><center>Introducir un limite valido </center></font color="red"></div>';
    } else {
        $serialsql = $_SESSION['serialsql'];
        $limite = $_POST["limitepost"];
        $dato=$conexion->query("update dispositivos set limite=('$limite') where serial=('$serialsql') "); #ya permite actualizar un dato en la tabla

        $_SESSION['limiteagua']= $dato;

    }
}




?>