<?php 

namespace Controllers;


use MVC\Router;
use Model\Vendedor;

class VendedorController {

  public static function crear(Router $router) {
    // Arreglo con mensaje de errores
    $errores = Vendedor::getErrores();
    $vendedor = new Vendedor;

    // Ejecutar el codigo despues de que el usuario envie el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Crear una nueva instancia
      $vendedor = new Vendedor($_POST['vendedor']);

      // Validar formulario
      $errores = $vendedor->validar();

      if (empty($errores)) {
        $vendedor->guardar();
      }

    }


    $router->render('/vendedores/crear', [
      'errores' => $errores,
      'vendedor' => $vendedor,
    ]);
  }
  public static function actualizar(Router $router) {
    $id = validarORedireccionar('/admin');

    // Arreglo con mensaje de errores
    $errores = Vendedor::getErrores();
    $vendedor = Vendedor::find($id);

    // Ejecutar el codigo despues de que el usuario envie el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Asignar los valores
      $args = $_POST['vendedor'];

      // Sincronizar objeto en memoria con el actual
      $vendedor->sincronizar($args);

      // Validar
      $errores = $vendedor->validar();

      if (empty($errores)) {
        $vendedor->guardar();
      }
    }

    $router->render('/vendedores/actualizar', [
      'errores' => $errores,
      'vendedor' => $vendedor,
    ]);
  }
  public static function eliminar() {
    // Validar el tipo a eliminar
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Validar id
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if ($id) {
        $tipo = $_POST['tipo'];
        if (validarTipoContenido($tipo)) {
          $vendedor = Vendedor::find($id);
          $vendedor->eliminar();
        }
      }
    }
  }
}


