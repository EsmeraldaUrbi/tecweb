<?php

$nombre = isset($_POST['nombre']) ? $_POST ['nombre'] : 'nombre_producto';
$marca = isset($_POST['marca']) ? $_POST ['marca'] : 'marca_producto';
$modelo = isset($_POST['modelo']) ? $_POST ['modelo'] : 'modelo_producto';
$precio = isset($_POST['precio']) ? $_POST ['precio'] : 0.0;
$detalles = isset($_POST['detalles']) ? $_POST ['detalles'] : 'detalles_producto';
$unidades = isset($_POST['unidades']) ? $_POST ['unidades'] : 0;
$imagen = isset($_POST['img']) ? $_POST ['img'] : 'imagen_producto';


/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'changocome', 'marketzone');
/** comprobar la conexión */

if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

// Verificar si el producto ya existe (combinación de nombre, marca y modelo)
$consulta = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'";
$resultado = $link->query($consulta);

// Si la consulta devuelve filas, significa que el producto ya existe
if ($resultado->num_rows > 0) {
    echo 'Error: El producto con ese nombre, marca y modelo ya existe en la base de datos.';
} else {
    // Si no existe, procedemos con la inserción
    $sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen) 
            VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

    if ($link->query($sql)) {
        echo 'Producto insertado con ID: ' . $link->insert_id;
    } else {
        echo 'Error: El producto no pudo ser insertado.';
    }
}

// Cerrar la conexión
$link->close();

