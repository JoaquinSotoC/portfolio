<?php
$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");



if (!empty($_POST["btnenlaceserial"])) {
    if (empty($_POST["serialinput"])) {
        echo '<div><font color="red"><center>Favor de introducir un numero de serial</center></font color="red"></div>';
    } else {

        ##para insertar una variable global en una busqueda sql, tengo que pasarla a una variable local
        $_SESSION['serialsql'] = $_POST["serialinput"];
        $serialsql = $_SESSION['serialsql']; ##asi se pasa variable global a local
        $ape = $_SESSION['ape'];
        $nom = $_SESSION['nom'];
        

        ##buscar si algo existe dentro de la base de datos##
        $resultado=$conexion->query("SELECT EXISTS (SELECT * FROM dispositivos WHERE serial='$serialsql');");
        $row=mysqli_fetch_row($resultado);
        
            if ($row[0]=="1") {                 
                echo '<br><div class="alertaregserial"><font color="green"><center>Dispositivo enlazado con exito!</center></font color="green"></div>';
                
        $sql = $conexion->query("update usuario set serial=('$serialsql') where nombre='$nom' "); #ya permite la busqueda de la variable
            } if ($row[0]!="1") {
                $serialnew=$_POST["serialinput"]=0;
                $_SESSION['serialsql'] = $_POST["serialinput"];
                
        $sql = $conexion->query("update usuario set serial=('$serialnew') where nombre='$nom' "); #ya permite la busqueda de la variable
                echo '<br><div class="alertaincorrectoserial"><font color="red"><center>Serial no existente</center></font color="red"></div>';
                
            }   
           
        
    }

}


?>