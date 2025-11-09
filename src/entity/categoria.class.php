<?php
require_once __DIR__ . '/IEntity.interface.php';

class Categoria implements IEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;
    /** 
     * @var int 
     */     
    private $numImagenes;

    /**
     * @params int $id, string $nombre, int $numImagenes
     * @return Categoria
     */
    public function __construct(string $nombre='', int $numImagenes=0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    // -------------------- GETTERS --------------------
    public function getId(): ?int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getNumImagenes(): int { return $this->numImagenes; }

    // -------------------- SETTERS --------------------
    /**
     * @params string $nombre
     * @return Categoria
     */
    public function setNombre(string $nombre): Categoria { 
        $this->nombre = $nombre; 
        return $this; 
    }

    /**
     * @params int $numImagenes
     * @return Categoria
     */
    public function setNumImagenes(int $numImagenes): Categoria { 
        $this->numImagenes = $numImagenes; 
        return $this; 
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'numImagenes' => $this->getNumImagenes()
        ];
    }

}