<?php

spl_autoload_register(function(string $className) {
    require(dirname(__DIR__).'\\'.$classNmae.'.php');

});

var_dump($_GET['route']);
echo 'lol';
// $controller = new src\controllers\mainController;
// if (isset($_GET['name'])) $controller-> sayHello($_GET['name']);
// else $controller->main();
