<?php
    use TECWEB\MYAPI\Products as Products;
    include_once __DIR__.'/myapi/Products.php';
    $prodObject = new Products ('marketzone');
    $prodObject -> search($_GET['search']);
    echo $prodObject->getData();
?>