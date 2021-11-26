<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winner;
    private ?Ship $looser;
    private ?int $winnerHealth;
    private ?int $winnerQ;
    private ?int $looserHealth;
    private ?int $looserQ;
    private bool $isJediPowerUsed;


    public function __construct(
        ?Ship $winner,
        ?Ship $looser,
        ?int $winnerHealth,
        ?int $winnerQ,
        ?int $looserHealth,
        ?int $looserQ,
        bool $isJediPowerUsed
    ) {
        $this->winner = $winner;
        $this->looser = $looser;
        $this->winnerHealth = $winnerHealth;
        $this->winnerQ = $winnerQ;
        $this->looserHealth = $looserHealth;
        $this->looserQ = $looserQ;
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

    public function getWinnerQ(): ?int
    {
        return $this->winnerQ;
    }

    public function getLooserQ(): ?int
    {
        return $this->looserQ;
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


