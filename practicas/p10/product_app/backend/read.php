<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['datoBusqueda']) ) {
        $datoBusqueda = $_POST['datoBusqueda'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query("SELECT * FROM productos WHERE 
            nombre LIKE '%{$datoBusqueda}%' 
            OR marca LIKE '%{$datoBusqueda}%' 
            OR detalles LIKE '%{$datoBusqueda}%'
            OR id = '{$datoBusqueda}'") ) {
            // SE OBTIENEN LOS RESULTADOS
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // Codifica los valores en UTF-8 y los agrega al arreglo de respuesta
                $producto = array();
                foreach ($row as $key => $value) {
                    $producto[$key] = utf8_encode($value);
                }
                // Añade cada producto al array de respuesta
                $data[] = $producto;
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
        
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>