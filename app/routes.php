<?php

$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('blog', 'PagesController@blog');
$router->get('post', 'PagesController@post');

// Galería
$router->get('galeria', 'GaleriaController@index', 'ROLE_USER');
$router->post('galeria/nueva', 'GaleriaController@nueva', 'ROLE_ADMIN');
$router->get ('galeria/:id', 'GaleriaController@show', 'ROLE_USER');
$router->get('galeria/editar/:id', 'GaleriaController@editar', 'ROLE_ADMIN');
$router->post('galeria/editar/:id', 'GaleriaController@actualizar', 'ROLE_ADMIN');
$router->get('galeria/borrar/:id', 'GaleriaController@borrar', 'ROLE_ADMIN');


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

//exposiciones 
$router->get ('exposiciones', 'ExposicionesController@index', 'ROLE_USER');
$router->get('exposiciones/nueva', 'ExposicionesController@nueva', 'ROLE_ADMIN');
$router->post('exposiciones/guardar', 'ExposicionesController@guardar', 'ROLE_ADMIN');
$router->get('exposicion/anadirimagen/:id', 'ExposicionesController@anadirImagen', 'ROLE_ADMIN');
$router->post('exposicion/guardarImagen', 'ExposicionesController@guardarImagen', 'ROLE_ADMIN');
