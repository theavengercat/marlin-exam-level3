<?php

(array)$posts = QueryBuilder::getInstance()->get('news')->getResults();
include('../app/view/homepage.view.php')
?>