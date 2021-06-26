<?php

(array)$posts = QueryBuilder::getInstance()->get('news')->getResults();
include('../index.view.php')
?>