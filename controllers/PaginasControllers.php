<?php

namespace Controllers;

use MVC\Router;
use Model\Entrada;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasControllers {
  public static function index(Router $router) {

    $propiedades = Propiedad::get(3);
    $inicio = true;
    $entradas = Entrada::get(2);

    $router->render('paginas/index', [
      'propiedades' => $propiedades,
      'inicio' => $inicio,
      'entradas' => $entradas,
    ]);
  }

  public static function nosotros(Router $router) {
    $router->render('paginas/nosotros');
  }
  public static function propiedades(Router $router) {
    $propiedades = Propiedad::all();
    $router->render('paginas/propiedades', [
      'propiedades' => $propiedades
    ]);
  }
  public static function propiedad(Router $router) {
    $id = validarORedireccionar('/propiedades');
    $propiedad = Propiedad::find($id);
    $router->render('paginas/propiedad', [
      'propiedad' => $propiedad
    ]);
  }
  public static function blog(Router $router) {
    $auth = $_SESSION['login'] ?? false;
    $entradas = Entrada::all();

    $router->render('paginas/blog', [
      'auth' => $auth,
      'entradas' => $entradas
    ]);
  }
  public static function entrada(Router $router) {
    $auth = $_SESSION['login'] ?? false;
    $id = validarORedireccionar('/blog');
    $entrada = Entrada::find($id);
    $router->render('paginas/entrada', [
      'auth' => $auth,
      'entrada' => $entrada,
    ]);
  }
  public static function contacto(Router $router) {

    $mensaje = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $respuestas = $_POST['contacto'];

      // Crear una instancia de phpmailer
      $mailer = new PHPMailer();

      // Configurar SMTP
      $mailer->isSMTP();
      $mailer->Host = 'smtp.mailtrap.io';
      $mailer->SMTPAuth = true;
      $mailer->Username = 'f4aecc9ccd9107';
      $mailer->Password = '6b529534b5a3fd';
      $mailer->SMTPSecure = 'tls';
      $mailer->Port = 2525;

      // Configurar el contanido del email
      $mailer->setFrom('admin@bienesraices.com');
      $mailer->addAddress('admin@bienesraices.com', 'BienesRaices.com');
      $mailer->Subject = 'Tienes un nuevo mensaje';

      // Habilitar HTML
      $mailer->isHTML(true);
      $mailer->CharSet = 'UTF-8';

      // Contenido
      $contenido = '<html>';
      $contenido .= '<p>Tienes un nuevo mensaje</p>';
      $contenido .= '<p>Nombre: '.$respuestas['nombre'] .'</p>';
      // Enviar de forma codicional el metodo de contacto
      if ($respuestas['contacto'] === 'telefono') {
        $contenido .= '<p>Eligio ser contactado por Teléfono</p>';
        $contenido .= '<p>Telefono: '.$respuestas['telefono'] .'</p>';
        $contenido .= '<p>Fecha de contacto: '.$respuestas['fecha'] .'</p>';
        $contenido .= '<p>Hora de contacto: '.$respuestas['hora'] .'</p>';
      } else {
        $contenido .= '<p>Eligio ser contactado por Email</p>';
        $contenido .= '<p>Email: '.$respuestas['email'] .'</p>';
      }
      $contenido .= '<p>Mensaje: '.$respuestas['mensaje'] .'</p>';
      $contenido .= '<p>Vende o Compra: '.$respuestas['tipo'] .'</p>';
      $contenido .= '<p>Precio o Presupuesto: $'.$respuestas['precio'] .'</p>';
      $contenido .= '<p>Prefiere ser contactado por: '.$respuestas['contacto'] .'</p>';
      $contenido .= '</html>';

      $mailer->Body = $contenido;
      $mailer->AltBody = 'Esto es texto alternativo sin HTML';

      // Enviar email
      if ($mailer->send()) {
        $mensaje = 'Mensaje enviado Correctamente';
      } else {
        $mensaje = 'Mensaje NO se pudo enviar!!!';
      }
    }

    $router->render('paginas/contacto', [
      'mensaje' => $mensaje
    ]);
  }
}