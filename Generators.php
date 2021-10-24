<?php

    function convert($size)
    {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log(size, 1024)))), 2) . ' ' . $unit[$i];
    }
    /*
     * ВЫБОРКА ЗАПИСЕЙ ИЗ БАЗЫ ДАННЫХ.
     */

    // Плохой метод выберать все записи сразу.
    $begin = microtime(true);
    $SelectStat = $pdo->select()
        ->from('categories');

    $stmt = $SelectStat->execute();
    //$data = $stmt->fetchAll();
    while ($row = $stmt->fetch()) {
        $row['text'];
    }
    echo convert(memory_get_usage());

    $end = microtime(true);
    echo ($end - $begin) . 'seconds';


    // Метод немного лучше, выбераем итерациями часть данных.
    $begin = microtime(true);
    $step = 0;
    $size = 10000;
    while (true) {
        $SelectStat = $pdo->select()
            ->from('categories')
            ->limit(new Limit($size, $step * $size));

        $stmt = $SelectStat->execute();
        if ($stmt->rowCount() === 0) {
            break;
        }
        while ($row = $stmt->fetch()) {
            // Плохо что логика вшита в слой фактического выбора данных
            $row['text'];
        }
        $step++;
    }
    echo convert(memory_get_usage()) . PHP_EOL;
    $end = microtime(true);
    echo ($end - $begin) . 'seconds';


    /////////////////// Используем Генератор /////////////////
    function getMillionRecords($pdo)
    {
        $begin = microtime(true);
        $step = 0;
        $size = 10000;
        $data = [];
        while (true) {
            $SelectStat = $pdo->select()
                ->from('categories')
                ->limit(new Limit($size, $step * $size));

            $stmt = $SelectStat->execute();
            if ($stmt->rowCount() === 0) {
                break;
            }
            echo convert(memory_get_usage());
            while ($row = $stmt->fetch()) {
                yield $row['text'];
            }
            $step++;
        }
        echo convert(memory_get_usage());
        $end = microtime(true);
        echo ($end - $begin) . 'seconds';

        return $data;
    }
    //////////////////////////////////////////////////////////////
    foreach (getMillionRecords($pdo) as $text) {
        substr($text, 0, 4);
    }






