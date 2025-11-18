<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\repository\ImagenesRepository;
use dwes\app\repository\AsociadosRepository;
use dwes\core\Response;
use dwes\app\entity\Imagen;

class PagesController
{
  /**
   * @throws QueryException
   */
  public function index()
  {
    $imagenGaleria = App::getRepository(ImagenesRepository::class)->findAll();
    $asociadosLista = App::getRepository(AsociadosRepository::class)->findAll();
    // Renderizamos la vista usando Response
    Response::renderView(
      'index',      // Nombre de la vista
      'layout',     // Layout común
      compact('imagenGaleria', 'asociadosLista') // Variables a pasar a la vista
    );
  }
  public function about()
  {
    $imagenesClientes[] = new Imagen('client1.jpg', 'MISS BELLA');
    $imagenesClientes[] = new Imagen('client2.jpg', 'DON PENO');
    $imagenesClientes[] = new Imagen('client3.jpg', 'SWEETY');
    $imagenesClientes[] = new Imagen('client4.jpg', 'LADY');
    require __DIR__ . '/../views/about.view.php';
  }
  public function blog()
  {
    require __DIR__ . '/../views/blog.view.php';
  }
  public function post()
  {
    require __DIR__ . '/../views/single_post.view.php';
  }
}
