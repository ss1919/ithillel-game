<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winner;
    private ?Ship $looser;
    private ?int $winnerHealth;
    private ?int $looserHealth;
    private bool $isJediPowerUsed;

    public function __construct(
        ?Ship $winner,
        ?Ship $looser,
        ?int $winnerHealth,
        ?int $looserHealth,
        bool $isJediPowerUsed
    ) {
        $this->winner = $winner;
        $this->looser = $looser;
        $this->winnerHealth = $winnerHealth;
        $this->looserHealth = $looserHealth;
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

    public function getWinnerHealth(): ?int
    {
        return $this->winnerHealth;
    }

    public function getLooserHealth(): ?int
    {
        return $this->looserHealth;
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