<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode($producto);

        // ASIGNAR LOS DATOS DEL PRODUCTO
        $nombre = $jsonOBJ->nombre;
        $precio = $jsonOBJ->precio;
        $unidades = $jsonOBJ->unidades;
        $modelo = $jsonOBJ->modelo;
        $marca = $jsonOBJ->marca;
        $detalles = $jsonOBJ->detalles;
        $imagen = $jsonOBJ->imagen;

        // VERIFICAR SI EL PRODUCTO YA EXISTE Y NO HA SIDO ELIMINADO
        $queryCheck = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
        $resultCheck = mysqli_query($conexion, $queryCheck);

        if (mysqli_num_rows($resultCheck) > 0) {
            // PRODUCTO YA EXISTE
            echo json_encode(['status' => 'error', 'message' => 'El producto ya existe']);
        } else {
            // INSERTAR EL NUEVO PRODUCTO
            $queryInsert = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen, eliminado) 
                            VALUES ('$nombre', '$precio', '$unidades', '$modelo', '$marca', '$detalles', '$imagen', 0)";

            if (mysqli_query($conexion, $queryInsert)) {
                // INSERCIÓN EXITOSA
                echo json_encode(['status' => 'success', 'message' => 'Producto insertado correctamente']);
            } else {
                // ERROR EN LA INSERCIÓN
                echo json_encode(['status' => 'error', 'message' => 'Error al insertar el producto: ' . mysqli_error($conexion)]);
            }
        }
    } else {
        // SI NO SE RECIBEN DATOS
        echo json_encode(['status' => 'error', 'message' => 'No se recibió ningún producto']);
    }
?>