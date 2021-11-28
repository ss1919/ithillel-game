<?php

declare(strict_types=1);

namespace Model;

class BattleHistory
{
    private int $battleId;
    private string $winnerName;
    private int $winnerH;
    private int $winnerQ;
    private string $looserName;
    private int $looserH;
    private int $looserQ;
    private string $winners;
    private string $battleDate;

    public function __construct(int $battleId, string $winnerName, int $winnerH, int $winnerQ, string $looserName, int $looserH, int $looserQ, string $winners, string $battleDate) {
        $this->battleId = $battleId;
        $this->winnerName = $winnerName;
        $this->winnerH = $winnerH;
        $this->winnerQ = $winnerQ;
        $this->looserName = $looserName;
        $this->looserH = $looserH;
        $this->looserQ = $looserQ;
        $this->winners = $winners;
        $this->battleDate = $battleDate;
    }

    public function getBattleId(): int
    {
        return $this->battleId;
    }

    public function getWinnerName(): string
    {
        return $this->winnerName;
    }

    public function getWinnerH(): int
    {
        return $this->winnerH;
    }

    public function getWinnerQ(): int
    {
        return $this->winnerQ;
    }

    public function getLooserName(): string
    {
        return $this->looserName;
    }

    public function getLooserH(): int
    {
        return $this->looserH;
    }

    public function getLooserQ(): int
    {
        return $this->looserQ;
    }

    public function getWinners(): string
    {
        return $this->winners;
    }

    public function getBattleDate(): string
    {
        return $this->battleDate;
    }
}