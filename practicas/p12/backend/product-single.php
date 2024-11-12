<?php
    use TECWEB\MYAPI\Read;
    include_once __DIR__.'/vendor/autoload.php';
    $producto = new Read('marketzone');
    $producto->single($_POST['id']);
    echo $producto->getData();
?>
