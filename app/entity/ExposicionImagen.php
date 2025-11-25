<?php

namespace dwes\app\entity;

use dwes\app\entity\IEntity;

class ExposicionImagen implements IEntity
{
  /**
   * @var int
   */
  private $idImagen;

  /**
   * @var int
   */
  private $idExposicion;

  /**
   * Constructor
   */
  public function __construct(int $idImagen = 0, int $idExposicion = 0)
  {
    $this->idImagen = $idImagen;
    $this->idExposicion = $idExposicion;
  }

  // -------------------- GETTERS --------------------
  public function getIdImagen(): int
  {
    return $this->idImagen;
  }
  public function getIdExposicion(): int
  {
    return $this->idExposicion;
  }

  // -------------------- SETTERS --------------------
  public function setIdImagen(int $idImagen): ExposicionImagen
  {
    $this->idImagen = $idImagen;
    return $this;
  }

  public function setIdExposicion(int $idExposicion): ExposicionImagen
  {
    $this->idExposicion = $idExposicion;
    return $this;
  }

  // -------------------- toArray --------------------
  public function toArray(): array
  {
    return [
      'idImagen' => $this->getIdImagen(),
      'idExposicion' => $this->getIdExposicion()
    ];
  }
}
