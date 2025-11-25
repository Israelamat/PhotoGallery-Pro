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
    Response::renderView(
      'index',      // Nombre de la vista
      'layout',     // Layout común
      compact('imagenGaleria', 'asociadosLista') // Variables a pasar a la vista
    );
  }
  public function about()
  {
    $imagenesClientes = [
      new Imagen('client1.jpg', 'MISS BELLA'),
      new Imagen('client2.jpg', 'DON PENO'),
      new Imagen('client3.jpg', 'SWEETY'),
      new Imagen('client4.jpg', 'LADY'),
    ];

    Response::renderView(
      'about',   
      'layout',  
      compact('imagenesClientes')
    );
  }

  public function blog()
  {
    Response::renderView(
      'blog',    
      'layout'
    );
  }

  public function post()
  {
    Response::renderView(
      'single_post',  
      'layout'
    );
  }
}
