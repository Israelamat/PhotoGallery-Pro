<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\entity\Exposicion;
use dwes\app\repository\ExposicionRepository;
use dwes\core\Response;
use dwes\core\helpers\FlashMessage;
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\QueryException;
use dwes\app\exceptions\FileException;
use dwes\app\repository\ExposicionImagenRepository;
use dwes\app\repository\ImagenesRepository;
use dwes\app\entity\ExposicionImagen;

class ExposicionesController
{
  public function index()
  {
    $userId = $_SESSION['loguedUser'] ?? null;

    if (!$userId) {
      App::get('router')->redirect('/login');
    }
    $expoRepo = new ExposicionRepository();
    $exposiciones = $expoRepo->findAll();
    $exposicionesActiva = $expoRepo->exposicionesActivas();
    $imagesexpo = new ImagenesRepository();
    $imagenes = $imagesexpo->findAll();
    $relRepo = new ExposicionImagenRepository();
    $relaciones = $relRepo->findAll();

    $errores = FlashMessage::get('errores', []);
    $mensaje = FlashMessage::get('mensaje');
    $nombre = FlashMessage::get('nombre');
    $descripcion = FlashMessage::get('descripcion');
    $fechaInicio = FlashMessage::get('fechaInicio');
    $fechaFin = FlashMessage::get('fechaFin');
    $activa = FlashMessage::get('activa');

    Response::renderView(
      'exposiciones',
      'layout',
      compact('exposiciones', 'errores', 'imagenes', 'mensaje', 
      'nombre', 'descripcion', 'fechaInicio', 'fechaFin', 'activa', 'relaciones', 'exposicionesActiva')
    );
  }

  public function nueva()
  {
    $userId = $_SESSION['loguedUser'] ?? null;

    if (!$userId) {
      App::get('router')->redirect('/login');
    }
    Response::renderView(
      'exposiciones-nueva',
      'layout'
    );
  }

  public function guardar()
  {
    $userId = $_SESSION['loguedUser'] ?? null;

    if (!$userId) {
      App::get('router')->redirect('/login');
    }
    $exposicionesRespository = new ExposicionRepository();
    $nombre = '';
    $descripcion = '';
    $fechaInicio = '';
    $fechaFin = '';
    try {
      $nombre = trim($_POST['nombre'] ?? '');
      $descripcion = trim($_POST['descripcion'] ?? '');
      $fechaInicio = $_POST['fechaInicio'] ?? '';
      $fechaFin = $_POST['fechaFin'] ?? '';
      $activa = isset($_POST['activa']) ? 1 : 0;

      $expo = new Exposicion(
        $nombre,
        $descripcion,
        $fechaInicio,
        $fechaFin,
        $activa,
        $userId
      );

      $exposicionesRespository->guardar($expo);
      $exposiciones = $exposicionesRespository->findAll();
      Response::renderView(
        'exposiciones',
        'layout',
        compact('exposiciones')
      );
    } catch (FileException $fileException) {
      $_SESSION['errores'][] = $fileException->getMessage();
    } catch (QueryException $queryException) {
      $_SESSION['errores'][] = $queryException->getMessage();
    } catch (AppException $appException) {
      $_SESSION['errores'][] = $appException->getMessage();
    }
  }

  public function anadirImagen(int $id)
  {
    $exposicionerepository = new ExposicionRepository();
    $exposicionesActivas = $exposicionerepository->exposicionesActivas();
    $imagenRepository = new ImagenesRepository();
    $imagenes = $imagenRepository->findAll();
    $idImagen = $id;

    response::renderView(
      'exposiciones-elegir',
      'layout',
      compact('imagenes', 'idImagen', 'exposicionesActivas')
    );
  }

  public function guardarImagen()
  {
    $idExposicion = $_POST['idExposicion'];
    $idImagen = $_POST['idImagen'];
    $exposicionImagenRepository = new ExposicionImagenRepository();
    $exposicionImagen = new ExposicionImagen($idImagen, $idExposicion);
    $exposicionImagenRepository->guarda($exposicionImagen);
    header('location: /exposiciones');
  }
}
