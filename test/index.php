<?php
require './controllers/frontController.php';
require './controllers/backController.php';

$frontpage = new FrontController();
$backpage = new BackController();
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "/";

switch ($path) {
case '/';
require 'views/front.view.php';
break;
case '/back';
require 'views/back.view.php';
break;

default:
echo "Your favorite color is neither red, green nor blue";
}