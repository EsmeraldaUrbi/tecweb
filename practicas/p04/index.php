<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
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
    <p>Proporcionar los valores de $a, $b, $c y mostrar su contenido:</p>
    <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo '<h4>Resultado:</h4>';  
        
        // Aseguramos que el contenido esté envuelto en <p> o contenedores válidos
        echo '<p>' . $a . '</p>';
        echo '<p>' . $b . '</p>';
        echo '<p>' . $c . '</p>';

        $a = "PHP server";
        $b = &$a;

        echo '<p> Describe y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones.</p>';
        echo '<h4>Resultado:</h4>';  

        echo '<p>' . $a . '</p>';
        echo '<p>' . $b . '</p>';
        echo '<p>' . $c . '</p>';

        echo '<h4> Explicación: </h4>';
        echo '<p>Se reasignó el valor a la variable $a y a la variable $b. El nuevo valor de la variable $b se asignó por referencia, es decir, se le asignó el valor que tenía asignado la variable $a.</p>';

        unset($a, $b, $c);
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación, verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglos):</p>
    <?php
        $a = "PHP5";
        echo '<p>$a: '.$a.'</p>';

        $z[] = &$a;
        echo '<p>$z[]: ';
        print_r($z);
        echo '</p>';

        $b = "5a version de PHP";
        echo '<p>$b: '.$b.'</p>';

        $c = intval($b)*10;
        echo '<p>$c: '.$c.'</p>';

        $a .= $b;
        echo '<p>$a: '.$a.'</p>';

        settype($b, 'int');
        $b *= $c;
        echo '<p>$b: '.$b.'</p>';

        $z[0] = "MySQL";
        echo '<p>$z[]: ';
        print_r($z);
        echo '</p>';

        echo '<h2>Ejercicio 4</h2>';
        echo '<p> Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        la matriz $GLOBALS o del modificador global de PHP.</p>';

        echo '<p>'.$GLOBALS['a'].'</p>'; 
        echo '<p>'.$GLOBALS['z'][0].'</p>'; 
        echo '<p>'.$GLOBALS['b'].'</p>'; 
        echo '<p>'.$GLOBALS['c'].'</p>';

        unset($a, $z, $b, $c);
    ?>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <?php
        $a = "7 personas";
        echo '<p>' . $a . '</p>';
        $b = (integer) $a;
        echo '<p>' . $b . '</p>';
        $a = "9E3";
        echo '<p>' . $a . '</p>';
        $c = (double) $a;
        echo '<p>' . $c . '</p>';

        unset($a, $b, $c);
    ?>

    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas usando la función var_dump(&lt;datos&gt;):</p>
    <?php
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo '<p>';
        var_dump($a);
        echo '</p>';

        echo '<p>';
        var_dump($b);
        echo '</p>';

        echo '<p>';
        var_dump($c);
        echo '</p>';

        echo '<p>';
        var_dump($d);
        echo '</p>';

        echo '<p>';
        var_dump($e);
        echo '</p>';

        echo '<p>';
        var_dump($f);
        echo '</p>';

        echo '<p>$c: '. var_export($c, true).'</p>';
        echo '<p>$e: '. var_export($e, true).'</p>';

        unset($a, $b, $c, $d, $e, $f);
    ?>

    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:    </p>

    <?php
        echo '<p>a. La versión de Apache y PHP: '.$_SERVER['SERVER_SOFTWARE'].'</p>';
        echo '<p>b. El nombre del sistema operativo (servidor): '.$_SERVER['SERVER_NAME'].'</p>';
        echo '<p>c. El idioma del navegador (cliente): '.$_SERVER['HTTP_ACCEPT_LANGUAGE'].'</p>';
    ?>

    <p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>

</body>
</html>