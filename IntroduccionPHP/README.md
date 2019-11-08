# [PHPStorm](https://www.jetbrains.com/phpstorm/promo/?gclid=EAIaIQobChMIor3O_afi5AIVDPlRCh3srgvXEAAYASAAEgJj8PD_BwE)

*PhpStorm* es un IDE de *JetBrains*. Para poderlo usar es preciso pagar una licencia, obien solicitar una [licencia de estudiante](https://www.jetbrains.com/shop/eform/students).

## Instalar PhpStorm

Existen diferentes mecanismos de instalación. En [Install PhpStorm](https://www.jetbrains.com/help/phpstorm/installation-guide.html) se detallan los diferentes procedimientos.

## Preparar el entorno de desarrollo

Localmente dispondremos de un servidor web **AMP*, donde podremos comprobar el código de la aplicación. Además, *PhpStorm* permite integrar el servidor *AMP*:

- [Configurar el intérprete de PHP en *PhpStorm*](https://www.jetbrains.com/help/phpstorm/configuring-local-interpreter.html)

- [Configurar una base de datos MySQL en *PhpStorm*](https://www.jetbrains.com/help/phpstorm/connecting-to-a-database.html#mysql)

Para poder llevar a cabo este apartado, debemos primero crear una base dados en *MySQL*. Una propuesta podría ser:

- Base de datos: *MiCMS*
- Usuario de la base de datos: *micmsadmin*

> Según parece, *PhpStorm* sufre un problema de conexión cuando usa ciertas versiones del *driver JDBC*. Este problema está documentado en la [página de soporte de *JetBrains*](https://youtrack.jetbrains.com/issue/DBE-7727). Como solución temporal, se recomienda asignar la configuración *UTC* a la propiedad *serverTimezone*.

Una vez conectados a la base de datos podemos actuar sobre ella desde *PhpStorm*. Para más información, consultar [*Database tools and SQL*](https://www.jetbrains.com/help/phpstorm/relational-databases.html)


## Desplegar una aplicación

Se puede desplegar una aplicación en más de un servidor. Hay [varias configuraciones](https://www.jetbrains.com/help/phpstorm/deployment-in-phpstorm.html#config):

- [In-place](https://www.jetbrains.com/help/phpstorm/creating-in-place-server-configuration.html)
- [Local or mounted folder](https://www.jetbrains.com/help/phpstorm/creating-local-server-configuration.html)
- [Remote server](https://www.jetbrains.com/help/phpstorm/creating-a-remote-server-configuration.html)


**Actividad 1.** Configura un entorno de desarrollo *PhpStorm* que permita desplegar el código tanto localmente como en un servidor remoto en producción. Una vez configurado, crea una página PHP sencilla y comprueba que puedes abrirla tanto localmente como en el servidor remoto.

# PHP

    <?php
    echo "Hello world";
    ?>

## Comentarios
Ver [documentación de referencia](https://www.w3schools.com/php/php_comments.asp

## Variables
Ver [documentación de referencia](https://www.w3schools.com/php/php_variables.asp)

## Cadenas de texto
Ver [documentación de referencia](https://www.w3schools.com/php/php_string.asp)

## Variables numéricas
Ver [documentación de referencia](https://www.w3schools.com/php/php_numbers.asp)

## Arrays
Ver [documentación de referencia](https://www.w3schools.com/php/php_arrays.asp)

## Arrays asociativos
Ver [documentación de referencia](https://www.w3schools.com/php/php_arrays.asp)

## Multidimensional arrays
Ver [documentación de referencia](https://www.w3schools.com/php/php_arrays_multi.asp)

## is_array

    echo (is_array($fred)) ? "Is an array" : "Is not an array";

## count

    echo count($fred);
    echo count($fred, 1); // 1 -> cuenta recursivamente todos los elementos de los subarrays

## sort
Ver [documentación de referencia](https://www.w3schools.com/php/php_arrays_sort.asp)


## explode
Ver [documentación de referencia](https://www.w3schools.com/php/func_string_explode.asp)

## compact
Ver [documentación de referencia](https://www.w3schools.com/php/func_array_compact.asp)

## Operadores
Ver [documentación de referencia](https://www.w3schools.com/php/php_operators.asp)

### Aritméticos
+ - * / % ++ -- ** += -= 

### De comparación

== != > < <= >= <> === !==

### Lógicos

&& || ! 

and or  (shortcut)

### Concatenación

. .=

## Caracteres de escape
Ver [documentación de referencia](https://www.php.net/manual/es/regexp.reference.escape.php)
Ver [documentación de referencia](https://www.homeandlearn.co.uk/php/php7p7.html)

## Cadenas de texto de varias líneas

"

    // Cadena de texto de varias líneas

";

<<<_FIN

    // Cadena de texto de varias líneas.

_FIN

## PHP es débilmente tipado
Ver [documentación de referencia](https://www.w3schools.com/php/php_datatypes.asp)

## Constantes
Ver [documentación de referencia](https://www.w3schools.com/php/php_constants.asp)

### Constantes predefinidas
Ver [documentación de referencia](https://www.if-not-true-then-false.com/2010/howto-use-php-magic-constants-file-dir-function-class-method-line-namespace/)

## echo vs print
Ver [documentación de referencia](https://www.w3schools.com/php/php_echo_print.asp)

## Variables superglobales
Ver [documentación de referencia](https://www.w3schools.com/php/php_superglobals.asp)

## if
Ver [documentación de referencia](https://www.w3schools.com/php/php_if_else.asp)

## switch
Ver [documentación de referencia](https://www.w3schools.com/php/php_switch.asp)

## El operador ?
Ver [documentación de referencia](https://www.w3schools.com/php/php_operators.asp

## While
Ver [documentación de referencia](https://www.w3schools.com/php/php_looping.asp)

## do..while
Ver [documentación de referencia](https://www.w3schools.com/php/php_looping.asp)

## for
Ver [documentación de referencia](https://www.w3schools.com/php/php_looping_for.asp)

## foreach

## Break y continue
Ver [documentación de referencia](https://www.w3docs.com/learn-php/php-break-continue-and-goto.html)

## Funciones
Ver [documentación de referencia](https://www.w3schools.com/php/php_functions.asp)

## Ámbito de variables
Ver [documentación de referencia](http://docs.php.net/manual/es/language.variables.scope.php)

## Variables globales

## Variables estáticas

## Devolviendo un resultado mediante variables globales

## Include
Ver [documentación de referencia](https://www.w3schools.com/php/php_includes.asp)

## Require

## Clases
Ver [documentación de referencia](https://www.tutorialrepublic.com/php-tutorial/php-classes-and-objects.php)

## Visibilidad

## Métodos estáticos

## Atributos estáticos

## Herencia

## parent

## Manejo de formularios
Ver [documentación de referencia](https://www.w3schools.com/php/php_forms.asp)

## Validación de formularios
Ver [documentación de referencia](https://www.w3schools.com/php/php_form_validation.asp)

## Campos obligatorios de un formulario
Ver [documentación de referencia](https://www.w3schools.com/php/php_form_required.asp)

## Validar email y URLs
Ver [documentación de referencia](https://www.w3schools.com/php/php_form_url_email.asp)

## Bases de datos

### Conexión
Ver [documentación de referencia](https://www.w3schools.com/php/php_mysql_connect.asp)

### Insertar datos
Ver [documentación de referencia](https://www.w3schools.com/php/php_mysql_insert.asp)

### Leer datos
Ver [documentación de referencia](https://www.w3schools.com/php/php_mysql_select.asp)

### Borrar datos
Ver [documentación de referencia](https://www.w3schools.com/php/php_mysql_delete.asp)

### Update data
Ver [documentación de referencia](https://www.w3schools.com/php/php_mysql_update.asp)

## Clases
Ver [documentación de referencia](https://www.tutorialrepublic.com/php-tutorial/php-classes-and-objects.php)

## Constantes en una clase
Ver [documentación de referencia](https://www.w3schools.com/php/php_oop_constants.asp)

## Métodos estáticos
Ver [documentación de referencia](https://www.w3schools.com/php/php_oop_static_methods.asp)

## Atributos estáticos
Ver [documentación de referencia](https://www.w3schools.com/php/php_oop_static_properties.asp)

## Visibilidad
- *public* puede verse en cualquier parte.
- *protected* solo puede referenciarse desde la clase y desde las subclases.
- *private* solo puede referenciars desde la misma clase.


## Herencia
Ver [documentación de referencia](https://www.w3schools.com/php/php_oop_inheritance.asp)

## parent
Ver [documentación de referencia](http://docs.php.net/manual/da/keyword.parent.php)


**Actividad 1.** Los comerciales Isabel Castillo y Vicente Calzado han realizado las siguientes ventas (en unidades) durante esta semana:

Isabel: 7, 7, 10, 6, 4 Vicente: 4, 7, 5, 4, 5

Estos datos están dentro de un array bidimensional. Se necesita un programa que muestre por pantalla una tabla html con las ventas con el siguiente aspecto

| Vendedor | L | M | X  | J | V |
| ---------| --|---|----|---|--:|
| Isabel   | 7 | 7 | 10 | 6 | 4 |
| Vicente  | 4 | 7 | 5  | 4 | 5 |

**Actividad 2.** Además de Isabel y Vicente, contamos con los datos de las ventas de Manuel Alcántara (3,5,6,1,2), Pedro J. Ramírez (2,7,9,2,1) y Ana María Matute (6,1,2,8,5). Calcula el total semanal de ventas para cada uno, y muestra por pantalla una tabla similar a la anterior, que también muestre una columna más, con las ventas totales.

| Vendedor | L | M | X  | J | V |Total
| ---------| --|---|----|---|--:|------
| Isabel   | 7 | 7 | 10 | 6 | 4 |34
| Vicente  | 4 | 7 | 5  | 4 | 5 |25
| Manuel   | 3 | 5 | 6  | 1 | 2 |17
| Pedro J. | 2 | 7 | 9  | 2 | 1 |21
| Ana      | 6 | 1 | 2  | 8 | 5 |22

**Actividad 3.** Consulta en https://www.php.net/manual/es/array.sorting.php y busca la forma de que la tabla anterior se muestre ordenada por total vendido.

**Actividad 4.** Reescribe el ejercicio 3, empleando sentencias iterativas.

**Actividad 5.** Escribe un programa que pueda almacenar diferentes tipo de figuras geométricas: círculos, triángulos y cuadrados. Todas las figuras tienen un color, y tienen una manera particular de obtener el área. Escribe un programa que contenga un array de figuras geométricas. Deberás recorrer el array e imprimir para cada figura el tipo de figura de que se trata, su color y su área.

**Actividad 6.** Reescribe el ejercicio 2 utilizando orientación a objetos. Define primero la clase *Vendedor*, y después la clase *Tabla*. 

La clase *Vendedor* incluye un array llamado *ventas* que almacena las ventas de cada día de la semana. Además, incluye los siguientes métodos.
- *getVentasLunes()* - Devuelve el contenido de la primera posición del array *ventas*.
- *getVentasMartes()* - Devuelve el contenido de la segunda posición del array *ventas*.
- *getVentasMiercoles()* - Devuelve el contenido de la tercera posición del array *ventas*.
- *getVentasJueves()* - Devuelve el contenido de la cuarta posición del array *ventas*.
- *getVentasViernes()* - Devuelve el contenido de la quinta posición del array *ventas*.
- *getTotalVentas()* - Devuelve la suma total de las ventas durante la semana.

La clase Tabla incluye un array de *vendedores* así como los siguientes métodos:
- *getCabecera()* - Devuelve la cabecera html de la tabla. Es decir, una cadena de texto del tipo "<tr><th>Vendedor</th><th>L</th>..."
- *getFila($i)* - devuelve la fila número *$i*, con los datos del vendedor. 
> Recuerda que en el array *vendedores* hay objetos de tipo vendedor, con toda la información que necesitas.
- *getNumeroDeFilas()* - devuelve el tamaño del array *vendedores*.

Utilizando estas clases, obtén por pantalla una tabla como la de la actividad 2.

**Actividad 7.** Revisa el ejercicio 6, utilizando una base de datos como motor de persistencia. Es decir, los datos han sido previamente insertados en una base datos, son leídos desde ella y mostrados por pantalla partiendo del código de la actividad 6. 

**Actividad 8.** Se cuenta con una base de datos que contiene una tabla de noticias que contiene un título, un contenido y un autor. Escribe los siguientes componentes:
- Crea una página llamada *insertar_noticias.php* con un formulario para insertar nuevas noticias. Los datos deben ser enviados con el método *POST*. 
- Escribe una clase llamada *Noticia* para almacenar la información de una noticia. La clase debe contar, además de los campos necesarios para almacenar una noticia, los *getters* y *setters* necesarios y un método llamado *insert* que almacene la información en la base de datos. Esta clase debe estar en un archivo llamado *noticia_model.php*
- Escribe un archivo llamado *noticia_controller.php* que se encargue de tomar los datos del formulario, instanciar la clase *Noticia* y almacenarla en la base de datos a través de dicha clase.

**Actividad 9 (opcional).** Partiendo del ejercicio anterior, crea una página llamada *mostrar_noticias.php*, que muestre las noticias almacenadas en la base de datos. La forma de organizar el código debe ser el siguiente:
- Crea una clase llamada *NoticiasModel*, almacenada en el archivo *noticias_model.php* que cuenta con los siguientes elementos:
    - Un array de noticias llamado *noticias*. 
    - Un método llamado *select* que obtiene las noticias almacenadas en la base de datos y las almacena en el array *noticias*. 
    - Un método llamado *numeroDeNoticias* que devuelve el número total de noticias almacenadas en el array.
    - Un método llamado *getNext* que devuelve la siguiente noticia. La primera vez que se ejecuta, devuelve la primera noticia, y cada vez que se vuelve a ejecutar, se devuelve la siguiente, hasta que no queden más, en cuyo caso devuelve *null*
    - Un método llamado *hasNext* que devuelve verdadero o falso dependiendo de si se han devuelto o no todas las noticias.
    - Un método *reset* que reestablece el índice de consulta al principio.
- Debes utilizar el archivo *noticias_controller.php* que se encargue de cargar los datos en una instancia de la clase *Noticias*, y después importe el archivo *mostrar_noticias.php*, que se encarga de mostrar las noticias.
