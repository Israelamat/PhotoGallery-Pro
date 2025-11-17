<?php

namespace dwes\app\repository;

use dwes\core\database\QueryBuilder;
use dwes\app\entity\Categoria;

class CategoriaRepository extends QueryBuilder
{
  /**
   * @param string  table
   * @param string classEntity
   */
  public function __construct(string $table = 'categoria', string $classEntity = 'Categoria')
  {
    // Pasamos el namespace completo de la clase Categoria
    parent::__construct('categoria', Categoria::class);
  }
  public function nuevaImagen(Categoria $categoria)
  {
    $categoria->setNumImagenes($categoria->getNumImagenes() + 1);
    $this->update($categoria);
  }
}
