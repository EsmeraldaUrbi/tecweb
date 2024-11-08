<?php
    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';
    $prodObject = new Products('marketzone');
    $prodObject->add(file_get_contents('php://input'));

    echo $prodObject->getData();
?>