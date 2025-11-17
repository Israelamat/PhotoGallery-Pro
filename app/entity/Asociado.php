<?php
namespace dwes\app\entity;

use dwes\app\entity\IEntity;
class Asociado implements IEntity
{

    const RUTA_LOGOS_ASOCIADOS = '/public/images/asociados/';

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
    private $logo;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @params string $nombre, string $logo, string $descripcion, string $imagen
     * @return Asociado
     */
    public function __construct(
        string $nombre,
        string $logo,
        string $descripcion
    ) {
        $this->nombre =  $nombre;
        $this->logo =  $logo;
        $this->descripcion =  $descripcion;
    }

    // -------------------- GETTERS --------------------

    public function getId(): ?int{return $this->id;}
    public function getNombre(): string {return $this->nombre;}
    public function getLogo(): string {return $this->logo;}
    public function getDescripcion(): string {return $this->descripcion;}

    // -------------------- SETTERS --------------------
    /**
     * @params string $nombre
     * @return Asociado
     */
    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @params string $logo
     * @return Asociado
     */
    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @params string $descripcion
     * @return Asociado
     */
    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    // -------------------- toString --------------------
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->descripcion;
    }


    // -------------------- MÉTODO PARA OBTENER URL --------------------
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return self::RUTA_LOGOS_ASOCIADOS . $this->getLogo();
    }

    //---------------------------Interface--------------------
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            //'id' => $this->getId(), // en el anterior insert no se le pasa el ID y si se le pasa ahora la BD recibe un null 
            'nombre' => $this->getNombre(),
            'logo' => $this->getLogo(),
            'descripcion' => $this->getDescripcion()
        ];
    }
}
