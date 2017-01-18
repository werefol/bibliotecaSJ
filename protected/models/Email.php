<?php
class Email
{
	/**
	 * Devuelve la direrencia que existe entre 2 fecha
	 *
	 * Recibe una fecha Timestamp de Unix  y el formato que desea
	 * la variable opcion es un array que devolvera los parametros solicitado
	 * @param array $opcion
	 * @param date $opcion['email']
	 * 		email del destinatario
	 * @param date $opcion['nombre']
	 * 		nombre del destinatario
	 * @param date $opcion['asunto']
	 * 		rozon del envio del email
	 * @param date $opcion['mensaje']
	 * 		mensaje o cuerpo del correo
	 */
	public static function enviarEmail($parametros = array())
	{

		$correo = (array_key_exists('correo',$parametros))?$parametros['correo']:'';
		$nombre = (array_key_exists('nombre',$parametros))?$parametros['nombre']:'';
		$asunto = (array_key_exists('asunto',$parametros))?$parametros['asunto']:'';
		$mensaje = (array_key_exists('mensaje',$parametros))?$parametros['mensaje']:'';
		$adjunto = (array_key_exists('adjunto',$parametros))?$parametros['adjunto']:'';

		$config = Email::parametrosEmail('gmail');
		$library_data =  LibraryData::model()->find();

		if(!is_array($adjunto))
			$adjuntos[]=$adjunto;
		else
			$adjuntos = $adjunto;

                if(defined('YII_DEBUG') && YII_DEBUG){
                    //Esta version es para desarrollo con mayor o igual php5.6
                    Yii::import('mailer.PHPMailer');
                    $mail = new PHPMailer;
                }
                else{
                    //Esta version es para produccion con menor o igual php5.6
                    Yii::import('mailer.phpmailer');
                    $mail = new phpmailer;
                }
                
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = $config['SMTPSecure'];
		$mail->Host = $config['host'];
		$mail->Port = $config['port'];
		$mail->Username = $library_data->library_email;
		$mail->Password = $library_data->library_mailpass;
		$mail->SetFrom($library_data->email, $library_data->library_name);
        $mail->AddReplyTo($library_data->library_email, $library_data->library_name);
		$mail->Subject = $asunto;
		$mail->AltBody = $library_data->library_name;
		$mail->MsgHTML($mensaje);
		$mail->AddAddress($correo, $nombre);
                $mail->CharSet = 'UTF-8';
                if(!$mail->Send()){
                    echo "<font style='font-size: 14px;color: #990000'> No se pudo enviar el correo</font><br/>";
                }
                else{
		    echo "<font style='font-size: 14px;color: #2e8b57'> El correo se haa enviado satisfactoriamente a: <strong>$correo</strong></font><br/><br/>";
                }
	}

	public static function parametrosEmail($email){

		$correos =  array(
						'gmail'=>array(
								'host'=>'smtp.gmail.com',
								'port'=>465,
								'SMTPSecure'=>'ssl',
						),
		);


		return (array_key_exists($email,$correos))?$correos[$email]:array();
	}

}

//		   $mail->ClearAddresses();
//		   $mail->ClearAttachments();
                /*
                        $mail = new PHPMailer;
                        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = $configuracion['host'];  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = $empresa->email_emp;                 // SMTP username
                        $mail->Password = $empresa->email_clave;                           // SMTP password
                        $mail->SMTPSecure = $configuracion['SMTPSecure'];                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = $configuracion['port'];                                    // TCP port to connect to

                        $mail->setFrom($empresa->email_emp,  $empresa->razon_social);
                        $mail->addAddress($correo, $nombre);     // Add a recipient
                        //$mail->addAddress('ellen@example.com');               // Name is optional
                        $mail->addReplyTo($empresa->email_emp,  $empresa->razon_social);
                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                        $mail->isHTML(true);                                  // Set email format to HTML

                        $mail->Subject = $asunto;
                        $mail->Body    = $mensaje;
                        $mail->AltBody = $mensaje;
                        $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        ));
                        if(!$mail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                            echo 'Message has been sent';
                        }

*/