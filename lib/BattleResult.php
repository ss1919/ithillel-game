<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winner;
    private ?Ship $looser;
    private bool $isJediPowerUsed;

    public function __construct(
        ?Ship $winner,
        ?Ship $looser,
        bool $isJediPowerUsed
    ) {
        $this->winner = $winner;
        $this->looser = $looser;
        $this->isJediPowerUsed = $isJediPowerUsed;
    }

    public function getWinner(): ?Ship
    {
        return $this->winner;
    }

    public function getLooser(): ?Ship
    {
        return $this->looser;
    }

    public function isJediPowerUsed(): bool
    {
        return $this->isJediPowerUsed;
    }

    public function isThereAWinner(): bool
    {
        return $this->getWinner() !== null;
    }
}