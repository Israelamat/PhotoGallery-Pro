<?php
require_once __DIR__ . '/../src/exceptions/FileException.php';
require_once __DIR__ . '/../src/utils/File.class.php';
require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/entity/categoria.class.php';
require_once __DIR__ . '/../src/entity/asociado.class.php';
require_once __DIR__ . '/../src/database/Connection.class.php';
require_once __DIR__ . '/../src/exceptions/QueryException.php';
require_once __DIR__ . '/../src/database/QueryBuilder.class.php';
require_once __DIR__ . '/../src/exceptions/AppException.php';
require_once __DIR__ . '/../src/exceptions/CategoriaException.php';
require_once __DIR__ . '/../core/App.php';
require_once __DIR__ . '/../src/repository/ImagenesRepository.php';
require_once __DIR__ . '/../src/repository/CategoriaRepository.php';

$titulo = "";
$errores = [];
$descripcion = '';
$mensaje = '';

try {
    $config = require __DIR__ . '/../app/config.php';
    //var_dump($config);
    App::bind('config', $config);
    $conexion = App::getConnection();
    $imagenesRepository = new ImagenesRepository();
    $imagenes = $imagenesRepository->findAll();

    $categoriaRepository = new CategoriaRepository();
    $categorias = $categoriaRepository->findAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

        $imagen = new File('imagen', $tiposAceptados); // El nombre del input del formulario
        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

        $categoria = ($_POST['categoria']);
        if (empty($categoria)) throw new CategoriaException;
        $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, (int) $categoria);
        $imagenesRepository->guarda($imagenGaleria);

        $mensaje = "Se ha guardado la imagen correctamente";
        $imagenes = $imagenesRepository->findAll();
    }
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage(); //Antes ponia aqui fileException 
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} catch (CategoriaException) {
    $errores[] = "No se ha seleccionado una categoría válida";
}

require_once 'views/galeria.view.php';
