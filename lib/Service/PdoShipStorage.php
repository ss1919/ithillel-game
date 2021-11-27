<?php

declare(strict_types=1);


class PdoShipStorage implements ShipStorageInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findOneById(int $id): ?Ship
    {
        $statement = $this->pdo->prepare('SELECT * FROM ships WHERE id = :id');
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (empty($result)) {
            return null;
        }

        return $this->transformDataToShip($result);
    }


    public function fetchAll(): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM ship');
        $statement->execute();

        $ships = [];
        foreach ($statement->fetchAll() as $ship) {
            $ships[] = $this->transformDataToShip($ship);
        }

        return $ships;
    }

    private function transformDataToShip(array $data): Ship
    {
        $ship = new Ship($data['name']);
        $ship->setStrength((int) $data['strength'])
            ->setJediFactor((int) $data['jedi_factor'])
            ->setWeaponPower((int) $data['weapon_power'])
            ->setId((int) $data['id'])
        ;

        return $ship;
    }
}