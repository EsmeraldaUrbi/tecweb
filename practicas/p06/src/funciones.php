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
    
        foreach ($matriz as $fila) 
        {
            foreach ($fila as $valor) 
            {
                echo $valor . ' ';
            }
            echo '<br>';
        }
    
        echo ($contador*3).' numeros obtenidos en '.$contador.' iteraciones';

    }

    //EJERCICIO 3
    function multiploAleatorio($numero) 
    {
        $contador = 0;
        do {
            $contador++;
            $num = rand(1, 999);
        } while ($num%$numero != 0);
        echo '<h3>R= El número '.$num.' es múltiplo de '.$numero.'</h3>';
        echo '<h3>Se encontró en '.$contador.' intentos</h3>';
    }

    //EJERCICIO 4
    function arregloASCII() 
    {
        $letras = array();
        for ($i = 97; $i <= 122; $i++) 
        {
            $letras[$i] = chr($i); 
        }
        
        echo "<table border='1' width=100px style='text-align: center;'>";
        foreach ($letras as $key => $value) 
        {
            echo '<tr>'; 
            echo '<td>' . $key . '</td>'; 
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
        echo "</table>";
    }

    //EJERCICIO 5
    function verificarEdadSexo($edad, $sexo) 
    {
        if(isset($_POST["edad"]) && isset($_POST["sexo"])) 
        {
            $edad = $_POST["edad"];
            $sexo = $_POST["sexo"];
            
            if (($sexo != "femenino") && ($edad < 18 || $edad > 35)) 
            {
                echo '<h3>Usted no cumple con los requisitos: debe ser de sexo femenino y estar entre 18 y 35 años.</h3>';
            } 

            else if ($sexo != "femenino") 
            {
                echo '<h3>Usted no cumple con el requisito de ser de sexo femenino.</h3>';
            } 

            else if ($edad < 18 || $edad > 35) 
            {
                echo '<h3>Usted no cumple con el requisito de edad: debe tener entre 18 y 35 años.</h3>';
            } 

            else 
            {
                echo '<h3>Bienvenida, usted está en el rango de edad permitido.</h3>';
            }
        }
    }

    //EJERCICIO 6
    $vehiculos = [
        'AAA1111' => [
            'Auto' => [
                'marca' => 'TOYOTA',
                'modelo' => 2022,
                'tipo' => 'SUV'
            ],
            'Propietario' => [
                'nombre' => 'Esmeralda Urbina',
                'ciudad' => 'Guadalajara, Jal.',
                'direccion' => 'Calle Diamante 25'
            ]
        ],
        'BBB2222' => [
            'Auto' => [
                'marca' => 'HONDA',
                'modelo' => 2020,
                'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Kaltum Viveros',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Los Arcos 10'
            ]
        ],
        'CCC3333' => [
            'Auto' => [
                'marca' => 'FORD',
                'modelo' => 2019,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Nelson Sosa',
                'ciudad' => 'Monterrey, NL.',
                'direccion' => 'Av. Constitución 999'
            ]
        ],
        'DDD4444' => [
            'Auto' => [
                'marca' => 'TESLA',
                'modelo' => 2023,
                'tipo' => 'SUV'
            ],
            'Propietario' => [
                'nombre' => 'Diego Nava',
                'ciudad' => 'Cancún, QR.',
                'direccion' => 'Blvd. Bonampak 502'
            ]
        ],
        'EEE5555' => [
            'Auto' => [
                'marca' => 'NISSAN',
                'modelo' => 2018,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Andy Perez',
                'ciudad' => 'Querétaro, Qro.',
                'direccion' => 'Calle Constitución 450'
            ]
        ],
        'FFF6666' => [
            'Auto' => [
                'marca' => 'MERCEDES',
                'modelo' => 2021,
                'tipo' => 'coupe'
            ],
            'Propietario' => [
                'nombre' => 'Sofia Jimenez',
                'ciudad' => 'Mérida, Yuc.',
                'direccion' => 'Calle 30 No. 10'
            ]
        ],
        'GGG7777' => [
            'Auto' => [
                'marca' => 'AUDI',
                'modelo' => 2019,
                'tipo' => 'SUV'
            ],
            'Propietario' => [
                'nombre' => 'Jorge Herrera',
                'ciudad' => 'Aguascalientes, Ags.',
                'direccion' => 'Calle Las Flores 123'
            ]
        ],
        'HHH8888' => [
            'Auto' => [
                'marca' => 'VOLKSWAGEN',
                'modelo' => 2020,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Isabel Lopez',
                'ciudad' => 'Ciudad de México, CDMX.',
                'direccion' => 'Av. Paseo de la Reforma 120'
            ]
        ],
        'III9999' => [
            'Auto' => [
                'marca' => 'CHEVROLET',
                'modelo' => 2017,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Juan Carlos Conde',
                'ciudad' => 'Toluca, Edo. Mex.',
                'direccion' => 'Av. de los Maestros 456'
            ]
        ],
        'JJJ1010' => [
            'Auto' => [
                'marca' => 'MAZDA',
                'modelo' => 2022,
                'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Laura Suarez',
                'ciudad' => 'San Luis Potosí, SLP.',
                'direccion' => 'Calle Independencia 678'
            ]
        ],
        'KKK1111' => [
            'Auto' => [
                'marca' => 'KIA',
                'modelo' => 2021,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Miguel Sanchez',
                'ciudad' => 'León, Gto.',
                'direccion' => 'Blvd. Delta 555'
            ]
        ],
        'LLL1212' => [
            'Auto' => [
                'marca' => 'HYUNDAI',
                'modelo' => 2020,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Gabriela Torres',
                'ciudad' => 'Morelia, Mich.',
                'direccion' => 'Calle Madero 123'
            ]
        ],
        'MMM1313' => [
            'Auto' => [
                'marca' => 'FIAT',
                'modelo' => 2019,
                'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Sandra Garcia',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Juárez 234'
            ]
        ],
        'NNN1414' => [
            'Auto' => [
                'marca' => 'PEUGEOT',
                'modelo' => 2021,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Raul Hernandez',
                'ciudad' => 'Tijuana, BC.',
                'direccion' => 'Blvd. Díaz Ordaz 987'
            ]
        ]
    ];

    function mostrarVehiculos($matricula, $todos) 
    {
        global $vehiculos;
        if (isset($matricula)) 
        {
            if (isset($vehiculos[$matricula])) 
            {
                echo '<pre>';
                print_r($vehiculos[$matricula]);
                echo '</pre>';
            } 
            else 
            {
                echo '<p>No se encontró el vehículo con matrícula ' . htmlspecialchars($matricula) . '.</p>';
            }
        }
        if (isset($todos)) 
        {
            echo '<pre>';
            print_r($vehiculos);
            echo '</pre>';
        }
    } 
?>