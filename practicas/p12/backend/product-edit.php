<?php
    use TECWEB\MYAPI\Update;
    include_once __DIR__.'/vendor/autoload.php';
    $producto = new Update('marketzone');
    $producto->edit(file_get_contents('php://input'));
    echo $producto->getData();
?>
