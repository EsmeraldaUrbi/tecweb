<?php
    use TECWEB\MYAPI\Delete;
    include_once __DIR__.'/vendor/autoload.php';
    $producto = new Delete('marketzone');
    $producto->delete($_GET['id']);
    echo $producto->getData();
?>