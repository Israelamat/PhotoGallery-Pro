<?php

namespace dwes\app\repository;

use dwes\core\database\QueryBuilder;
use dwes\app\entity\Imagen;
use dwes\app\entity\Categoria;

class ImagenesRepository extends QueryBuilder
{
  /**
   * @param string $table
   * @param string $classEntity
   */
  public function __construct(string $table = 'imagenes', string $classEntity = 'Imagen')
  {
    // Aquí pasamos el nombre de la tabla y el FQCN completo de la clase Imagen
    parent::__construct('imagenes', Imagen::class);
  }
  /**
   * @param ImagenGaleria $imagenGaleria
   * @return Categoria
   * @throws NotFoundException
   * @throws QueryException
   */
  public function getCategoria(Imagen $imagenGaleria): Categoria
  {
    $categoriaRepository = new CategoriaRepository();
    return $categoriaRepository->find($imagenGaleria->getCategoria());
  }
  public function guarda(Imagen $imagenGaleria)
  {
    $fnGuardaImagen = function () use ($imagenGaleria) { // Creamos una función anónima que se llama como callable
      $categoria = $this->getCategoria($imagenGaleria);
      $categoriaRepository = new CategoriaRepository();
      $categoriaRepository->nuevaImagen($categoria);
      $this->save($imagenGaleria);
    };
    $this->executeTransaction($fnGuardaImagen); // Se pasa un callable
  }
}
