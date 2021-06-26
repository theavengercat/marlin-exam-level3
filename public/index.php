<?php
include '../start.php';
$router = new Router();
$router->set404('/404');

$router->create('/about', 'about.php');
$router->create('/', 'homepage.php');
$router->start();