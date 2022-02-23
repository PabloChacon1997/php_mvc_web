<?php

namespace Controllers;


use MVC\Router;
use Model\Entrada;
use Intervention\Image\ImageManagerStatic as Image;

class EntradaController {


  public static function crear(Router $router) {
    $entrada = new Entrada;

    $errores = Entrada::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $_POST['entrada']['usuarioId'] = $_SESSION['id'];

      $entrada = new Entrada($_POST['entrada']);
      // Subida de archivo
      // Generar nombre unico
      $nombreImagen = md5(uniqid(rand(), true)).".jpg" ;


      // Realiza un resilaze a imagen con Intervetion
      // debugear($_FILES);
      if ($_FILES['entrada']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800, 600);
        $entrada->setImagen($nombreImagen);
      }

      $errores = $entrada->vaidar();
      // Revisar que el arreglo de errores este vacío
      if (empty($errores)) {

        
        // Crear una carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
          mkdir(CARPETA_IMAGENES);
        }
      
      
        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES.$nombreImagen);
        
        // Guarda en la BD
        $entrada->guardar();
      }
    }
    $router->render('entradas/crear', [
      'errores' => $errores,
      'entrada' => $entrada,
    ]);
  }
  public static function actualizar(Router $router) {
    $id = validarORedireccionar('/blog');
    $entrada = Entrada::find($id);

    $errores = Entrada::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Asignar los tributos
      $args = [];
      $args = $_POST['entrada'];

      $entrada->sincronizar($args);
      // Subida de archivo
      // Generar nombre unico
      $nombreImagen = md5(uniqid(rand(), true)).".jpg" ;


      // Realiza un resilaze a imagen con Intervetion
      // debugear($_FILES);
      if ($_FILES['entrada']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800, 600);
        $entrada->setImagen($nombreImagen);
      }

      $errores = $entrada->vaidar();
      // Revisar que el arreglo de errores este vacío
      if (empty($errores)) {
      
        // Guarda la imagen en el servidor
        if ($_FILES['entrada']['tmp_name']['imagen']) {
          $image->save(CARPETA_IMAGENES.$nombreImagen);
        }
        
        // Guarda en la BD
        $entrada->guardar();
      }
    }
    $router->render('entradas/actualizar', [
      'errores' => $errores,
      'entrada' => $entrada,
    ]);
  }
  public static function eliminar() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // debugear($_POST);
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);
  
      if ($id) {
  
        $tipo = $_POST['tipo'];
      
        if (validarTipoContenido($tipo)) {
          // Consulta de la propiedad por id
          $entrada = Entrada::find($id);
          $entrada->eliminar();
        }
  
      }
    }
  }

}


