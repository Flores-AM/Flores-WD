<?php

namespace Controllers;

use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class HomeController {
  public static function home(Router $router) {
    
    $router->render('/home', []);
  }

  public static function contacto(Router $router) {
    
    $mensaje = null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      $respuestas = $_POST['contacto'];

      $mail = new PHPMailer();

      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPDebug= 0;
      $mail->Mailer= "smtp";
      $mail->SMTPAuth = true;
      $mail->Port = 587;
      $mail->Username = 'agustinmatiasf@gmail.com';
      $mail->Password = 'ezbcgprfovwvintp';
      $mail->Priority = 1;
      $mail->SMTPSecure = 'tls';

      $mail->addAddress('agustinmatias62@gmail.com');
      $mail->setFrom('Portfolio Flores', 'Portfolio Flores');
      $mail->Subject = 'Nuevo Mensaje WD';

      // Habilitar HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      // Definir el contenido
      $contenido = '<html>';
      $contenido .= '<p>Portfolio Flores-WD</p>';
      $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p>';
      $contenido .= '<p>email: ' . $respuestas['mail'] . ' </p>';
      $contenido .= '<p>celular: ' . $respuestas['celular'] . ' </p>';
      $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . ' </p>';
      $contenido .= '</html>';

      $mail->Body = $contenido;
      $mail->AltBody = 'Esto es texto alternativo sin HTML';

      // Enviar el mail
      if($mail->send()) {
        $mensaje = 'Submitted Successfully !';
      } else {
        $mensaje = 'Error Sending :(';
      }
    }

    $router->render('/home', [
      'mensaje' => $mensaje
    ]);
  }
}

?>