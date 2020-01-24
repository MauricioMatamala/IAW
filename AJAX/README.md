# AJAX

Tal y como W3Schools afirma, AJAX es un sueño para los programadores, porque:
- Actualiza una página sin tener volver a cargarla
- Solicita datos del servidor, después de que la página se haya cargado
- Recibe datos desde el servidor, después de que la página se haya cargado
- Se comunica con el servidor en segundo plano

## Enviando una solicitud al servidor mediante AJAX

### 1. Inicialización de la solicitud HTTP
```
var xhrequest = new XMLHttpRequest();
xhrequest.open('GET', 'send-ajax-data.php');
```
### 2. Definición de la función *callback*

Antes de realizar la solicitud, hay que decile al objeto XMLHttpRequest qué debe hacer cuando llegue la respuesta. Esto se hace mediante la propiead *onreadystatechange*.

```
xhrequest.onreadystatechange = nombreFuncionCallback
```
La función *nombreFuncionCallback* contendrá un código como el siguiente:
```
if (xhrequest.readyState == 4 && xhrequest.status == "200") {
    // HACER ALGO CON LOS DATOS RECIBIDOS: xhrequest.responseText
} else {
	// HUBO UN ERROR
}
```
El atributo *readyState* puede tener diferentes valores, dependiendo del estado de la conexión. La siguiente tabla lo muestra:

| Value |	State	            |   Description |
|-------|-----------------------|----------------|
|0	    |  UNSENT	            |   An XMLHttpRequest object has been created, but the open() method hasn't been called yet (i.e. request not initialized).|
|1	    |  OPENED	            |   The open() method has been called (i.e. server connection established).|
|2	    |  HEADERS_RECEIVED	    |   The send() method has been called (i.e. server has received the request).|
|3	    |  LOADING	            |   The server is processing the request.|
|4	    |  DONE	                |   The request has been processed and the response is ready.|

Por otra parte, el atributo *status* hace referencia al código de estado de la cabecera HTTP recibida desde el servidor: [Descripción de estados HTTP en mozilla.org](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status)

### 3. Envío de la solicitud

```
xhrequest.send();

```
-----------------------------

**Actividad 1.** Una página permite consultar vehículos en un depósito de embargos. Los vehículos pueden ser:
- Coches
- Barcos
- Motocicletas
El proceso funciona en dos pasos. En un primer formulario, se consultan todos los vehículos de un cierto tipo, mostrando una lista de número de identificación. En el segundo formulario se consultan los datos del vehículo a partir su número de identificación. 

Los datos asociados a un vehículo son similares a los siguientes:
- Tipo: coche
- Nº de id: X33F132A-Z
- Propietario: Juan José Antúnez
- DNI: 55667788C
- Estado: embargado

La página podría tener un aspecto como el siguiente:

![activivdad1-ajax.png](img/actividad1-ajax.png)

NOTA: Los estados posibles son "embargado", "pendiente de subasta" y "vendido"

Utiliza AJAX para resolver el problema. 


### 4. Objetos en JavaScript

JavaScript incluye diferentes notaciones para crear clases y objetos:

#### 4.1 Creación clásica de objetos mediante funciones

```
function Book (type, author) {
    this.type = type;
    this.author = author;
    this.getDetails = function () {
        return this.type + " written by " + this.author;
    }
}

var book = new Book("Fiction", "Peter King");
alert(book.getDetails());

```

Se pueden usar prototipos para ahorrar memoria, de manera que no se vuelva a declarar la función cada vez que se crea un nuevo objeto.

```
function Book (type, author) {
    this.type = type;
    this.author = author;
    this.prototype.getDetails = function () {
        return this.type + " written by " + this.author;
    }
}

var book = new Book("Fiction", "Peter King");
alert(book.getDetails());

```

#### 4.2 Creación de objetos mediante JSON (JavaScript Object Notation)

```
var circle = {
    radius : 10,
    area : function() { 
       return Math.PI * this.radius * this.radius; 
    }
};
alert(circle.area());
alert(typeof circle.area);
```

#### 4.3 Creación de objetos con declaración de clase
```
 class Car {
  constructor(brand) {
    this.carname = brand;
  }

  present() {
    return "I have a " + this.carname;
  }
}

mycar = new Car("Ford");
document.getElementById("demo").innerHTML = mycar.present();

```

### 5. Para enviar información mediante AJAX por POST se puede utilizar la notación JSON. En el servidor se recibirá un array asociativo con los campos definidos en el objeto de javascript.

```
var jsonEnviado = {valor1: "valor1", valor2: 2}

var xhrequest = new XMLHttpRequest();
xhrequest.open("POST", url, true);
xhrequest.setRequestHeader('Content-type','application/json; charset=utf-8');

xhrequest.onreadystatechange = function () {
	if (xhrequest.readyState == 4 && xhrequest.status == "200") {
	    var JSONrecibido = JSON.parse(xhrequest.responseText);	// El servidor también puede devolver un objeto JSON
        // ... hacer algo con el objeto recibido
	} else {
		console.log("Se produjo un error de comunicación");
	}
}

xhrequest.send(jsonEnviado)
```

### 6. Recogida en PHP de un objeto JSON enviado por POST en una solicitud AJAX
```
    $data = file_get_contents('php://input');
    $data = json_decode($data,true); // $data contiene un array asociativo.
```

### 7. Envío de un objeto JSON desde PHP
```
    header("Content-Type: application/json");
    $json = json_encode($data);
    echo $json
```
----------
**Actividad 2.** Escribe una pequeña aplicación web que calcule equivalencias entre centímetros y pulgadas. En una página html se mostrará una entrada de texto y un par de botones de radio que incluirán los textos "De cm a pulgadas" y "De pulgadas a cm". Además, hay un botón que activa el envío mediante AJAX de los valores del formulario al servidor. En el servidor se reciben los datos y se calcula la equivalencia y la resupuesta es enviada de vuelta a la página html, donde se mostrará el resultado mediante un cadena de texto del tipo:
"3 cm son 1.1811 pulgadas"

**Actividad 3.** Escribe a realizar la actividad 1, pero usando en este caso el método POST, y objetos de JavaScript.

**Actividad 4.** Escribe una aplicación para planificar los enfrentamientos entre un conjunto de equipos. El procedimiento es el siguiente:

1. Se introducen los equipos que se deseen. Estos equipos van apareciendo en la página conforme se van añadiendo. 
2. Cada equipo introducido es registrado en una base de datos.
3. Junto a cada equipo se ofrece la posibilidad de eliminar uno de ellos. Si se elimina un equipo en la parte cliente, ésto debe quedar reflejado en la base de datos de la parte servidor.
4. En la página hay un botón, llamado "diseñar enfrentamientos". Cuando se haga clic sobre él, debe realizarse una petición al servidor, que planificará los enfrentamientos. Cuando éstos hayan sido diseñados, se devolverá a la parte cliente en forma de JSON, donde se mostrarán los resultados.