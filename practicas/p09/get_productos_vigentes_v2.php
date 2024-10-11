<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function show(event) {
            // Obtener la fila donde se presionó el botón
            var row = event.target.parentNode.parentNode;

            // Obtener el id de la fila
            var rowId = row.getAttribute("id");

            // Obtener los datos de las celdas
            var nombre = row.cells[1].innerHTML;
            var marca = row.cells[2].innerHTML;
            var modelo = row.cells[3].innerHTML;
            var precio = row.cells[4].innerHTML;
            var unidades = row.cells[5].innerHTML;
            var detalles = row.cells[6].innerHTML;
            var img = row.cells[7].querySelector('img').src;

            // Enviar los datos al formulario
            send2form(rowId, nombre, marca, modelo, precio, unidades, detalles, img);
        }

        function send2form(rowId, nombre, marca, modelo, precio, unidades, detalles, img) {     
            
            var urlForm = "http://localhost/tecweb/practicas/p09/formulario_productos_v2.php";
            var propId = "id=" + encodeURIComponent(rowId);
            var propNombre = "nombre=" + encodeURIComponent(nombre);
            var propMarca = "marca=" + encodeURIComponent(marca);
            var propModelo = "modelo=" + encodeURIComponent(modelo);
            var propPrecio = "precio=" + encodeURIComponent(precio);
            var propUnidades = "unidades=" + encodeURIComponent(unidades);
            var propDetalles = "detalles=" + encodeURIComponent(detalles);
            var propImg = "img=" + encodeURIComponent(img);
            window.open(urlForm + "?" + propId + "&" + propNombre + "&" + propMarca + "&" + propModelo + "&" + propPrecio + "&" + propUnidades + "&" + propDetalles + "&" + propImg);
        }
    </script>
</head>
<body>
    <h3>Lista de Productos</h3>

    <?php
    // Crear la conexión a la base de datos
    $link = new mysqli('localhost', 'root', 'changocome', 'marketzone');
    
    // Comprobar la conexión
    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error);
    }

    // Crear una consulta para obtener los productos que no están eliminados
    $stmt = $link->prepare("SELECT * FROM productos WHERE eliminado = 0");
    $stmt->execute();
    $result = $stmt->get_result();

    // Comprobar si hay productos y mostrarlos en una tabla
    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Nombre</th>';
        echo '<th scope="col">Marca</th>';
        echo '<th scope="col">Modelo</th>';
        echo '<th scope="col">Precio</th>';
        echo '<th scope="col">Unidades</th>';
        echo '<th scope="col">Detalles</th>';
        echo '<th scope="col">Imagen</th>';
        echo '<th scope="col">Modificar</th>'; // Nueva columna para modificar
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr id="' . htmlspecialchars($row['id']) . '">';
            echo '<th scope="row">' . htmlspecialchars($row['id']) . '</th>';
            echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
            echo '<td>' . htmlspecialchars($row['marca']) . '</td>';
            echo '<td>' . htmlspecialchars($row['modelo']) . '</td>';
            echo '<td>' . htmlspecialchars($row['precio']) . '</td>';
            echo '<td>' . htmlspecialchars($row['unidades']) . '</td>';
            echo '<td>' . htmlspecialchars($row['detalles']) . '</td>';
            echo '<td><img src="' . htmlspecialchars($row['imagen']) . '" alt="Imagen de ' . htmlspecialchars($row['nombre']) . '" style="width: 100px;"></td>';
            echo '<td><input type="button" value="Modificar" onclick="show(event)"></td>'; // Botón para modificar
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No se encontraron productos que no estén eliminados.</p>';
    }

    $stmt->close();
    $link->close();
    ?>
</body>
</html>
