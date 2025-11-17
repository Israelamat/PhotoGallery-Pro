<?php
use dwes\app\exceptions\AppException;
use dwes\app\repository\ImagenesRepository;
use dwes\app\repository\CategoriaRepository;
use dwes\core\App;
use dwes\core\database\Connection;
use dwes\core\bootstrap;
use dwes\app\exceptions\QueryException;

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
