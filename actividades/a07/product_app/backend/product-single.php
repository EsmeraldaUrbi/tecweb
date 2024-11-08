<?php
    use TECWEB\MYAPI\Products as Products;
    include_once __DIR__.'/myapi/Products.php';
    $prodObject = new Products ('marketzone');
    $prodObject -> single($_POST['id']);
    echo $prodObject -> getData();
?>