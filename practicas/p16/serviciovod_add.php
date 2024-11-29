<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Rutas del archivo XML original y del archivo modificado
    $xmlFile = 'catalogoVOD.xml';
    $outputFile = 'catalogo_vod_actualizado.xml';

    // Cargar el XML existente
    $xml = simplexml_load_file($xmlFile);

    // Obtener los datos del formulario
    $perfilUsuario = $_POST['perfil_usuario'];
    $perfilIdioma = $_POST['perfil_idioma'];
    $generoPeliculas = $_POST['genero_peliculas'];
    $pelicula1Titulo = $_POST['pelicula1_titulo'];
    $pelicula1Duracion = $_POST['pelicula1_duracion'];
    $pelicula2Titulo = $_POST['pelicula2_titulo'];
    $pelicula2Duracion = $_POST['pelicula2_duracion'];
    $generoSeries = $_POST['genero_series'];
    $serie1Titulo = $_POST['serie1_titulo'];
    $serie1Duracion = $_POST['serie1_duracion'];
    $serie2Titulo = $_POST['serie2_titulo'];
    $serie2Duracion = $_POST['serie2_duracion'];

    // Agregar un nuevo perfil
    $nuevoPerfil = $xml->cuenta->perfiles->addChild('perfil');
    $nuevoPerfil->addAttribute('usuario', $perfilUsuario);
    $nuevoPerfil->addAttribute('idioma', $perfilIdioma);

    // Agregar un nuevo género a películas
    $nuevoGeneroPeliculas = $xml->contenido->peliculas->addChild('genero');
    $nuevoGeneroPeliculas->addAttribute('nombre', $generoPeliculas);
    $titulo1Peliculas = $nuevoGeneroPeliculas->addChild('titulo');
    $titulo1Peliculas->addAttribute('duracion', $pelicula1Duracion);
    $titulo1Peliculas->addChild('nombre', $pelicula1Titulo);
    $titulo2Peliculas = $nuevoGeneroPeliculas->addChild('titulo');
    $titulo2Peliculas->addAttribute('duracion', $pelicula2Duracion);
    $titulo2Peliculas->addChild('nombre', $pelicula2Titulo);

    // Agregar un nuevo género a series
    $nuevoGeneroSeries = $xml->contenido->series->addChild('genero');
    $nuevoGeneroSeries->addAttribute('nombre', $generoSeries);
    $titulo1Series = $nuevoGeneroSeries->addChild('titulo');
    $titulo1Series->addAttribute('duracion', $serie1Duracion);
    $titulo1Series->addChild('nombre', $serie1Titulo);
    $titulo2Series = $nuevoGeneroSeries->addChild('titulo');
    $titulo2Series->addAttribute('duracion', $serie2Duracion);
    $titulo2Series->addChild('nombre', $serie2Titulo);

    // Guardar el XML modificado en un nuevo archivo
    $xml->asXML($outputFile);

    // Mostrar un hipervínculo para descargar el archivo actualizado
    echo '<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Catálogo VOD Actualizado</title>
        </head>
        <body>
            <h1>Catálogo VOD Actualizado</h1>
            <p>El archivo XML ha sido actualizado con éxito.</p>
            <a href="' . $outputFile . '" download>Descargar XML Actualizado</a>
        </body>
        </html>';
        } else {
            echo 'Acceso no válido. Por favor, usa el formulario para enviar datos.';
        }
?>
