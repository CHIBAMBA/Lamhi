<?php
require_once('../modelos/iModel.php');
require_once('../phpMailer/class.phpmailer.php');

class Suscriptores{

  public function __construct(){
      $_listSuscriptor = array();
      $_addSuscriptor = array();
      $_deleteSuscriptor = array();
      $this->_modelo = new Model();
      $this->mail = new PHPMailer();
  }

  public function listarSuscriptores(){
		$_consult = "SELECT * FROM suscripciones WHERE Estado_Suscriptor = 'AC'";
		$_result = array_filter($this->_modelo->selectValues($_consult));
    foreach($_result as $_row){
			 $_listSuscriptor['Suscriptores'][] = $_row;
    }
		return $_listSuscriptor;
  }
  
  public function deleteSuscriptor($id){
    $_consult = "DELETE FROM suscripciones WHERE Id_Suscriptor = '$id' ";
      if($this->_modelo->functionCrud($_consult)){
          $_deleteSuscriptor['success'] = 1;
          $_deleteSuscriptor['message'] = "Suscriptor eliminado correctamente";
      }else{
          $_deleteSuscriptor['success'] = 0;
          $_deleteSuscriptor['message'] = "Error al eliminar al suscriptor. Intentalo más tarde";
      }

    return $_deleteSuscriptor;
  }

  public function addSuscriptor($correo){
    $_consult = "INSERT INTO suscripciones (Correo_Suscriptor, Fecha_Suscriptor) VALUES ('$correo', CURDATE())";

    if($this->checkSuscriptor($correo)){
      $_addSuscriptor['success'] = 0;
      $_addSuscriptor['message'] = "Ya existe un suscriptor con este correo electrónico";
    }else{
      if($this->validarMail($correo)){
          if($this->enviarCorreo($correo)){
            if($this->_modelo->functionCrud($_consult)){
                $_addSuscriptor['success'] = 1;
                $_addSuscriptor['message'] = "Te has suscrito correctamente";
            }else{
                $_addSuscriptor['success'] = 0;
                $_addSuscriptor['message'] = "Error al suscribirse. Intentalo más tarde";
            }
          }else{
            $_addSuscriptor['success'] = 0;
            $_addSuscriptor['message'] = "Error al suscribirse. El correo electrónico es invalido";
          }
      }else{
        $_addSuscriptor['success'] = 0;
        $_addSuscriptor['message'] = "Error el correo es invalido. Intentalo nuevamente";
      }
    }
    return $_addSuscriptor;
  }


  public function checkSuscriptor($correo){
    $_consult = "SELECT * FROM suscripciones WHERE Correo_Suscriptor = '$correo' ";
    $_result = $this->_modelo->totalValues($_consult);
    if($_result > 0){
        return true;
    }else{
      return false;
    }
}



  function validarMail($correo){
    return (false !== strpos($correo, "@") && false !== strpos($correo, "."));
  }


  public function enviarCorreo($correo){
      $asunto = 'Gracias por suscribirte a Grupo Lamhi';
      $mensaje = '<h3 style="font-weight:bold">Bienvenido: '.$correo.'</h3>';
      $this->mail->IsHTML(true);
      $this->mail->CharSet = 'UTF-8';
      $this->mail->IsSMTP();
      $this->mail->Host = 'mail.lamhi.com.mx';
      $this->mail->Port = 465;
      $this->mail->SMTPSecure = 'ssl';
      $this->mail->SMTPAuth = true; //por si necesita auentificación
      $this->mail->Username = "no-reply@lamhi.com.mx";
      $this->mail->Password = "NoResponder2019";
      $this->mail->From = "no-reply@lamhi.com.mx";
      $this->mail->FromName = "GRUPO LAMHI";
      $this->mail->Subject = $asunto;
      $this->mail->AddAddress($correo);//el email al que vá
      $rcss = "../plantilla/estilo.css";//ruta de archivo css
      $fcss = fopen ($rcss, "r");//abrir archivo css
      $scss = fread ($fcss, filesize ($rcss));//leer contenido de css
      fclose ($fcss);//cerrar archivo css
      $shtml = file_get_contents('../plantilla/plantilla.html');
      $incss  = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml);
      $cuerpo = str_replace('<p id="mensaje"></p>',$mensaje,$incss);
      $this->mail->Body = $cuerpo; //cuerpo del mensaje
      $this->mail->AltBody = $mensaje;//Mensaje de sólo texto si el receptor no acepta HTML

      if($this->mail->Send()){
          return true;
      }else{
          return false;
      }
    }

    public function descargarSuscriptores(){
      $_consult = "SELECT * FROM suscripciones WHERE Estado_Suscriptor = 'AC' order by Fecha_Suscriptor,Correo_Suscriptor";
      $resultado = array_filter($this->_modelo->selectValues($_consult));

      $dato = '<h2 style="text-align:center;color:brown;">LISTA DE SUSCRIPTORES</h2>';


      $dato .= '
            <table bordered="1">
              <thead >
                <tr style="text-align: center;border: solid 1px black;background:#263238;color:white">
                   <th style="text-align: center;">CORREO ELECTRONICO</th>
                   <th style="text-align: center;">FECHA SUSCRIPCION</th>
                </tr>
              </thead>
              <tbody>';
              if($resultado){
                foreach($resultado as $row){
                  $dato.='
                    <tr style="border: solid 1px black;text-align:center">
                      <td>'.$row["Correo_Suscriptor"].'</td>
                      <td>'.$row["Fecha_Suscriptor"].'</td>
                    </tr>
                    ';
                }
          }else{
            echo '<h5 style="background:transparent">No hay resultados...</h5>';
          }


      $dato.= '
              </tbody>
            </table>
      ';
      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=lista_suscriptores.xls');
      echo $dato;
    }


}
?>
