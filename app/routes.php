<?php

$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('blog', 'PagesController@blog');
$router->get('post', 'PagesController@post');

// Galería
$router->get('galeria', 'GaleriaController@index');
$router->post('galeria/nueva', 'GaleriaController@nueva');
$router->get ('galeria/:id', 'GaleriaController@show');

// Asociados
$router->get('asociados', 'AsociadosController@index');
$router->post('asociados/nuevo', 'AsociadosController@nueva');

// Contacto
$router->get('contact', 'ContactoController@index');

// User
$router->get ('login', 'AuthController@login');
$router->post('check-login', 'AuthController@checkLogin');
$router->get ('logout', 'AuthController@logout');