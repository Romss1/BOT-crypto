<?php

include '../vendor/autoload.php';
use LifeStyleCoding\Container\Container;

$url = filter_input(INPUT_SERVER, "PATH_INFO");

$table = require ('../config/route.php');

if($url === null) {
    $url = "/";
}

foreach ($table as $urlRoad => $param) {
    if($url === $urlRoad) {
        $class = "\\App\\Controller\\" . $param['controller'];
        $method = $param['action'];
        $container = new Container();
        $instance = $container->resolve($class);
        $container->execute($instance, $method);
    }
}