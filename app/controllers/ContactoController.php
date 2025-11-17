<?php

namespace dwes\app\controllers;

use dwes\core\Response;

class ContactoController
{
  // Mostrar formulario de contacto
  public function index()
  {
    Response::renderView(
      'contact',         // Vista: contact.view.php
      'layout' // Layout con footer diferente
    );
  }
}
