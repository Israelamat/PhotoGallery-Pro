<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\repository\ImagenesRepository;
use dwes\app\repository\AsociadosRepository;
use dwes\core\Response;
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
