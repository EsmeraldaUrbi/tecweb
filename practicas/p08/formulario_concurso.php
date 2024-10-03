<!DOCTYPE html >
<html>

  <head>
    <meta charset="utf-8" >
    <title>Registro al Concurso</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
  </head>

  <body>
    <h1>Registro al Concurso &ldquo;Chidos mis Tenis&rdquo;</h1>

    <p>¿Quieres cambiar tus viejos tenis por un par personalizado de Tenis Mike&#169;?<br><br>Justifica el por qué tus tenis se <em>tienen que</em> ir y tú puede ser uno de los diez afortunados ganadores.</p>

    <form id="formularioTenis" action="http://localhost/tecweb/practicas/p08/concurso.php" method="post">

    <h2>Información de Participación</h2>

      <fieldset>
        <legend>Información Personal</legend>

        <ul>
          <li><label for="form-name">Nombre:</label> <input type="text" name="name" id="form-name"></li>
          <li><label for="form-email">Dirección de E-mail:</label> <input type="email" name="email" id="form-email"></li>
          <li><label for="form-tel">Número Telefónico:</label> <input type="tel" name="phone" id="form-tel"></li>
          <li><label for="form-story">Mis tenis son tan feos porque...</label><br><textarea name="story" rows="4" cols="60" id="form-story" placeholder="No más de 300 caracteres de longitud"></textarea></li>
        </ul>
      </fieldset>

      <h2>Diseña tus Mike personalizados:</h2>

      <fieldset>
        <legend>Diseño personalizado del Tenis</legend>

        <fieldset>
          <legend>Color <em>(escoge uno)</em>:</legend>
          <ul>
            <li><label><input type="radio" name="color" value="red"> Rojo</label></li>
            <li><input type="radio" name="color" value="blue" checked=""> Azul</li>
            <li><input type="radio" name="color" value="black"> Negro</li>
            <li><input type="radio" name="color" value="silver"> Plateado</li>
            </ul>
        </fieldset>

        <fieldset>
          <legend>Características <em>(escoge tatnas como quieras)</em></legend>
          <ul>
            <li><input type="checkbox" name="features[]" value="laces"> Cordones Brillantes</li>
            <li><input type="checkbox" name="features[]" value="logo" checked> Logo Metálico</li>
            <li><input type="checkbox" name="features[]" value="heels"> Suela Luminosa</li>
            <li><input type="checkbox" name="features[]" value="mp3"> WiFi-integrado</li>
          </ul>
        </fieldset>

        <fieldset>
          <legend>Talla</legend>
          <p>Las medidas reflejan el estándar masculino: 
            <select name="size" size="1">
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
            </select>
          </p>
        </fieldset>

      </fieldset>

      <p>
        <input type="submit" value="¡Chidos mis Tenis!">
        <input type="reset">
      </p>

    </form>
  </body>
</html>