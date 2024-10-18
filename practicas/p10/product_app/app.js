// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
    };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20paraescuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    if (!verificarFormulario()) {
        return; // Si alguna validación falla, se detiene el proceso
    }


    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            if (client.readyState == 4) {
                // Si la solicitud es exitosa
                if (client.status == 200) {
                    var response = JSON.parse(client.responseText);
                    alert(response.message); // Mostrar el mensaje (éxito o error)
                } else {
                    // Si hay un error en la solicitud (código diferente de 200)
                    alert("Error en la solicitud: " + client.statusText);
                }
            }
        }
    };
    client.send(productoJsonString);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar Producto"
function buscarProducto(e) {
    e.preventDefault();

    // SE OBTIENE EL TÉRMINO DE BÚSQUEDA (ID, NOMBRE, MARCA O DETALLES)
    var datoBusqueda = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n' + client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);

            // SE LIMPIA EL CONTENIDO ANTERIOR
            document.getElementById("productos").innerHTML = '';

            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if (productos.length > 0) {
                // RECORREMOS LA LISTA DE PRODUCTOS
                productos.forEach(function(producto) {
                    // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    let descripcion = '';
                        descripcion += '<li>Precio: ' + producto.precio + '</li>';
                        descripcion += '<li>Unidades: ' + producto.unidades + '</li>';
                        descripcion += '<li>Modelo: ' + producto.modelo + '</li>';
                        descripcion += '<li>Marca: ' + producto.marca + '</li>';
                        descripcion += '<li>Detalles: ' + producto.detalles + '</li>';

                    // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';
                        template += `
                            <tr>
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                            </tr>
                        `;

                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    document.getElementById("productos").innerHTML += template;
                });
            } else {
                // SI NO HAY RESULTADOS, SE MUESTRA UN MENSAJE
                document.getElementById("productos").innerHTML = '<tr><td colspan="3">No se encontraron productos.</td></tr>';
            }
        }
    };

    // ENVÍA LA SOLICITUD AL SERVIDOR
    client.send("datoBusqueda=" + encodeURIComponent(datoBusqueda));
}

function verificarFormulario() {
    if (!verificarNombre()) return false;
    if (!verificarMarca()) return false;
    if (!verificarModelo()) return false;
    if (!verificarPrecio()) return false;
    if (!verificarDetalles()) return false;
    if (!verificarUnidades()) return false;
    if (!verificarImg()) return false;

    return true; // Si todo está bien, devuelve true
}

// VALIDACIONES INDIVIDUALES
function verificarNombre() 
{
    var nombre = document.getElementById('name').value;

    if (nombre === '') {
        alert('Debes introducir un nombre');
        return false;
    }
    if (nombre.length > 100) {
        alert('El nombre solo debe contener como máximo 100 caracteres');
        return false;
    }
    return true;
}

function verificarMarca() 
{
    var productoJsonString = document.getElementById('description').value;
    var finalJSON = JSON.parse(productoJsonString);
    var marca = finalJSON.marca;

    if (marca === '') {
        alert('Debes seleccionar una marca');
        return false;
    }
    return true;
}

function verificarModelo() 
{
    var productoJsonString = document.getElementById('description').value;
    var finalJSON = JSON.parse(productoJsonString);
    var modelo = finalJSON.modelo;

    if (modelo === '') {
        alert('Debes introducir un modelo');
        return false;
    }
    if (modelo.length > 25) {
        alert('El modelo debe contener como máximo 25 caracteres');
        return false;
    }

    var alfanumerico = /^[a-zA-Z0-9\s]*$/;
    if (!alfanumerico.test(modelo)) {
        alert('Solo puedes introducir números o letras en el modelo');
        return false;
    }
    return true;
}

function verificarPrecio() 
{
    var productoJsonString = document.getElementById('description').value;
    var finalJSON = JSON.parse(productoJsonString);
    var precio = finalJSON.precio;

    if (precio === '') {
        alert('Debes introducir el precio del producto');
        return false;
    }

    precio = parseFloat(precio);
    if (precio <= 99.99) {
        alert('El precio debe ser mayor que $99.99');
        return false;
    }
    return true;
}

function verificarDetalles() 
{
    var productoJsonString = document.getElementById('description').value;
    var finalJSON = JSON.parse(productoJsonString);
    var detalles = finalJSON.detalles;

    if (detalles.length > 250) {
        alert('Los detalles deben contener como máximo 250 caracteres');
        return false;
    }
    return true;
}

function verificarUnidades() 
{
    var productoJsonString = document.getElementById('description').value;
    var finalJSON = JSON.parse(productoJsonString);
    var unidades = finalJSON.unidades;

    if (unidades === '') {
        alert('Debes insertar el número de unidades');
        return false;
    }

    unidades = parseInt(unidades);
    if (unidades < 0) {
        alert('El número de unidades no puede ser negativo');
        return false;
    }
    return true;
}

function verificarImg() 
{
    var productoJsonString = document.getElementById('description').value;
    var finalJSON = JSON.parse(productoJsonString);
    var img = finalJSON.imagen;
    var imgPredeterminada = './src/img/img_predeterminada.jpg';

    if (img === '') {
        finalJSON.imagen = imgPredeterminada;
        document.getElementById('description').value = JSON.stringify(finalJSON, null, 2);
    }
    return true;
}