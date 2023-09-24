<?php

$conexion=new mysqli("localhost","u298241502_joaquin","7V:Yqe[F","u298241502_aquaxcontrol","3306");
$serialsql=$_SESSION['serialsql'];
             $correoconsulta=$conexion->query("select * from usuario where serial='$serialsql' ");
        if ($datos=$correoconsulta->fetch_object()) {
            $_SESSION['correo']=$datos->correo;
            $correou=$_SESSION['correo'];
        }

include('smtp/PHPMailerAutoload.php');
$html='<b>El limite establecido al mes ha sido sobre pasado</b>, favor de visitar el sitio web y establecer un nuevo limite o esperar a que se cumpla el mes. Para mas informacion o dudas, mandar mensaje al correo de contacto: aquaxcontrol@gmail.com';
smtp_mailer($correou,'LIMITE SOBREPASADO',$html);
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