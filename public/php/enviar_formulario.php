<?php
//de donde la tengamos importamos la clase
require_once('phpMailer/class.phpmailer.php');

        //creamos una instancía de la clase phpmailer
        $mail = new PHPMailer();

        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        $telefono = $_REQUEST['telefono'];
        $asunto = $_REQUEST['asunto'];
        $mensaje = $_REQUEST['mensaje'];

        $mail->IsHTML(true); // si es html o txt
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true; //por si necesita auentificación
        $mail->Username = "grupolamhi@gmail.com";
        $mail->Password = "GrupoLamhi2019";
        $mail->From = "grupolamhi@gmail.com";
        $mail->FromName = "GRUPO LAMHI";
        $mail->Subject = $asunto;
        $mail->AddAddress('info@lamhi.com.mx');//el email al que vá
        $body  = "NOMBRE DEL CLIENTE: $nombre<br><br>";
        $body.=  "ASUNTO: $asunto<br><br> ";
        $body.=  "CORREO: $correo<br><br> ";
        $body.=  "MENSAJE: $mensaje<br><br> ";
        $body.=  "TELEFONO: $telefono<br><br> ";

        $mail->Body = $body;//cogemos el cuerpo completo

        $mail->Body = $body;//cogemos el cuerpo correotoUsamos AltBody por si el el correo no admite formato html
        $Altbody  = "NOMBRE DEL CLIENTE:  $nombre<br><br>";
        $Altbody  .=  "ASUNTO: $asunto<br><br> ";
        $Altbody  .=  "CORREO: $correo<br><br> ";
        $Altbody  .=  "MENSAJE: $mensaje<br><br> ";
        $Altbody  .=  "TELEFONO: $telefono<br><br> ";
        $mail->AltBody = $Altbody;

//        $mail->AddAttachment("archivos/nombrearchivo.extension");*//si queremos envíar archivos

        //envíamos el email al usuario

        if($mail->Send()){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Correcto!</strong> Mensaje enviado correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
        }else{
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lo sentimos!</strong> EL mensaje no se puede enviar. Intentelo más tarde.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
        }



?>
