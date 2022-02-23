<?php

require_once __DIR__.'/../includes/app.php';

/**Rutas */

use MVC\Router;

/**Controllers */
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasControllers;
use Controllers\LoginController;
use Controllers\EntradaController;


$router = new Router();

// debugear(PropiedadController::class);


/** PROPIEDADES */

$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

/** VENDEDORES */

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

/** PAGINAS PUBLICAS */


$router->get('/', [PaginasControllers::class, 'index']);
$router->get('/nosotros', [PaginasControllers::class, 'nosotros']);
$router->get('/propiedades', [PaginasControllers::class, 'propiedades']);
$router->get('/propiedad', [PaginasControllers::class, 'propiedad']);
$router->get('/blog', [PaginasControllers::class, 'blog']);
$router->get('/entrada', [PaginasControllers::class, 'entrada']);
$router->get('/contacto', [PaginasControllers::class, 'contacto']);
$router->post('/contacto', [PaginasControllers::class, 'contacto']);

/** BLOG */

$router->get('/entrada/crear', [EntradaController::class, 'crear']);
$router->post('/entrada/crear', [EntradaController::class, 'crear']);
$router->get('/entrada/actualizar', [EntradaController::class, 'actualizar']);
$router->post('/entrada/actualizar', [EntradaController::class, 'actualizar']);
$router->post('/entrada/eliminar', [EntradaController::class, 'eliminar']);

/**Login y autenticacion */

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();

