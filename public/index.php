<?php

  require_once __DIR__ .'/../includes/app.php';
  use MVC\Router;
  use Controllers\LoginController;
  use Controllers\ProductController;
  use Controllers\OrderController;

  $router = new Router();

    //Rutas login
  $router->post('/api/login',[LoginController::class,'login']);
  $router->post('/api/create-user',[LoginController::class,'createUser']);

  //Rutas productos
  $router->post('/api/create-food', [ProductController::class, 'createFood']);
  $router->get('/api/food',[ProductController::class, 'getAllFood']);
  $router->post('/api/edit-food',[ProductController::class, 'editFood']);
  $router->post('/api/delete-food',[ProductController::class, 'deleteFood']);
  $router->post('/api/get-product-by-id',[ProductController::class, 'getProductById']);
  $router->post('/api/create-drink',[ProductController::class, 'createDrink']);
  $router->post('/api/edit-drink',[ProductController::class, 'editDrink']);
  $router->post('/api/delete-drink',[ProductController::class, 'deleteDrink']);

  //Rutas pedido
  $router->post('/api/create-order',[OrderController::class, 'createOrder']);

  $router->checkingRoutes();

?>
