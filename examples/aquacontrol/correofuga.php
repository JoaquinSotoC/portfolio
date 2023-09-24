<?php

$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
$serialsql=$_SESSION['serialsql'];
             $correoconsulta=$conexion->query("select * from usuario where serial='$serialsql' ");
        if ($datos=$correoconsulta->fetch_object()) {
            $_SESSION['correo']=$datos->correo;
            $correou=$_SESSION['correo'];
        }

include('smtp/PHPMailerAutoload.php');
$html='<b>PROBABILIDAD DE FUGA</b>, Nuestro sistema ha detectado un consumo irregular en horas normalmente cuando no se consume, favor de revisar las instalaciones si se sigue mostrando este mensaje. Para mas informacion o dudas, mandar mensaje al correo de contacto: aquaxcontrol@gmail.com';
smtp_mailer($correou,'DETECCION DE POSIBLE FUGA',$html);
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