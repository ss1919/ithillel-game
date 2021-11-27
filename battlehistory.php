<?php

    require __DIR__ . '/bootstrap.php';

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $limit = 10;
    $offset = ($page - 1) * $limit;

    $battleLoader = new BattleLoader($container->getPDO());
    $battles = $battleLoader->getBattles($offset, $limit);

    $allRecords = (int) $battleLoader->getBattlesCount();
    $maxPages = ceil($allRecords / $limit);
?>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Космическая битва - история битв</title>

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
    <div>
        <h2 class="text-center">История битв:</h2>
    </div>
    <div class="history-box center-block">
        <div class="row">
            <div class="col-md-2" style="border: 1px solid #eee;padding:5px;">
                <p class="text-center">DATE</p>
            </div>
            <div class="col-md-3" style="border: 1px solid #eee;padding:5px;">
                <p class="text-center">Count Winner / Name Winner</p>
            </div>
            <div class="col-md-1" style="border: 1px solid #eee;padding:5px;">
                <p class="text-center">Health Winner</p>
            </div>
            <div class="col-md-3" style="border: 1px solid #eee;padding:5px;">
                <p class="text-center">Count Looser / Name Looser</p>
            </div>
            <div class="col-md-1" style="border: 1px solid #eee;padding:5px;">
                <p class="text-center">Health Looser</p>
            </div>
            <div class="col-md-2" style="border: 1px solid #eee;padding:5px;">
                <p class="text-center">Winners</p>
            </div>
        </div>
        <?php foreach ($battles as $battle): ?>
            <div class="row">
                <div class="col-md-2" style="border: 1px solid #eee;padding:5px;">
                    <p><?php echo $battle->getBattleDate(); ?></p>
                </div>
                <div class="col-md-3" style="border: 1px solid #eee;padding:5px;">
                    <p><?php echo $battle->getWinnerQ(); ?> / <?php echo $battle->getWinnerName(); ?></p>
                </div>
                <div class="col-md-1" style="border: 1px solid #eee;padding:5px;">
                    <p><?php echo $battle->getWinnerH(); ?></p>
                </div>
                <div class="col-md-3" style="border: 1px solid #eee;padding:5px;">
                    <p><?php echo $battle->getLooserQ(); ?> / <?php echo $battle->getLooserName(); ?></p>
                </div>
                <div class="col-md-1" style="border: 1px solid #eee;padding:5px;">
                    <p><?php echo $battle->getLooserH(); ?></p>
                </div>
                <div class="col-md-2" style="border: 1px solid #eee;padding:5px;">
                    <p><?php echo $battle->getWinners(); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination center-block">
        <div class="row">
            <?php for ($i=1; $i <= $maxPages; $i++): ?>
                <div class="col-md-1 col-md-offset-4 center-block" style="border: 1px solid #000;padding: 0px; margin: 0 5px;">
                    <a href="history.php?page=<?php echo $i;?>" class="text-center" style="display: block;<?php if ($page == $i): ?>background-color: #ddd<?php endif;?>"><?php echo $i;?></a>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <a href="index.php"><p class="text-center"><i class="fa fa-undo"></i> Снова в бой</p></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</div>
</body>
</html>

