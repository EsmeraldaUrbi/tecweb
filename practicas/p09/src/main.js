function vaciar(control)
{
    control.value = '';
}

function verificarNombre(control) 
{
    var nombre = document.getElementById('form-name').value;

    if(nombre === ''){
        alert('Debes introducir un nombre');
    }
    if(nombre.length > 100){
        alert('El nombre solo debe contener como maximo 100 caracteres');
    }
}

function verificarMarca() 
{
    var marca = document.getElementById('form-marca').value;

    if(marca === '')
    {
        alert('Debes seleccionar un marca');
    }
}

function verificarModelo()
{
    var modelo = document.getElementById('form-modelo').value;

    if(modelo === '')
    {
        alert('Debes introducir un modelo');
    }

    if(modelo.length > 25)
    {
        alert('El modelo debe contener como maximo 25 caracteres');
    }

    var alfanumerico = /^[a-zA-Z0-9\s]*$/;
    if (!alfanumerico.test(modelo))
    {
        alert('Solo puedes introducir numeros o letras');
    }
}

function verificarPrecio()
{
    var precio = document.getElementById('form-precio').value;

    if(precio == '')
    {
        alert('Debes introducir el precio del producto');
        return;
    }

    precio = parseFloat(precio);
    if(precio <= 99.99)
    {
        alert('El precio debe ser mayor que $99.99');
    }
}

function verificarDetalles()
{
    var detalles = document.getElementById('form-detalles').value;

    if(detalles.length > 250)
    {
        alert('Los detalles deben contener como maximo 250 caracteres')
    }
}

function verificarUnidades()
{
    var unidades = document.getElementById('form-unidades').value;

    if(unidades == '')
    { 
        alert('Debes insertar el numero de unidades')
        return;
    }

    unidades = parseInt(unidades);
    if(unidades < 0)
    {
        alert('El numero de unidades no puede ser negativo');
    }
}

function verificarImg()
{
    var img = document.getElementById('form-img').value;
    var imgPredeterminada = './src/img/img_predeterminada.jpg';
    if(img == '')
    {
        document.getElementById('form-img').value = imgPredeterminada;
    }

}

