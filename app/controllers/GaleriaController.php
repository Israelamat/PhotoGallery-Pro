<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\repository\ImagenesRepository;
use dwes\app\entity\Imagen;
use dwes\app\utils\File;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\QueryException;
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\CategoriaException;
use dwes\app\repository\CategoriaRepository;
use dwes\core\Response;
use dwes\core\helpers\FlashMessage;

class GaleriaController
{

  public function index()
  {
    $imagenes = App::getRepository(ImagenesRepository::class)->findAll();
    $categorias = App::getRepository(CategoriaRepository::class)->findAll();

    $errores = FlashMessage::get('errores', []);
    $mensaje = FlashMessage::get('mensaje');
    $titulo = FlashMessage::get('titulo');
    $descripcion = FlashMessage::get('descripcion');
    $categoriaSeleccionada = FlashMessage::get('categoriaSeleccionada');


    Response::renderView(
      'galeria',  // galeria.view.php
      'layout',
      compact('imagenes', 'titulo', 'descripcion', 'categorias', 'errores', 'mensaje')
    );
  }

  // Subir nueva imagen
  public function nueva()
  {
    $titulo = '';
    $descripcion = '';
    $errores = $_SESSION['errores'] ?? [];
    $mensaje = $_SESSION['mensaje'] ?? '';

    try {
      /** @var ImagenesRepository $imagenesRepository */
      $imagenesRepository = App::getRepository(ImagenesRepository::class);
      $categorias = App::getRepository(CategoriaRepository::class)->findAll();

      $titulo = trim(htmlspecialchars($_POST['titulo']));
      $descripcion = trim(htmlspecialchars($_POST['descripcion']));
      $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

      $captchaIngresado = $_POST['captcha'] ?? ''; // Obtener el valor ingresado
      $captchaEsperado = $_SESSION['captcha'] ?? null; // Obtener el valor correcto de la sesión
      if (empty($captchaIngresado) || $captchaEsperado === null || strtolower($captchaIngresado) !== strtolower($captchaEsperado)) {
        $errores = FlashMessage::get('errores', []);
      }
      $errores = FlashMessage::get('errores', []); // Lee el FlashMessage
      unset($_SESSION['captcha']);
      FlashMessage::set('titulo', $titulo);
      FlashMessage::set('descripcion', $descripcion);
      FlashMessage::set('categorias', $categorias);

      $imagen = new File('imagen', $tiposAceptados); // 'imagen' es el name del input en el form
      $categoria = trim(htmlspecialchars($_POST['categoria']));
      if (empty($categoria)) {
        throw new CategoriaException();
      }
      FlashMessage::set('categoriaSeleccionada', $categoria);

      $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
      $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
      $imagenesRepository->guarda($imagenGaleria);

      App::get('logger')->add("Se ha guardado una imagen: " . $imagenGaleria->getNombre());
      FlashMessage::set('mensaje', "Se ha guardado la imagen correctamente");

      FlashMessage::unset('titulo');
      FlashMessage::unset('descripcion');
      FlashMessage::unset('categoriaSeleccionada');
      FlashMessage::set('mensaje', "Se ha guardado la imagen correctamente");
    } catch (FileException $fileException) {
      $_SESSION['errores'][] = $fileException->getMessage();
    } catch (QueryException $queryException) {
      $_SESSION['errores'][] = $queryException->getMessage();
    } catch (AppException $appException) {
      $_SESSION['errores'][] = $appException->getMessage();
    } catch (CategoriaException $categoriaException) {
      $_SESSION['errores'][] = $categoriaException->getMessage();
    }

    $errores = FlashMessage::get('errores', []);
    $mensaje = FlashMessage::get('mensaje');

    // Después de guardar o si hay errores, renderizamos la galería otra vez
    $imagenes = App::getRepository(ImagenesRepository::class)->findAll();
    Response::renderView(
      'galeria',
      'layout',
      compact('imagenes', 'categorias', 'titulo', 'descripcion', 'errores', 'mensaje') // pasamos errores y mensaje si existen
    );
  }
  public function show($id)
  {
    $imagenesRepository = App::getRepository(ImagenesRepository::class);
    $imagen = $imagenesRepository->find($id);
    Response::renderView(
      'imagen-show',
      'layout',
      compact('imagen', 'imagenesRepository')
    );
  }
}
