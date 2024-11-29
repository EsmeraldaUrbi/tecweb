<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>
    
    <xsl:template match="/">
        <html lang="es">
            <head>
                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <title>Catálogo VOD</title>
                <link rel="stylesheet" href="styles.css"/>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        margin: 20px;
                        background-color: #141414; 
                        color: #e5e5e5; 
                    }
                    header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    header h1 {
                        color: #ffffff;
                        font-size: 2em;
                        margin: 10px 0;
                    }
                    img {
                        width: 300px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                        background-color: #1f1f1f; 
                        border-radius: 8px; 
                        overflow: hidden;
                    }
                    th, td {
                        padding: 15px;
                        text-align: left;
                        border-bottom: 1px solid #333; 
                    }
                    th {
                        background: linear-gradient(90deg, #2a1a5e, #512da8, #7b1fa2, #e040fb); 
                        color: #ffffff;
                        font-weight: bold;
                        text-transform: uppercase;
                        border-bottom: none;
                    }
                    tr:hover {
                        background-color: #333333; 
                    }
                    td {
                        color: #b3b3b3; 
                    }
                    section h2 {
                        font-size: 1.5em;
                        color: #ffffff;
                        padding-bottom: 10px;
                        margin-bottom: 20px;
                        border-bottom: 4px solid;
                        border-image: linear-gradient(90deg, #9c27b0, #ff4081) 1; 
                    }
                </style>
            </head>
            <body>
                <header>
                    <img src="logo.png" alt="Logotipo" id="logo"/>
                    <h1>Cátalogo HBO Max</h1>
                </header>
                <main>
                    <section id="peliculas">
                        <h2>Películas</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Duración</th>
                                    <th>Género</th>
                                </tr>
                            </thead>
                            <tbody>
                                <xsl:for-each select="/catalogoVOD/contenido/peliculas/genero">
                                    <xsl:for-each select="titulo">
                                        <tr>
                                            <td><xsl:value-of select="nombre"/></td>
                                            <td><xsl:value-of select="@duracion"/></td>
                                            <td><xsl:value-of select="../@nombre"/></td>
                                        </tr>
                                    </xsl:for-each>
                                </xsl:for-each>
                            </tbody>
                        </table>
                    </section>
                    <section id="series">
                        <h2>Series</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Duración</th>
                                    <th>Género</th>
                                </tr>
                            </thead>
                            <tbody>
                                <xsl:for-each select="/catalogoVOD/contenido/series/genero">
                                    <xsl:for-each select="titulo">
                                        <tr>
                                            <td><xsl:value-of select="nombre"/></td>
                                            <td><xsl:value-of select="@duracion"/></td>
                                            <td><xsl:value-of select="../@nombre"/></td>
                                        </tr>
                                    </xsl:for-each>
                                </xsl:for-each>
                            </tbody>
                        </table>
                    </section>
                </main>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>