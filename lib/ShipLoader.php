<?php

declare(strict_types=1);

class ShipLoader
{
    public function getShips(): array
    {
        $starFighter = (new Ship())
            ->setName('Jedi Starfighter')
            ->setWeaponPower(5)
            ->setStrength(15)
            ->setJediFactor(30)
        ;
        $cloakShapeFighter = (new Ship())
            ->setName('CloakShape Fighter')
            ->setWeaponPower(2)
            ->setStrength(70)
            ->setJediFactor(2)
        ;
        $superStarDestroyer = (new Ship())
            ->setName('Super Star Destroyer')
            ->setWeaponPower(70)
            ->setStrength(500)
            ->setJediFactor(0)
        ;
        $rz1AWingInterceptor = (new Ship())
            ->setName('RZ-1 A-wing interceptor')
            ->setWeaponPower(4)
            ->setStrength(50)
            ->setJediFactor(4)
        ;

        return [
            'starFighter' => $starFighter,
            'cloakShapeFighter' => $cloakShapeFighter,
            'superStarDestroyer' => $superStarDestroyer,
            'rz1AWingInterceptor' => $rz1AWingInterceptor,
        ];
    }
}
