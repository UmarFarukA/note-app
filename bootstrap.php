<?php

use utils\Container;
use utils\Database;
use utils\App;

$container = new Container();

$container->bind('utils\Database', function () {

    $config = require base_path('config.php');

    return new Database($config);
});

$db = $container->resolve('utils\Database');
// var_dump($db);

App::setContainer($container);
