<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';

        unset($_myvar, $_var, $myvar, $var7, $_element1);
    ?>
    <h2>Ejercicio 2</h2>
    <p?>Proporcionar los valores de $a, $b, $c y mostrar su contenido:</p>
    <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo '<h4>Resultado:</h4>';  

        echo $a.'<br> <br>';
        echo $b.'<br> <br>';
        echo $c.'<br> <br>';

        $a = "PHP server";
        $b = &$a;

        echo '<p> Describe y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones.</p>';
        echo '<h4>Resultado:</h4>';  

        echo $a.'<br> <br>';
        echo $b.'<br> <br>';
        echo $c.'<br> <br>';

        echo '<h4> Explicación: </h4>';
        echo '<p>Se reasignó el valor a la variable $a y a la variable $b. El nuevo valor de la varibale $b se asignó por referencia, es decir, se le asigno el valor que tenía asignado la variable $a.</p>';

        unset($a, $b, $c);
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación, verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglo):</p>
    <?php
        $a = "PHP5";
        echo '$a: '.$a.'<br>';

        $z[] = &$a;
        echo '$z[]: ';
        print_r($z);

        $b = "5a version de PHP";
        echo '$b: '.$b.'<br>';

        $c = intval($b)*10;
        echo '$c: '.$c.'<br>';

        $a .= $b;
        echo '$a: '.$a.'<br>';

        settype($b, 'int');
        $b *= $c;
        echo '$b: '.$b.'<br>';

        $z[0] = "MySQL";
        echo '$z[]: ';
        print_r($z);

        echo '<h2>Ejercicio 4</h2>';
        echo '<p> Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        la matriz $GLOBALS o del modificador global de PHP.</p>';

        echo $GLOBALS['a']; 
        echo '<br>';
        echo $GLOBALS['z'][0]; 
        echo '<br>';
        echo $GLOBALS['b']; 
        echo '<br>';
        echo $GLOBALS['c']; 
        echo '<br>';

        unset($a, $z, $b, $c);
    ?>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <?php
        $a = "7 personas";
        echo "$a <br>";
        $b = (integer) $a;
        echo "$b <br>";
        $a = "9E3";
        echo "$a <br>";
        $c = (double) $a;
        echo "$c <br>";

        echo '<h2>Ejercicio 6</h2>';
        echo '<p> Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        la matriz $GLOBALS o del modificador global de PHP.</p>';

    ?>


    
</body>
</html>