<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$configuration = [
    'db_dsn' => 'mysql:host=localhost;dbname=space_battle',
    'db_user' => 'root',
    'db_password' => 'root'
];

require __DIR__ . '/lib/Service/Container.php';
require __DIR__ . '/lib/Model/BattleHistory.php';
require __DIR__ . '/lib/Service/BattleManager.php';
require __DIR__ . '/lib/Service/BattleLoader.php';
require __DIR__ . '/lib/Service/ShipLoader.php';
require __DIR__ . '/lib/Model/BattleResult.php';
require __DIR__ . '/lib/Model/Ship.php';
require __DIR__ . '/lib/Service/ShipStorageInterface.php';
require __DIR__ . '/lib/Service/PdoShipStorage.php';
require __DIR__ . '/lib/Service/JsonShipStorage.php';
require __DIR__ . '/lib/Model/HistoryCollection.php';

$container = new Container($configuration);