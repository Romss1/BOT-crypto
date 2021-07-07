<?php
include '../vendor/autoload.php';
use LifeStyleCoding\Container\Container;

$url = filter_input(INPUT_SERVER, "PATH_INFO");
var_dump($url);
$table = require ('../config/route.php');

if($url === null) {
    $url = "/";
}

foreach ($table as $urlRoad => $road):

    if($url === $urlRoad) {
        include './../src/Controller/'.$road['controller'];
        $road["action"]();
    }

endforeach;

$class = "\\App\\Controller\\Home";
$method = "index";
$container = new Container();
$instance = $container->resolve($class);
$container->execute($instance, $method);