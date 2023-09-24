<?php

$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
$serialsql=$_SESSION['serialsql'];
$sql=$conexion->query("select * from dispositivos where serial='$serialsql' ");
        if ($datos=$sql->fetch_object()) {
            $_SESSION['flujo']=$datos->flujo;
            ##$_SESSION['litros']=$datos->litros;
            $_SESSION['modo']=$datos->modo;
            $_SESSION['modoactivado']=$datos->modoautoactivado;
            $_SESSION['estadovalvula']=$datos->estadovalvula;
            $_SESSION['autovalvula']=$datos->autovalvula;
            $_SESSION['limiteagua']=$datos->limite;
            $_SESSION['status']=$datos->status;
            $_SESSION['dinero']=$datos->costo;
            
            
        } else {

                echo '<div class="alertaincorrectomenu"><font color="red"><center>Dispositivo no enlazado</center></font color="red"></div>';
                $_SESSION['flujo']=0;
                $_SESSION['litros']=0;
                echo $_SESSION['valvulacolor']='<div>';
                $_SESSION['ACvalvula']="Cerrado";

        } 




##valvula modo autoactivado
        if($_SESSION['modoactivado']==true and  $_SESSION['modo']==true ){
            $_SESSION['valvulacolorauto']='<div class="valactivadoauto">';
        }else{
            $_SESSION['valvulacolorauto']='<div>';
        }

$se=$conexion->query("select * from historialpormes order by id desc limit 1 ");
        if ($datos=$se->fetch_object()) {
            $_SESSION['litros']=$datos->consumo;
            
        }
        
        
        if ($_SESSION['modoactivado']==true) {
            $_SESSION['ACvalvula']="Abierto";
        } else {
            $_SESSION['ACvalvula']="Cerrado";
        }
        
        if ($_SESSION['estadovalvula']==true) {
            $_SESSION['ACvalvula']="Abierto";
        } else {
            $_SESSION['ACvalvula']="Cerrado";
        }
                if ($_SESSION['autovalvula']==true) {
            $_SESSION['ACvalvulaauto']="Abierto";
        } else {
            $_SESSION['ACvalvulaauto']="Cerrado";
        }


    $serialsql = $_SESSION['serialsql'];
    $ac=$conexion->query("SELECT estadovalvula FROM dispositivos WHERE serial=('$serialsql')");
  
    if ($ac=="1"){
       $_SESSION['valvulacolor']='<div class="valactivado">';
    }
    
    
    if ($ac=="0"){
        $_SESSION['valvulacolor']='<div>';
    }
    
   if($_SESSION['status']==true){
       $_SESSION["conexion_esp_32"]='';
       
   }else{	    
      $_SESSION["conexion_esp_32"]='<div class="alertaincorrectomenu"><font color="red"><center>Dispositivo no enlazado</center></font color="red"></div>';}
      
     

   if($_SESSION['limiteagua'] > $_SESSION['litros']){
         $contador=20;
         $_SESSION['conta']=20;
   }
    
     
if( $_SESSION['limiteagua'] < $_SESSION['litros'] ){

if( $_SESSION['modoactivado']==true ){
    $_SESSION['autolim']=on;
if( $_SESSION['conta']==20){
     include("correo.php");   
$_SESSION['conta']=40;
}else{
}
}
}else{
}


    ##$horafuga = 03;
    $horafuga = date("H");
    
    if($horafuga==05){
     $_SESSION['fugasa']=20;
     $del=$conexion->query("truncate table historialfuga");
    }
    if($horafuga==04){
    $lei=$conexion->query("select sum(incremento) as 'fugas' from historialfuga where hora=('03')");
    $data=mysqli_fetch_array($lei);
    $fugas=$data['fugas'];
    
    if($fugas>0.0015){
         if($_SESSION['fugasa']==20){
             include("correofuga.php");  
            $_SESSION['fugasa']=40; 
         }
    }
    
    
    }



?>