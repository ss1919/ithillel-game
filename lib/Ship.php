<?php


declare(strict_types=1);

class Ship
{
    private ?string $name = null;
    private int $weaponPower = 0;
    private int $strength = 1;
    private int $jediFactor = 0;
   // private bool $underRepair;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getWeaponPower(): int
    {
        return $this->weaponPower;
    }

    public function setWeaponPower(int $weaponPower): self
    {
        $this->weaponPower = $weaponPower;
        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;
        return $this;
    }

    public function getJediFactor(): int
    {
        return $this->jediFactor;
    }

    public function setJediFactor(int $jediFactor): self
    {
        $this->jediFactor = $jediFactor;
        return $this;
    }

    public function getNameAndSpecs(bool $useShortFormat = false): string
    {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s/%s/%s',
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        }

        return sprintf(
            '%s (w: %s, j: %s, s: %s)',
            $this->getName(),
            $this->getWeaponPower(),
            $this->getJediFactor(),
            $this->getStrength()
        );
    }

    public function isFunctional(): bool
    {
        return !$this->underRepair;
    }

    public function isGivenShipHaveMoreStrength(Ship $ship): bool
    {
        return $ship->getStrength() > $this->getStrength();
    }
}
