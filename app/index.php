<?php

use App\Core\Router;

require_once "." . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

require_once "." . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "helpers.php";

$router = new Router();


$router->get("/about", function (){
    echo '<h1>INDEX!</h1>';
});
$router->get("/about", "App\\Controllers\\AboutController@index");
$router->post("/about", "App\\Controllers\\AboutController@newContact");

$router->get("/", function (){
   echo "WORK!";
});

$router->run();


//
//echo '<pre>';
//var_dump($router);
//
//
////echo $router->getUri();
////
////echo nl2br(PHP_EOL);
////
//echo $_SERVER["REQUEST_METHOD"];
//
//?>
<!---->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!--<form action="/about" method="post">-->
<!--    <input type="text" name="qwe">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
