<?php
    use TECWEB\MYAPI\Read;
    include_once __DIR__.'/vendor/autoload.php';
    $producto = new Read('marketzone');
    $producto->singleByName($_GET['name']);
    echo $producto->getData();
?>