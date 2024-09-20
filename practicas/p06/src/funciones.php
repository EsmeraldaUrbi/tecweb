<?php

    // EJERCICIO 1
    function esMultiplo($num)
    {
        if(isset($_GET['numero']))
            $num = $_GET['numero'];
                if ($num%5==0 && $num%7==0)
                {
                    echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
                }
                else
                {
                    echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
                }
    }

    //EJERCICIO 2
    function imparParImpar()
    {
        $matriz = [];
        $contador = 0;

        do {
            $num1 = rand (0, 1000);
            $num2 = rand (0, 1000);
            $num3 = rand (0, 1000);
            $matriz [] = [$num1, $num2, $num3];
            $contador++;
            

        } while(!(($num1%2 != 0) && ($num2%2 == 0) && ($num3%2 != 0)));
    
        foreach ($matriz as $fila) {
            foreach ($fila as $valor) {
                echo $valor . ' ';
            }
            echo '<br>';
        }
    
        echo ($contador*3).' numeros obtenidos en '.$contador.' iteraciones';

    }

    //EJERCICIO 3
    function multiploAleatorio($numero) {
        $contador = 0;
        do {
            $contador++;
            $num = rand(1, 999);
        } while ($num%$numero != 0);
        echo '<h3>R= El número '.$num.' es múltiplo de '.$numero.'</h3>';
        echo '<h3>Se encontró en '.$contador.' intentos</h3>';
    }

    //EJERCICIO 4
    function arregloASCII() {
        $letras = array();
        for ($i = 97; $i <= 122; $i++) {
            $letras[$i] = chr($i); 
        }
        
        echo "<table border='1' width=100px style='text-align: center;'>";
        foreach ($letras as $key => $value) {
            echo '<tr>'; 
            echo '<td>' . $key . '</td>'; 
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
        echo "</table>";
    }

    //EJERCICIO 5
    function verificarEdadSexo($edad, $sexo) {
        if(isset($_POST["edad"]) && isset($_POST["sexo"])) {
            $edad = $_POST["edad"];
            $sexo = $_POST["sexo"];
            
            if (($sexo != "femenino") && ($edad < 18 || $edad > 35)) {
                echo '<h3>Usted no cumple con los requisitos: debe ser de sexo femenino y estar entre 18 y 35 años.</h3>';
            } 

            else if ($sexo != "femenino") {
                echo '<h3>Usted no cumple con el requisito de ser de sexo femenino.</h3>';
            } 

            else if ($edad < 18 || $edad > 35) {
                echo '<h3>Usted no cumple con el requisito de edad: debe tener entre 18 y 35 años.</h3>';
            } 

            else {
                echo '<h3>Bienvenida, usted está en el rango de edad permitido.</h3>';
            }
        }
    }
?>