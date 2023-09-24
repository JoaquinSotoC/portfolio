<?php
$db=mysqli_connect("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
        $nombre=$_POST["nombrer"];
        $apellidos=$_POST["apellidosr"];
        $correor=$_POST["correor"];
        $claver=$_POST["claver"];
        
if (!empty($_POST["registrar"])) {
    if (empty($_POST["nombrer"]) or empty($_POST["apellidosr"]) or empty($_POST["correor"]) or empty($_POST["claver"])) {
        echo '<h3><font color="red"><center>Favor de llenar todos los campos</center></font color="red"></h3>';
    } else {
  	$sql_u = "SELECT * FROM usuario WHERE correo=('$correor')";
  	$res_u = mysqli_query($db, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
  	  echo '<div class="alertaincorrecto"><font color="red"><center>El correo ya esta en uso</center></font color="red"></div>'; 	
  		
  	}else{
  	    
        $sql=$conexion->query(" insert into usuario(nombre,apellidos,correo,clave)values('$nombre','$apellidos','$correor','$claver')");
        echo '<br><div class="alertareg"><font color="green"><center>Usuario registrado con exito!, favor de iniciar sesion</center></font color="green"></div>';
          
  	}
    }
}






?>