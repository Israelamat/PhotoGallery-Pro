<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\repository\AsociadosRepository;
use dwes\app\entity\Asociado;
use dwes\app\utils\File;
use dwes\app\exceptions\FileException;
use dwes\core\Response;

class AsociadosController
{
  // Mostrar lista de asociados
  public function index()
  {
    $asociados = App::getRepository(AsociadosRepository::class)->findAll();

    $nombre = '';
    $descripcion = '';
    $errores = [];
    $mensaje = '';

    Response::renderView(
      'asociados',
      'layout',
      compact('asociados', 'nombre', 'descripcion', 'errores', 'mensaje')
    );
  }

  // Dar de alta un nuevo asociado
  public function nueva()
  {
    $errores = [];
    $mensaje = '';
    $nombre = '';
    $descripcion = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      session_start();

      if (isset($_POST['captcha']) && $_POST['captcha'] !== '') {
        if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
          $mensaje = '¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.';
        } else {
          try {
            $nombre = trim(htmlspecialchars($_POST['nombre']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados);
            $imagen->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);

            $asociado = new Asociado($nombre, $imagen->getFileName(), $descripcion);
            $asociadosRepository = App::getRepository(AsociadosRepository::class);
            $asociadosRepository->save($asociado);

            $mensaje = "Se ha guardado el asociado correctamente.";
          } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
          }
        }
      } else {
        $mensaje = "Introduzca el código de seguridad.";
      }
    }

    // Recargamos la lista de asociados y pasamos errores y mensajes a la vista
    $asociados = App::getRepository(AsociadosRepository::class)->findAll();
    Response::renderView(
      'asociados',
      'layout',
      compact('asociados', 'errores', 'mensaje', 'nombre', 'descripcion')
    );
  }
}
