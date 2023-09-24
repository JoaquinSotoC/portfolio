<?php

$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
$serialsql=$_SESSION['serialsql'];
             $correoconsulta=$conexion->query("select * from usuario where serial='$serialsql' ");
        if ($datos=$correoconsulta->fetch_object()) {
            $_SESSION['correo']=$datos->correo;
            $_SESSION['nombreus']=$datos->nombre;
             $_SESSION['apellidous']=$datos->apellidos;
            $correou=$_SESSION['correo'];
            $nombreus=$_SESSION['nombreus'];
             $apellidous=$_SESSION['apellidous'];
        }
 $mensaje=$_SESSION['mensaje'];
include('smtp/PHPMailerAutoload.php');
$html= '<b> Nombre del usuario: </b>' . $nombreus . ' ' . $apellidous .'<br>' . '<b>Correo de usuario: </b>' . $correou . '<br>' . '<b>Serial del dispositivo: </b>' . $serialsql. '<br>' . '<b>Mensaje: </b><br>' . $mensaje;
smtp_mailer('aquaxcontrol@gmail.com','Buzon dudas o sugerencias',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 0;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "aquaxcontrol@gmail.com";
	$mail->Password = "mbkdblfeghkbtowf";
	$mail->SetFrom("aquaxcontrol@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>
<script>
var resultado = window.confirm('MENSAJE ENVIADO!');

</script>

