<?php
include '../start.php';
$router = new Router();
$router->set404('/404');

$router->create('/about', 'about.php');
$router->create('/', 'app/controllers/homepage.php');
$router->start();