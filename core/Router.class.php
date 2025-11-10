<?php
class Router
{
  private function __construct()
  {
    $this->routes = [];
  }
  /**
   * @param sring $file
   * @return Router
   */
  public static function load(string $file): Router
  {
    $router = new Router();
    require $file;
    return $router;
  }
  private $routes;
  /**
   * @param array $routes
   * @return void
   */
  public function define(array $routes): void
  {
    $this->routes = $routes;
  }

  public function direct(string $uri): string
  {
    if (array_key_exists($uri, $this->routes))
      return $this->routes[$uri];
    throw new NotFoundException("No se ha definido una ruta para la uri solicitada");
  }
}
