<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        include_once 'src/funciones.php';
        if(isset($_GET['numero']))
        {
            esMultiplo($_GET['numero']); //
        }
    ?>

    <h2>Ejercicio 2</h2>
    <p>Escribir programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por: impar, par, impar <p>
    <?php
        include_once 'src/funciones.php';
        imparParImpar();
    ?>

    <h2>Ejercio 3</h2>
    <p> Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>
    <?php
        include_once 'src/funciones.php'; 
        multiploAleatorio($_GET['numero']);
    ?>




    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>


    <?php
        
    ?>
</body>
</html>