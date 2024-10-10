<?php

$nombre = isset($_POST['nombre']) ? $_POST ['nombre'] : 'nombre_producto';
$marca = isset($_POST['marca']) ? $_POST ['marca'] : 'marca_producto';
$modelo = isset($_POST['modelo']) ? $_POST ['modelo'] : 'modelo_producto';
$precio = isset($_POST['precio']) ? $_POST ['precio'] : 0.0;
$detalles = isset($_POST['detalles']) ? $_POST ['detalles'] : 'detalles_producto';
$unidades = isset($_POST['unidades']) ? $_POST ['unidades'] : 0;
$imagen = isset($_POST['img']) ? $_POST ['img'] : 'imagen_producto';
//$eliminado = 0;

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

function mostrarError($mensaje)
{
    echo <<<EOD
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Error</title>
    </head>
    <body>
        <h1>Error</h1>
        <p>{$mensaje}</p>
    </body>
    </html>
    EOD;
    exit();
}

// Si la consulta devuelve filas, significa que el producto ya existe
if ($resultado->num_rows > 0) {
    mostrarError('Error: El producto con ese nombre, marca y modelo ya existe en la base de datos.');
} else {
    // Si no existe, procedemos con la inserción
    /* Primer Query
    $sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
            VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', '{$eliminado}')";
    */
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
            VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";


    if ($link->query($sql)) {
        echo <<<EOD
        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
        <head>
            <meta charset="UTF-8" />
            <title>Producto Insertado</title>
        </head>
        <body>
            <h1>Producto insertado con éxito</h1>
            <p>ID: {$link->insert_id}</p>
            <p>Nombre: {$nombre}</p>
            <p>Marca: {$marca}</p>
            <p>Modelo: {$modelo}</p>
            <p>Precio: {$precio}</p>
            <p>Detalles: {$detalles}</p>
            <p>Unidades: {$unidades}</p>
            <p>Imagen: {$imagen}</p>
        </body>
        </html>
        EOD;
    } else {
        mostrarError('Error: El producto no pudo ser insertado. ' . $link->error);
    }
}

// Cerrar la conexión
$link->close();

