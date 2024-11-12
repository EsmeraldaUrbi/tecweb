<?php
    use TECWEB\MYAPI\Read;
    include_once __DIR__.'/vendor/autoload.php';
    $producto = new Read('marketzone');
    $producto->list();
    echo $producto->getData();
?>