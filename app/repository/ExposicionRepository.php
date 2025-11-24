<?php

namespace dwes\app\repository;

use dwes\core\database\QueryBuilder;
use dwes\app\entity\Exposicion;

class ExposicionRepository extends QueryBuilder
{
  /**
   * @param string $table
   * @param string $classEntity
   */
  public function __construct(string $table = 'exposiciones', string $classEntity = Exposicion::class)
  {
    parent::__construct($table, $classEntity);
  }

  /**
   * @param Exposicion $expo
   * @return Exposicion
   */
  public function guardar(Exposicion $expo)
  {
    return $this->save($expo);
  }

  public function actualizar(Exposicion $expo)
  {
    return $this->update($expo);
  }
}
