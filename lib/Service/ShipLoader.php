<?php

declare(strict_types=1);

class ShipLoader
{
    private ShipStorageInterface $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    public function getShips(): array
    {
        return $this->shipStorage->fetchAll();
    }
}