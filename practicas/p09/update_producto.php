<?php
$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$nombre = isset($_POST['nombre']) ? $_POST ['nombre'] : 'nombre_producto';
$marca = isset($_POST['marca']) ? $_POST ['marca'] : 'marca_producto';
$modelo = isset($_POST['modelo']) ? $_POST ['modelo'] : 'modelo_producto';
$precio = isset($_POST['precio']) ? $_POST ['precio'] : 0.0;
$detalles = isset($_POST['detalles']) ? $_POST ['detalles'] : 'detalles_producto';
$unidades = isset($_POST['unidades']) ? $_POST ['unidades'] : 0;
$imagen = isset($_POST['img']) ? $_POST ['img'] : 'imagen_producto';


/** SE CREA EL OBJETO DE CONEXION */
@$link = mysqli_connect('localhost', 'root', 'changocome', 'marketzone');
/** comprobar la conexión */

if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

$sql = "UPDATE productos SET nombre = '{$nombre}', marca = '{$marca}', modelo = '{$modelo}', precio = {$precio}, detalles = '{$detalles}', unidades = {$unidades}, imagen = '{$imagen}' WHERE id = {$id}";


    if ($link->query($sql)) {
        echo <<<EOD
        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
        <head>
            <meta charset="UTF-8" />
            <title>Producto Modificado</title>
        </head>
        <body>
            <h1>Producto modificado con éxito</h1>
            <p>ID: {$id}</p>
            <p>Nombre: {$nombre}</p>
            <p>Marca: {$marca}</p>
            <p>Modelo: {$modelo}</p>
            <p>Precio: {$precio}</p>
            <p>Detalles: {$detalles}</p>
            <p>Unidades: {$unidades}</p>
            <p>Imagen: {$imagen}</p>
            <br><p>
            <a href="get_productos_xhtml_v2.php">Ver Productos XHTML</a> |        
            <a href="get_productos_vigentes_v2.php">Ver Productos Vigentes</a>
            </p>';
        </body>
        </html>
        EOD;
    } else {
        mostrarError('Error: El producto no pudo ser modificado. ' . $link->error);
    }


// Cerrar la conexión
$link->close();

