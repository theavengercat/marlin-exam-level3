<?php
function dd($a) {
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
    die();
}
