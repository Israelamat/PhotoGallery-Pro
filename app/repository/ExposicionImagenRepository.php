<?php

namespace dwes\app\repository;

use dwes\core\database\QueryBuilder;
use dwes\app\entity\ExposicionImagen;

class ExposicionImagenRepository extends QueryBuilder
{
  /**
   * @param string $table
   * @param string $classEntity
   * 
   */
  public function __construct(
    string $table = 'exposicionimagen',
    string $classEntity = ExposicionImagen::class
  ) {
    parent::__construct($table, $classEntity);
  }

  public function guarda(ExposicionImagen $relacion)
  {
    return $this->save($relacion);
  }

  public function eliminar(int $id)
  {
    return $this->borrar($id);
  }
}
