<?php

declare(strict_types=1);

class Container
{
    private array $configuration;
    private ?PDO $pdo = null;
    private ?ShipStorageInterface $shipStorage = null;

    public function __construct(array $configuration) {
        $this->configuration = $configuration;
    }

    public function getPDO(): PDO
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    public function getShipStorage(): ShipStorageInterface
    {
        if ($this->shipStorage === null) {
             $this->shipStorage = new PdoShipStorage($this->getPDO());
            //$this->shipStorage = new JsonShipStorage('./resources/ships.json');
        }

        return $this->shipStorage;
    }
}