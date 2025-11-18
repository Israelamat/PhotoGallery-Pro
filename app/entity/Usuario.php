<?php

namespace dwes\app\entity;

use dwes\app\entity\IEntity;

class Usuario implements IEntity
{
  /**
   * @var int
   */
  private $id;
  /**
   * @var string
   */
  private $username;
  /**
   * @var string
   */
  private $password;
  /**
   * @var string
   */
  private $role;

  /**
   *      * @return Usuario
   */
  public function __construct(
    string $username = '',
    string $password = '',
    string $role = ''
  ) {
    $this->username = $username;
    $this->password = $password;
    $this->role = $role;
  }

  // -------------------- GETTERS --------------------

  public function getId(): ?int
  {
    return $this->id;
  }
  public function getUsername(): string
  {
    return $this->username;
  }
  public function getPassword(): string
  {
    return $this->password;
  }
  public function getRole(): string
  {
    return $this->role;
  }


    // -------------------- SETTERS --------------------

  /**
   * @params string $username
   * @return Usuario
   */
  public function setUsername(string $username): Usuario
  {
    $this->username = $username;
    return $this;
  }

  /**
   * @return Usuario
   */
  public function setPassword(string $password): Usuario
  {
    $this->password = $password;
    return $this;
  }

  /**
   * @return Usuario
   */
  public function setRole(string $role): Usuario
  {
    $this->role = $role;
    return $this;
  }


    // -------------------- toString --------------------
  /**
   * @return string
   */
  public function __toString(): string
  {
    return $this->username . ' (' . $this->role . ')';
  }


    //---------------------------Interface--------------------
  /**
   * @return array
   */
  public function toArray(): array
  {
    return [
      'username' => $this->getUsername(),
      'password' => $this->getPassword(),
      'role' => $this->getRole()
    ];
  }
}
