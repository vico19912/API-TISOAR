<?php
  namespace MVC;

class Router {
  public $routesGET = [];
  public $routesPOST = [];
  public $routesPUT = [];

  //Obtener las rutas GET
  public function get($url, $fn){
    $this->routesGET[$url] = $fn;
  }
//Obtener las rutas POST
  public function post($url, $fn){
    $this->routesPOST[$url] = $fn;
  }

  //Obtener las rutas PUT
  public function put($url, $fn){
    $this->routesPUT[$url] = $fn;
  }
  public function checkingRoutes(){
    
    $urlActual = $_SERVER['PATH_INFO'] ?? '/';
    $method = $_SERVER['REQUEST_METHOD'];

    if ( $method === 'GET' ) {
      $fn = $this->routesGET[$urlActual] ?? null;
    }

    if ( $method === 'POST' ) {
      $fn = $this->routesPOST[$urlActual] ?? null;
    }

    if ($fn) {
      call_user_func($fn,$this);
    }else{
      echo 'La ruta no existe';
    }
     
  }
  
}
