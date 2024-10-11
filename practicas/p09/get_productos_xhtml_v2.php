<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </script>
</head>
<body>
    <h3>Lista de Productos</h3>

    <?php
    if (isset($_GET['tope'])) {
        $tope = intval($_GET['tope']);

        if ($tope >= 0) {
            $link = new mysqli('localhost', 'root', 'changocome', 'marketzone');

            if ($link->connect_errno) {
                die('Falló la conexión: ' . $link->connect_error);
            }

            $stmt = $link->prepare("SELECT * FROM productos WHERE unidades <= ?");
            $stmt->bind_param("i", $tope);
            $stmt->execute();
            $result = $stmt->get_result();

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
                echo '<th scope="col">Modificar</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr id="' . htmlspecialchars($row['id']) . '">';
                    echo '<th class="row-data" scope="row">' . htmlspecialchars($row['id']) . '</th>';
                    echo '<td class="row-data">' . htmlspecialchars($row['nombre']) . '</td>';
                    echo '<td class="row-data">' . htmlspecialchars($row['marca']) . '</td>';
                    echo '<td class="row-data">' . htmlspecialchars($row['modelo']) . '</td>';
                    echo '<td class="row-data">' . htmlspecialchars($row['precio']) . '</td>';
                    echo '<td class="row-data">' . htmlspecialchars($row['unidades']) . '</td>';
                    echo '<td class="row-data">' . htmlspecialchars($row['detalles']) . '</td>';
                    echo '<td class="row-data"><img src="' . htmlspecialchars($row['imagen']) . '" alt="Imagen de ' . htmlspecialchars($row['nombre']) . '" style="width: 100px;"></td>';
                    echo '<td class="row-data"><input type="button" value="Modificar" onclick="show(event)"></td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No se encontraron productos con unidades menores o iguales a ' . $tope . '.</p>';
            }

            $stmt->close();
            $link->close();
        } else {
            echo '<p>El valor de "tope" debe ser un número no negativo.</p>';
        }
    } else {
        echo '<p>Parámetro "tope" no detectado...</p>';
    }
    ?>

    <script>
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
</body>
</html>
