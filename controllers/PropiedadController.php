<?php 

namespace Controllers;




use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController {
  public static function index(Router $router) {

    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();
    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    $router->render('propiedades/admin', [
      'propiedades' => $propiedades,
      'resultado' => $resultado,
      'vendedores' => $vendedores,
    ]);
  }

  public static function crear(Router $router) {
    $propiedad = new Propiedad;
    $vendedores = Vendedor::all();

    // Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      /** Crea una nueva instancia */
      $propiedad = new Propiedad($_POST['propiedad']);

      // Subida de archivo
      // Generar nombre unico
      $nombreImagen = md5(uniqid(rand(), true)).".jpg" ;


      // Realiza un resilaze a imagen con Intervetion
      if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
      }


      // Validar
      $errores = $propiedad->validar();
      
      // Revisar que el arreglo de errores este vacío
      if (empty($errores)) {

        
        // Crear una carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
          mkdir(CARPETA_IMAGENES);
        }
      
      
        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES.$nombreImagen);
        
        // Guarda en la BD
        $propiedad->guardar();
      }
    }


    $router->render('propiedades/crear', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
      'errores' => $errores,
    ]);
  }


  public static function actualizar(Router $router) {
    $id = validarORedireccionar('/admin');
    $propiedad = Propiedad::find($id);
    $vendedores = Vendedor::all();
    // Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el codigo despues de que el usuario envie el formulario
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Asignar los tributos
    $args = [];
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);
    
    // Validacion 
    $errores = $propiedad->validar();

    // Subida de archivos
    // Generar nombre unico
    $nombreImagen = md5(uniqid(rand(), true)).".jpg" ;

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
      $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
      $propiedad->setImagen($nombreImagen);
    }
    // Revisar que el arreglo de errores este vacío
    if (empty($errores)) {
      // Alamacenar la imagen
      if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image->save(CARPETA_IMAGENES.$nombreImagen);
      }
      $propiedad->guardar();
    }

  }

    $router->render('propiedades/actualizar', [
      'propiedad' => $propiedad,
      'errores' => $errores,
      'vendedores' => $vendedores,
    ]);
  }

  public static function eliminar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);
  
      if ($id) {
  
        $tipo = $_POST['tipo'];
      
        if (validarTipoContenido($tipo)) {
          // Consulta de la propiedad por id
          $propiedad = Propiedad::find($id);
          $propiedad->eliminar();
        }
  
      }
    }
  }
}