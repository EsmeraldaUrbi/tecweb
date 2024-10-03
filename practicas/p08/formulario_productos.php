<!DOCTYPE html >
<html>

  <head>
    <meta charset="utf-8" >
    <title>Registro de productos</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
  </head>

  <body>
    <h1>Registro de productos en Marketzone</h1>

    <form id="formularioProducto" action="http://localhost/tecweb/practicas/p08/set_producto_v2.php" method="post">

    <h2>Información del Producto</h2>

      <fieldset>
        <legend>Llena los campos que estan a continuacion</legend>

        <ul>
          <li><label for="form-name">Nombre:</label> <input type="text" name="nombre" id="form-name"></li>
          <li><label for="form-marca">Marca:</label> <input type="text" name="marca" id="form-marca"></li>
          <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" id="form-modelo"></li>
          <li><label for="form-precio">Precio:</label> <input type="number" name="precio" id="form-precio" step="0.01" min="0"></li>
          <li><label for="form-detalles">Detalles:</label><br><textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="No más de 300 caracteres de longitud" maxlength="300"></textarea></li>
          <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" id="form-unidades" min = "0"></li>
          <li><label for="form-img">Imagen</label> <input type="text" name="img" id="form-img"></li>
        </ul>
      </fieldset>

      <p>
        <input type="submit" value="Agregar">
        <input type="reset">
      </p>

    </form>
  </body>
</html>