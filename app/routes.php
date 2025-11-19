<?php

$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('blog', 'PagesController@blog');
$router->get('post', 'PagesController@post');

// Galería
$router->get('galeria', 'GaleriaController@index', 'ROLE_USER');
$router->post('galeria/nueva', 'GaleriaController@nueva', 'ROLE_ADMIN');
$router->get ('galeria/:id', 'GaleriaController@show', 'ROLE_USER');

// Asociados
$router->get('asociados', 'AsociadosController@index');
$router->post('asociados/nuevo', 'AsociadosController@nueva');

// Contacto
$router->get('contact', 'ContactoController@index');

// User
$router->get ('login', 'AuthController@login');
$router->post('check-login', 'AuthController@checkLogin');
$router->get ('logout', 'AuthController@logout');
$router->get ('registro', 'AuthController@registro');
$router->post('check-registro', 'AuthController@checkRegistro');