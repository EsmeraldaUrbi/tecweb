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

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner el valor en cada índice. </p>
    <?php
        include_once 'src/funciones.php';
        arregloASCII();
    ?>

    <fieldset>
        <legend><h2>Ejercicio 5</h2> </legend>
        <form method="post">
            Edad: <input type="text" name="edad" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required> 
            Sexo:<select name="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            <input type="submit">
        </form>
    </fieldset>
    <?php
        include_once 'src/funciones.php';
        verificarEdadSexo($_POST["edad"], $_POST["sexo"]);
    ?>

    <fieldset>
        <legend><h2>Ejercicio 6</h2></legend>
        <p> Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de una ciudad.</p>
        
        <h2>Consulta de Vehículos</h2>
        <form method="post">
            Matrícula: <input type="text" name="matricula">
            <input type="submit" value="Consultar">
            <br><br>
        </form>
        <form method="post">
            <input type="submit" name="todos" value="Mostrar Todos los Autos" style="margin-bottom: 20px">
        </form>
    </fieldset>
    <?php
        include_once 'src/funciones.php';
        $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : null;
        $todos = isset($_POST["todos"]) ? $_POST["todos"] : null;
        mostrarVehiculos($matricula, $todos);
    ?>
    
</body>
</html>