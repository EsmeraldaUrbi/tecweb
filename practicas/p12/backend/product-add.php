<?php
    use TECWEB\MYAPI\Create;
    include_once __DIR__.'/vendor/autoload.php';
    $producto = new Create('marketzone');
    $producto->add(file_get_contents('php://input'));
    echo $producto->getData();
?>