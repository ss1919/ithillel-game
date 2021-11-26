<?php

    require __DIR__ . '/bootstrap.php';

    $shipLoader = new ShipLoader($container->getPDO());
    $ships = $shipLoader->getShips();


    $ship1Id = $_POST['ship1_id'] ?? null;
    $ship1Quantity = $_POST['ship1_quantity'] ?? 1;
    $ship2Id = $_POST['ship2_id'] ?? null;
    $ship2Quantity = $_POST['ship2_quantity'] ?? 1;

    if (!$ship1Id || !$ship2Id) {
        header('Location: /index.php?error=missing_data');
        die;
    }


    if (!isset($ships[$ship1Id], $ships[$ship2Id])) {
    header('Location: /index.php?error=bad_ships');
    die;
    }

    if ($ship1Quantity <= 0 || $ship2Quantity <= 0) {
    header('Location: /index.php?error=bad_quantities');
    die;
    }

    $ship1 = $shipLoader->findOneById((int) $ship1Id);
    $ship2 = $shipLoader->findOneById((int) $ship2Id);

    $battleManager = new BattleManager();
    $outcome = $battleManager->battle($ship1, $ship1Quantity, $ship2, $ship2Quantity);
    $battleLoader = new BattleLoader($container->getPDO());
    $battleLoader->save($outcome);

    ?>

`
`  <html lang="ru">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Космическая битва</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <div class="container">
    <div class="page-header">
        <h1>Космическая битва</h1>
    </div>
    <h2 class="text-center">Столкновение:</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <p class="text-center">
                    <br>
                    <?php
                    echo $ship1Quantity; ?> <?php
                    echo $ship1->getName(); ?><?php
                    echo $ship1Quantity > 1 ? 's' : ''; ?>
                    VS.
                    <?php
                    echo $ship2Quantity; ?> <?php
                    echo $ship2->getName(); ?><?php
                    echo $ship2Quantity > 1 ? 's' : ''; ?>
                </p>
            </h3>
        </div>

        <div class="result-box center-block">
            <h3 class="text-center audiowide">
                Winner:
                <?php
                if ($outcome->isThereAWinner()): ?>
                    <?php
                    echo $outcome->getWinner()->getName(); ?>
                <?php
                else: ?>
                    Ничья
                <?php
                endif; ?>
            </h3>
            <div class="alert alert-success">
                <p class="text-center">
                    <?php
                    if (!$outcome->isThereAWinner()): ?>
                        Корабли уничтожили друг друга в эпической битве.
                    <?php
                    else: ?>
                        The <?php
                        echo $outcome->getWinner()->getName(); ?>
                        <?php
                        if ($outcome->isJediPowerUsed()): ?>
                            использовал свои Силу Джедая для ошеломляющей победы!
                        <?php
                        else: ?>
                            одолели и уничтожили  <?php
                        if ($outcome->getWinner() == $outcome->getWinner()->getName()) {
                            echo $outcome->getLooser()->getName();
                        } else {
                            echo $outcome->getWinner()->getName();
                        }
                            //echo $outcome->getLooser()->getName();
                            ?>s

                        <?php
                        endif; ?>
                    <?php
                    endif; ?>
                </p>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4 class="text-center audiowide"><p>Остаток Health кораблей</p></h4>
                </div>
                <?php if (!$outcome->isThereAWinner()): ?>
                    <div class="col-md-12 text-center">
                        <p>У всех кораблей не осталось Health</p>
                    </div>
                <?php else: ?>
                    <div class="col-md-6 text-center">
                        <h4 class="text-center audiowide"><p><?php echo $outcome->getWinner()->getName(); ?> : <span
                                        class="badge"><?php echo $outcome->getWinnerHealth(); ?></span></p></h4>
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="text-center audiowide"><p><?php echo $outcome->getLooser()->getName(); ?> : <span
                                        class="badge"><?php echo $outcome->getLooserHealth(); ?></span></p></h4>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <a href="/index.php">
        <p class="text-center">
            <button type="button" class="btn btn-default btn-lg m 10"><i class="fa fa-undo"></i> Снова в бой</button> /
            <a href="/battlehistory.php"><button type="button" class="btn btn-default btn-lg m 10"><i class="fa fa-undo"></i> История битв</button></a>
        </p>
    </a>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </div>
    </body>
    </html>
