<?php
$db = include '../start.php';

$db->insert('news', ['title' => 't5', 'text' => mt_rand(1,100)]);

var_dump($_POST);