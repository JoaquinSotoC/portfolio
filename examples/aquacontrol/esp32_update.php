<?php

$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");





if (!$conexion) {
	die("error conexion" . mysqli_connect_error());
}
$serialsql = $_SESSION['serialsql'];

//Read the database
if (isset($_POST['recibirdatos'])) {
	$red = $conexion->query("select * from dispositivos where serial='12k54k12h5j' ");
	if ($datos = $red->fetch_object()) {
		$_SESSION["modo"] = $datos->modo;
		$_SESSION["man"] = $datos->estadovalvula;
		$_SESSION["autoactivado"] = $datos->modoautoactivado;
		$_SESSION["limite"] = $datos->limite;
		$_SESSION["mes"] = $datos->reiniciomes;
	    $_SESSION["reinicio"] = $datos->reinicio;

	if ($_SESSION["modo"] == TRUE) {
		echo "modoauto,";
	} else {
		echo "modoman,";
	}
			if ($_SESSION["man"] == TRUE) {
		echo "manabierto,";
	} else {
		echo "mancerrado,";
	}
	
	if ($_SESSION["autoactivado"] == TRUE) {
		echo "autoon,";
	} else {
		echo "autooff,";
	}
	
	echo $_SESSION["limite"];
	
		if ($_SESSION["mes"] == TRUE) {
		echo ",reiniciar";
	} else {
		echo ",seguir";
	}			
$limiteset=$_SESSION["limite"];

}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
    
}
 
 
$ipadresses=get_client_ip();
$conexion->query("update dispositivos set ip=('$ipadresses') where serial='12k54k12h5j' ");
}else{
   
}

#####mandar datos a base de datos
	if (isset($_POST['sensorflujo'])) {
	    $flujo=$_POST['sensorflujo'];
	$red = $conexion->query("insert * from dispositivos where serial='12k54k12h5j' ");
$sql = $conexion->query("update dispositivos set flujo=('$flujo') where serial='12k54k12h5j' "); #ya permite la busqueda de la variable
		

	}
		if (isset($_POST['detenetmodo'])) {
		    $stopauto=$_POST['detenetmodo'];
		    $_SESSION['detenetmodo']=$_POST['detenetmodo'];
if( $stopauto=="stopauto" ){
             $sql = $conexion->query("update dispositivos set autovalvula=(0) where serial='12k54k12h5j' ");
    
}if( $stopauto=="auto" ){
     $sql = $conexion->query("update dispositivos set autovalvula=(1) where serial='12k54k12h5j' ");
}

	}
	
	
		if (isset($_POST['sensorlitros'])) {
	    $litros=$_POST['sensorlitros'];
	$red = $conexion->query("insert * from dispositivos where serial='12k54k12h5j' ");
$conexion->query("update dispositivos set litros=('$litros') where serial='12k54k12h5j' "); #ya permite la busqueda de la variable
	}


	if (isset($_POST['incremento'])) {
	    
	    $incremento=$_POST['incremento'];
	    date_default_timezone_set('America/Chicago');
	    ##date_default_timezone_set('America/Chicago');
	    $retro += $incremento;
	    ##America/Chicago
    $fechaActual = date("d-m-Y");
    ##$fechaActual = "64-04-2023";
    ##$mesActual = "26-2023";
    $mesActual = date("m-Y");
    $horaActual = date("H:i:s");
    ##$horafuga = date("04");
    $horafuga = date("H");
    
    $lol=$conexion->query("select * from historial order by id desc limit 1");
        if ($datos=$lol->fetch_object()) {
            $_SESSION['litrosactual']=$datos->litros;
            $litacs=$_SESSION['litrosactual'];
        }
        
 if($litacs==$litros){

    }
    else{
	   $conexion->query("INSERT INTO historial(incremento,litros,fecha,hora) VALUES('$flujo','$litros','$fechaActual','$horaActual')"); 
	    $conexion->query("INSERT INTO historialfuga(incremento,litros,fecha,hora) VALUES('$incremento','$litros','$fechaActual','$horafuga')"); 
    }

        
#####NOTAAAAAAAAAAA para extraer de la base de datos es imporntate separar el arreglo que se crea, debido a que tiene direccion.
#####analisis para llenar la base de datos por dia
$ell=$conexion->query("select * from historialpordia order by id desc limit 1");
        if ($datos=$ell->fetch_object()) {
            $_SESSION['dia']=$datos->fecha;
            $dias=$_SESSION['dia'];
            	
        }
##igual
    if(strcmp($dias, $fechaActual) === 0){
	echo ",seguir,";
        $sql = $conexion->query("update historialpordia set consumo=('$litros') where fecha=('$fechaActual') ");
        $monto=$litros*14.05;
        $sql = $conexion->query("update historialpordia set dinero=('$monto') where fecha=('$fechaActual') ");
                $sql = $conexion->query("update historialpordia set refmes=('$mesActual') where fecha=('$fechaActual') "); 
         $sql = $conexion->query("update dispositivos set reinicio=(0) where serial='12k54k12h5j' ");
         
    }
    else{
        ##distinta fecha
        $litros=0;
		echo ",reiniciar,";
        $sql = $conexion->query("update dispositivos set reinicio=(1) where serial='12k54k12h5j' ");
        $conexion->query("INSERT INTO historialpordia(fecha) VALUES('$fechaActual')");

    }
    
    ####analisis para cada mes
    $lelo=$conexion->query("select * from historialpormes order by id desc limit 1");
        if ($datos=$lelo->fetch_object()) {
            $_SESSION['mesbd']=$datos->mes;
            $mesbd1=$_SESSION['mesbd'];
        }
        
        
    ##si es igual
     if(strcmp($mesbd1, $mesActual) === 0){
         
    $le=$conexion->query("select sum(consumo) as 'cuenta' from historialpordia where refmes=('$mesActual')");
    $data=mysqli_fetch_array($le);
    $cuenta=$data['cuenta'];
   $_SESSION['cuentaa']=$cuenta;
   
       $lm=$conexion->query("select sum(dinero) as 'dinero' from historialpordia where refmes=('$mesActual')");
    $data=mysqli_fetch_array($lm);
    $dinero=$data['dinero'];
   
 
   
            $conexion->query("update historialpormes set consumo=('$cuenta') where mes=('$mesActual') ");
            $conexion->query("update historialpormes set costo=('$dinero') where mes=('$mesActual') ");
                     $sql = $conexion->query("update dispositivos set reinicio=(0) where serial='12k54k12h5j' ");
                     $sql = $conexion->query("update dispositivos set costo=('$dinero') where serial='12k54k12h5j' ");
                     
         $conexion->query("update dispositivos set reiniciomes=(0) where serial='12k54k12h5j' ");
    }
    ##si es distinto
    else{
        $sql = $conexion->query("update dispositivos set reinicio=(1) where serial='12k54k12h5j' ");
        $conexion->query("INSERT INTO historialpormes(fecha,mes) VALUES('$fechaActual','$mesActual')");
$sql = $conexion->query("update dispositivos set reiniciomes=(1) where serial='12k54k12h5j' ");
    }
    
    
    
	}
	
	
##funcion para sumas columnas en base de	    
##SELECT sum(consumo) from historialpordia where 


?>


