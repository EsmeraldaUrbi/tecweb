<!DOCTYPE html >
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
    <style type="text/css">
        ol, ul { 
        list-style-type: none;
        }
    </style>
    <script src="./src/main.js"></script>
    </head>

    <body>
    <h1>Registro de productos en Marketzone</h1>

    <form id="formularioProducto" action="http://localhost/tecweb/practicas/p9/set_producto_v2.php" method="post">

    <h2>Información del Producto</h2>
        <fieldset>
        <legend>Llena los campos que estan a continuacion</legend>
        <ul>    
            <li><label for="form-name">Nombre:</label> <input type="text" name="nombre" id="form-name" value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : ''; ?>" onfocus="vaciar(this)" onblur="verificarNombre(this)"></li>

            
            <li><legend>Marca:</legend>
                <select title="marca" name="marca" id="form-marca" onBlur="verificarMarca(this)">
                <option value="" selected="selected">Selecciona una marca</option>
                <option value="MAC" <?= isset($_GET['marca']) && $_GET['marca'] == 'MAC' ? 'selected' : ''; ?>>MAC</option>
                <option value="Maybelline" <?= isset($_GET['marca']) && $_GET['marca'] == 'Maybelline' ? 'selected' : ''; ?>>Maybelline</option>
                <option value="Huda Beauty" <?= isset($_GET['marca']) && $_GET['marca'] == 'Huda Beauty' ? 'selected' : ''; ?>>Huda Beauty</option>
                <option value="Clinique" <?= isset($_GET['marca']) && $_GET['marca'] == 'Clinique' ? 'selected' : ''; ?>>Clinique</option>
                <option value="Dior Beauty" <?= isset($_GET['marca']) && $_GET['marca'] == 'Dior Beauty' ? 'selected' : ''; ?>>Dior Beauty</option>
                <option value="LOreal" <?= isset($_GET['marca']) && $_GET['marca'] == 'LOreal' ? 'selected' : ''; ?>>L'Oreal</option>
                <option value="Revlon" <?= isset($_GET['marca']) && $_GET['marca'] == 'Revlon' ? 'selected' : ''; ?>>Revlon</option>
                <option value="Anastasia Beverlly Hills" <?= isset($_GET['marca']) && $_GET['marca'] == 'Anastasia Beverlly Hills' ? 'selected' : ''; ?>>Anastasia Beverlly Hills</option>
                <option value="Nars" <?= isset($_GET['marca']) && $_GET['marca'] == 'Nars' ? 'selected' : ''; ?>>Nars</option>
                </select>
            </li>

            <li><label for="form-modelo">Modelo:</label><input type="text" name="modelo" id="form-modelo" value="<?= isset($_GET['modelo']) ? htmlspecialchars($_GET['modelo']) : ''; ?>" onfocus="vaciar(this)" onblur="verificarModelo(this)">
            </li>

            <li><label for="form-precio">Precio:</label> <input type="number" name="precio" id="form-precio" step="0.01" min="0" value="<?= isset($_GET['precio']) ? htmlspecialchars($_GET['precio']) : ''; ?>" onfocus="vaciar(this)" onblur="verificarPrecio(this)"></li>

            <li><label for="form-detalles">Detalles:</label><br>
            <textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="No más de 250 caracteres de longitud" onfocus="vaciar(this)" onblur="verificarDetalles(this)"><?= isset($_GET['detalles']) ? htmlspecialchars($_GET['detalles']) : ''; ?></textarea></li>

            <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" id="form-unidades" value="<?= isset($_GET['unidades']) ? htmlspecialchars($_GET['unidades']) : ''; ?>" onfocus="vaciar(this)" onblur="verificarUnidades(this)"></li>

            <li><label for="form-img">Imagen:</label>
            <input type="text" name="img" id="form-img" onfocus="vaciar(this)" onblur="verificarImg(this)"
            value="<?= isset($_GET['img']) ? htmlspecialchars(parse_url($_GET['img'], PHP_URL_PATH)) : ''; ?>">
            </li>
        </ul>
        </fieldset>

        <p>
        <input type="submit" value="Modificar" />
        <input type="reset">
        </p>

    </form>
    </body>
</html>