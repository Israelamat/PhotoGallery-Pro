<?php
namespace dwes\app\entity;

interface IEntity
{
    /**
     * @return array
     */
    public function toArray(): array;
}