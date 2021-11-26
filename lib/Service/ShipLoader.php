<?php

declare(strict_types=1);

class ShipLoader
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getShips(): array
    {
        $ships = [];
        $dataShips = $this->queryForShips();
        foreach ($dataShips as $dataShip) {
            $ships[] = $this->transformDataToShip($dataShip);
        }

        return $ships;
    }

    private function queryForShips(): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOneById(int $id): ?Ship
    {
        $statement = $this->pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (empty($result)) {
            return null;
        }

        return $this->transformDataToShip($result);
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
