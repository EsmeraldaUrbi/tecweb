<?php
libxml_use_internal_errors(true);

$xmlFile = 'catalogoVOD.xml';
$xsdFile = 'catalogoVOD.xsd';

$xml = new DOMDocument();
$xml->load($xmlFile);

$htmlStart = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo VOD</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        h1 {
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
        .section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
HTML;

echo $htmlStart;

if (!$xml->schemaValidate($xsdFile)) {
    $errors = libxml_get_errors();
    echo '<div class="section"><h1>Errores de Validación</h1><ul>';
    foreach ($errors as $error) {
        echo '<li class="error">Error [' . $error->code . ']: ' . $error->message . '</li>';
    }
    echo '</ul></div>';
    libxml_clear_errors();
} else {
    $xmlContent = simplexml_load_file($xmlFile);

    echo '<h1>Catálogo VOD</h1>';

    echo '<div class="section">';
    echo '<h2>Cuenta</h2>';
    echo '<p>Correo: ' . $xmlContent->cuenta['correo'] . '</p>';
    echo '<h3>Perfiles</h3><ul>';
    foreach ($xmlContent->cuenta->perfiles->perfil as $perfil) {
        echo '<li>Usuario: ' . $perfil['usuario'] . ', Idioma: ' . $perfil['idioma'] . '</li>';
    }
    echo '</ul></div>';

    echo '<div class="section">';
    echo '<h2>Películas</h2>';
    echo '<p>Región: ' . $xmlContent->contenido->peliculas['region'] . '</p>';
    foreach ($xmlContent->contenido->peliculas->genero as $genero) {
        echo '<h3>Género: ' . $genero['nombre'] . '</h3><ul>';
        foreach ($genero->titulo as $titulo) {
            echo '<li>Título: ' . $titulo->nombre . ' (Duración: ' . $titulo['duracion'] . ')</li>';
        }
        echo '</ul>';
    }
    echo '</div>';

    echo '<div class="section">';
    echo '<h2>Series</h2>';
    echo '<p>Región: ' . $xmlContent->contenido->series['region'] . '</p>';
    foreach ($xmlContent->contenido->series->genero as $genero) {
        echo '<h3>Género: ' . $genero['nombre'] . '</h3><ul>';
        foreach ($genero->titulo as $titulo) {
            echo '<li>Título: ' . $titulo->nombre . ' (Duración: ' . $titulo['duracion'] . ')</li>';
        }
        echo '</ul>';
    }
    echo '</div>';
}

echo '</body></html>';
?>