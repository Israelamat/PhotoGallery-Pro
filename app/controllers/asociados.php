<?php
require_once __DIR__ . '/../../src/entity/asociado.class.php';
require_once __DIR__ . '/../../src/utils/File.class.php';
require_once __DIR__ . '/../../src/database/connection.class.php';
require_once __DIR__ . '/../../src/repository/AsociadosRepository.php';

$nombre = '';
$descripcion = '';
$errores = [];
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    session_start();

    if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
        if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
            $mensaje = '¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.';
        } else {
            try {
                $nombre = trim(htmlspecialchars($_POST['nombre']));
                $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
                $imagen = new File('imagen', $tiposAceptados);
                $imagen->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);

                $config = require __DIR__ . '/../../app/config.php';
                //var_dump($config);
                App::bind('config', $config);
                $conexion = App::getConnection();
                $asociado = new Asociado($nombre, $imagen->getFileName(), $descripcion);

                $asociadosRepository = new AsociadosRepository();
                $asociadosRepository->save($asociado);
                $mensaje = "Se ha guardado el asociado correctamente.";

            } catch (FileException $fileException) {
                $errores[] = $fileException->getMessage();
            }
        }
    } else {
        $mensaje = "Introduzca el código de seguridad.";
    }
} ?>


<?php require_once __DIR__ . '/../views/asociados.view.php';
