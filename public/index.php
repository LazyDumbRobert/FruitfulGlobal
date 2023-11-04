<?php
    require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\ProductoController;
use Controllers\PaginasController;

    $router = new Router;

    $router->get('/admin',[ProductoController::class,'index']);
    $router->get('/productos/crear',[ProductoController::class,'crear']);
    $router->post('/productos/crear',[ProductoController::class,'crear']);
    $router->get('/productos/actualizar',[ProductoController::class,'actualizar']);
    $router->post('/productos/actualizar',[ProductoController::class,'actualizar']);
    $router->post('/productos/eliminar',[ProductoController::class,'eliminar']);

    $router->get('/',[PaginasController::class,'index']);
    $router->get('/nosotros',[PaginasController::class,'nosotros']);
    $router->get('/productos',[PaginasController::class,'productos']);
    $router->get('/producto',[PaginasController::class,'producto']);
    $router->get('/blog',[PaginasController::class,'blog']);
    $router->get('/entrada',[PaginasController::class,'entrada']);
    $router->get('/contacto',[PaginasController::class,'contacto']);
    $router->post('/contacto',[PaginasController::class,'contacto']);

    //Login y autenticación
    $router->get('/login',[LoginController::class,'login']);
    $router->post('/login',[LoginController::class,'login']);
    $router->get('/logout',[LoginController::class,'logout']);
    
    
    $router->ComprobarRutas();
?>