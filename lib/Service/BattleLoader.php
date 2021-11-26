<?php

declare(strict_types=1);

class BattleLoader
{
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function save(BattleResult $result)
    {
        $statement = $this->pdo->prepare('INSERT INTO `battle_history` (`winner`, `winner_h`, `winner_q`, `looser`, `looser_h`, `looser_q`, `winners`, `battle_date`)
 VALUES (:winner, :winner_h, :winner_q, :looser, :looser_h, :looser_q, :winners, NOW())');

        $statement->bindValue(':winner', $result->getWinner()->getName());
        $statement->bindValue(':winner_h', $result->getWinnerHealth());
        $statement->bindValue(':winner_q', $result->getWinnerQ());
        $statement->bindValue(':looser', $result->getLooser()->getName());
        $statement->bindValue(':looser_h', $result->getLooserHealth());
        $statement->bindValue(':looser_q', $result->getLooserQ());
        if ($result->getWinner() === null) {
            $statement->bindValue(':winners', 'Draw');
        } else {
            $statement->bindValue(':winners', $result->getWinner()->getName());
        }

        $statement->execute();
    }

    public function getBattles(int $offset, int $limit): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM battle_history ORDER BY battle_date DESC LIMIT $offset, $limit");
        $statement->execute();
        $dbbattles = $statement->fetchAll(PDO::FETCH_ASSOC);

        $battles = [];
        foreach ($dbbattles as $dbbattle) {
            $battles[] = $this->transformDataToShip($dbbattle);
        }

        return $battles;
    }

    public function getBattlesCount(): string
    {
        $statement = $this->pdo->prepare("SELECT count(*) FROM battle_history" );
        $statement->execute();
        return $statement->fetchColumn();
    }

    private function transformDataToShip(array $data): BattleHistory
    {
        return new BattleHistory(
            (int) $data['id'],
            $data['winner'],
            (int) $data['winner_h'],
            (int) $data['winner_q'],
            $data['looser'],
            (int) $data['looser_h'],
            (int) $data['looser_q'],
            $data['winners'],
            $data['battle_date'],
        );
    }
}