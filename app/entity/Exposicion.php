<?php
namespace dwes\app\entity;

use dwes\app\entity\IEntity;

class Exposicion implements IEntity
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
     * @var string
     */
    private $descripcion;
    /**
     * @var string
     */
    private $fechaInicio;
    /**
     * @var string
     */
    private $fechaFin;
    /**
     * @var bool
     */
    private $activa;
    /**
     * @var int
     */
    private $idUsuario;

    /**
     * Constructor
     * 
     * @param string $nombre
     * @param string $descripcion
     * @param string $fechaInicio Formato 'YYYY-MM-DD'
     * @param string $fechaFin Formato 'YYYY-MM-DD'
     * @param bool $activa
     * @param int $idUsuario
     */
    public function __construct(
        string $nombre = '',
        string $descripcion = '',
        string $fechaInicio = '',
        string $fechaFin = '',
        bool $activa = true,
        int $idUsuario = 0
    ) {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->activa = $activa;
        $this->idUsuario = $idUsuario;
    }

    // -------------------- GETTERS --------------------
    public function getId(): ?int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getFechaInicio(): string { return $this->fechaInicio; }
    public function getFechaFin(): string { return $this->fechaFin; }
    public function isActiva(): bool { return $this->activa; }
    public function getIdUsuario(): int { return $this->idUsuario; }

    // -------------------- SETTERS --------------------
    public function setNombre(string $nombre): Exposicion { $this->nombre = $nombre; return $this; }
    public function setDescripcion(string $descripcion): Exposicion { $this->descripcion = $descripcion; return $this; }
    public function setFechaInicio(string $fechaInicio): Exposicion { $this->fechaInicio = $fechaInicio; return $this; }
    public function setFechaFin(string $fechaFin): Exposicion { $this->fechaFin = $fechaFin; return $this; }
    public function setActiva(bool $activa): Exposicion { $this->activa = $activa; return $this; }
    public function setIdUsuario(int $idUsuario): Exposicion { $this->idUsuario = $idUsuario; return $this; }

    // -------------------- toArray --------------------
    public function toArray(): array {
        return [
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'fechaInicio' => $this->getFechaInicio(),
            'fechaFin' => $this->getFechaFin(),
            'activa' => $this->isActiva(),
            'idUsuario' => $this->getIdUsuario()
        ];
    }
}
