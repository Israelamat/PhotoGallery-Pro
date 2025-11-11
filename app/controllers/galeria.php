<?php
require_once __DIR__ . '/../../src/exceptions/FileException.php';
require_once __DIR__ . '/../../src/utils/File.class.php';
require_once __DIR__ . '/../../src/entity/imagen.class.php';
require_once __DIR__ . '/../../src/entity/categoria.class.php';
require_once __DIR__ . '/../../src/database/Connection.class.php';
require_once __DIR__ . '/../../src/exceptions/QueryException.php';
require_once __DIR__ . '/../../src/exceptions/AppException.php';
require_once __DIR__ . '/../../src/exceptions/CategoriaException.php';
require_once __DIR__ . '/../../src/repository/ImagenesRepository.php';
require_once __DIR__ . '/../../src/repository/CategoriaRepository.php';

require_once __DIR__ . '/../../core/bootstrap.php';
$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";
try {
  $conexion = App::getConnection();
  $imagenesRepository = new ImagenesRepository();
  $categoriasRepository = new CategoriaRepository();
  $imagenes = $imagenesRepository->findAll();
  $categorias = $categoriasRepository->findAll();

} catch (QueryException $queryException) {
  $errores[] = $queryException->getMessage();  //filexception??
} catch (AppException $appException) {
  $errores[] = $appException->getMessage();
}
require_once __DIR__ . '/../views/galeria.view.php';
