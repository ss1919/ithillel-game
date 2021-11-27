<?php

declare(strict_types=1);

interface ShipStorageInterface
{
    public function findOneById(int $id): ?Ship;

    public function fetchAll(): array;
}