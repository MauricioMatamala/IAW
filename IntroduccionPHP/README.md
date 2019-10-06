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