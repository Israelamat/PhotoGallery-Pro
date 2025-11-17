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

class GaleriaController
{
  // Mostrar galería
  public function index()
  {
    $imagenes = App::getRepository(ImagenesRepository::class)->findAll();
    $categoriasRepo = App::getRepository(CategoriaRepository::class);
    $categorias = $categoriasRepo->findAll(); // <-- Traemos todas las categorías

    $titulo = '';
    $descripcion = '';
    $errores = [];
    $mensaje = '';

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
    $errores = [];
    $mensaje = '';

    $errores = [];
    try {
      /** @var ImagenesRepository $imagenesRepository */
      $imagenesRepository = App::getRepository(ImagenesRepository::class);

      $titulo = trim(htmlspecialchars($_POST['titulo']));
      $descripcion = trim(htmlspecialchars($_POST['descripcion']));
      $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

      $imagen = new File('imagen', $tiposAceptados); // 'imagen' es el name del input en el form
      $categoria = trim(htmlspecialchars($_POST['categoria']));
      if (empty($categoria)) {
        throw new CategoriaException();
      }

      $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
      $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
      $imagenesRepository->guarda($imagenGaleria);

      App::get('logger')->add("Se ha guardado una imagen: " . $imagenGaleria->getNombre());
      $mensaje = "Se ha guardado la imagen correctamente";
    } catch (FileException $fileException) {
      $errores[] = $fileException->getMessage();
    } catch (QueryException $queryException) {
      $errores[] = $queryException->getMessage();
    } catch (AppException $appException) {
      $errores[] = $appException->getMessage();
    } catch (CategoriaException) {
      $errores[] = "No se ha seleccionado una categoría válida";
    }

    // Después de guardar o si hay errores, renderizamos la galería otra vez
    $imagenes = App::getRepository(ImagenesRepository::class)->findAll();
    Response::renderView(
      'galeria',
      'layout',
      compact('imagenes', 'categorias', 'titulo', 'descripcion', 'errores', 'mensaje') // pasamos errores y mensaje si existen
    );
  }
}
