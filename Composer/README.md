# Composer

Composer es un gestor de dependencias en proyectos PHP. Usando Composer nos evitamos muchas tareas rutinarias y tediosas relacionadas con las dependencias de nuestro proyecto, actualizaciones de las dependencias, y de las dependencias de las dependencias.
Instalación

La documentación sobre la instalación, la podemos encontrar aquí [https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## Indicar las dependencias

La documentación sobre el uso básico de Composer está en [https://getcomposer.org/doc/01-basic-usage.md#basic-usage](https://getcomposer.org/doc/01-basic-usage.md#basic-usage)

Para utilizar Composer, debemos utilizar un archivo llamado composer.json en la raíz del proyecto. Dicho archivo tendrá una apariencia como la siguiente:

```
{
    "require": {
        "kint-php/kint": "3.3"
    }
}
```	

La cláusula require permite indicar los proyectos que se instalarán, así como las restricciones sobre las versiones. Ver [https://getcomposer.org/doc/01-basic-usage.md#the-require-key](https://getcomposer.org/doc/01-basic-usage.md#the-require-key)

Existen diferentes formas de especificar restricciones sobre los paquetes que se instalarán. Ver [https://getcomposer.org/doc/01-basic-usage.md#package-versions](https://getcomposer.org/doc/01-basic-usage.md#package-versions)

## Instalar las dependencias

Una vez que hemos configurado el archivo composer.json, ejecutamos:

```
composer install
```

Quizá instalamos Composer localmente, En tal caso, debemos usar el comando siguiente (descrito en [https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies](https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies))

```
php composer.phar install
```

## Usando una librería instalada

Si hemos instalado la dependencia del ejemplo anterior, ya podemos usar la librería *kint*. En [https://packagist.org/packages/kint-php/kint#3.3](https://packagist.org/packages/kint-php/kint#3.3) hay algunas indicaciones para su uso.

Por ejemplo, el siguiente script haría uso de *kint*:

```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Es necesario importar las librerías instaladas por composer.
        require './vendor/autoload.php';

        $miArray = Array('Tema 1' => "Introducción", 'Tema 2' => 'Continación', 'Tema final' => 'Conclusión');
        
        Kint::dump($miArray);
        Kint::trace();
        ?>
    </body>
</html>
```

## Librerías de desarrollo

En ocasiones necesitamos instalar librerías que no serán necesarias en la versión en producción, como por ejemplo PHPUnit. Para estos casos, podemos añadir una sección require-dev en el archivo composer.json. Por ejemplo:

```
{
	"require": {
		"pint-php/kint": "3.3"
	}
	"require-dev": {
    	"phpunit/phpunit": "9.0.0"
  	}
}
```

Si acabamos de añadir una nueva sección require-dev entonces tendremos que actualizar utilizando el comando siguiente:

```
composer update
```

Cuando más adelante queramos instalar las librerías en la versión de producción, ejecutaremos el comando de Composer siguiente:

```
composer install --no-dev
```

Para conocer más opciones de instalación de dependencias de Composer, podemos mirar en [https://getcomposer.org/doc/03-cli.md#install](https://getcomposer.org/doc/03-cli.md#install)

## Autoload

Composer también puede facilitarnos la carga de nuestro propio código, y así evitarnos tener que estás haciendo "requires" manualmente o crear nuestro propio "autoloader". Esta característica queda recogida en [https://getcomposer.org/doc/01-basic-usage.md#autoloading](https://getcomposer.org/doc/01-basic-usage.md#autoloading).

Supongamos que nuestro proyecto incluye una clase llamada Persona, en el archivo *src/Persona.php* con el siguiente código:

```
namespace aprendocomposer\modelo;

class Persona {
    //put your code here
    private $nombre;
    private $apellido;
    
    function __construct($nombre,$apellido) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    
    function getNombre(){
        return $this->nombre;
    }
    
    function getApellido(){
        return $this->apellido;
    }
    
}
```

Para entender cómo utilizar los espacios de nombres, podemos consultar en [http://codehero.co/php-desde-cero-namespaces/](http://codehero.co/php-desde-cero-namespaces/)

Si quisiera hacer uso de esta clase en la página principal, *index.php*, tendría que hacer algo como lo siguiente:

```
<?php
require 'src/Persona.php';

$persona = new Persona("Juan","Pérez");

echo "Conozco a ".$persona->getNombre()." ".$persona->getApellido();
```

No tiene nada de malo hacer un require. Lo malo es cuando nuestro proyecto empieza a crecer, y necesitamos importar muchos archivos. Es algo que puede llevarnos a errores, olvidos, etc.

Composer puede facilitarnos la vida, añadiendo una sección autoload a "composer.json":

```
"autoload": {
        "psr-4": {"aprendocomposer\\modelo\\":"src/"}
    }
```

PSR-4 es una especificación para la autocarga de clases. Queda descrita en http://www.php-fig.org/psr/psr-4/ y en https://getcomposer.org/doc/04-schema.md#psr-4. A grandes rasgos, indica que una clase debería tener un nombre completamente cualificado, siguiendo la estructura siguiente:
```
\NamespaceName\(SubNamespaceName\)*ClassName
```

En el archivo "composer.json", indicamos en la sección autoload lo siguiente:

- El espacio de nombres. En el ejemplo anterior, el espacio de nombre aprendocomposer\modelo quedaba declarado con la cadena "aprendocomposer\\modelo\\". Es importante la barra del final.
- La ruta donde Composer buscará los elementos declarados en el espacio de nombres. En este caso, "src/" indica que se buscará a partir del directorio raíz del proyecto, en la carpeta "src".

Teniendo esta declaración, el código del espacio de nombres "aprendocomposer\modelo" se podrá importar con una línea como la siguiente:

```
require 'vendor/autoload.php';
```

## Generar archivos de autoload

Para generar los archivos de *autoload*, debemos ejecutar el comando siguiente:

```
composer dump-autoload
```

Existen mas formas de hacer autocarga de nuestro código:

- *Classmap*: Carga de clases indicando la ruta de los archivos. Ver en [https://getcomposer.org/doc/04-schema.md#classmap](https://getcomposer.org/doc/04-schema.md#classmap)
- *Files*: Carga de código php a partir de archivos concretos. Ver en [https://getcomposer.org/doc/04-schema.md#files](https://getcomposer.org/doc/04-schema.md#files)

En el ejemplo anterior, la sección autoload quedaría del siguiente modo:
```
"autoload": {
    "classmap": ["src/modelo/"]
}
```

O bien

```
"autoload": {
    "files": ["src/modelo/Persona.php"]
}
```

## Eliminar librerías

Basta con borrarlas en "composer.json" y ejecutar composer update.

-------------------------------------------------
**Actividad 1.** Infórmate sobre la librería monolog. Puedes consultar el apéndice final sobre esta librería.

```
https://packagist.org/packages/monolog/monolog

```

Utiliza el proyecto que creaste en el tema anterior, para realizar una conversión de unidades. Después, utiliza Composer para instalar la librería Monolog, y utiliza https://www.loggly.com/ para registrar los logs generados.

Puedes consultar en [https://www.loggly.com/docs/php-monolog/](https://www.loggly.com/docs/php-monolog/)

Toma una captura donde se pueda ver que se están generando los logs. Asegúrate de enviar un mensaje similar a este: "Conversión realizada: 4cm -> 1,57 pulgadas". Guarda la captura con el nombre Act1-Composer.png

-------------------------------------------------
**Actividad 2.** Partiendo del proyecto que creaste en el tema anterior (conversor de unidades), realiza los siguientes apartados:
1. Configura Composer para que se cargue automáticamente la clase donde realizas la conversión.
2. Asegúrate de que para usar la clase donde se hace la conversión estás utilizando el gestor de cargas de Composer en lugar de importar el archivo directamente.

Entrega un archivo llamado Act2-composer.zip con el siguiente contenido:
- El código fuente de tu proyecto
- Una captura donde se pueda ver el log generado.

--------------------------------------------------

# Apéndice. Monolog

Generar logs puede ser muy útil durante el desarrollo de una aplicación, o depurando errores de una ya existente. A continuación se muestran algunas de las cosas que se pueden hacer con la librería *Monolog*

## Estructura de los registros de mensajes

[2019-05-15 15:49:48] main.INFO: First message [] []
- [2019-05-15 15:49:48] : fecha
- main : canal
- INFO : nivel de severidad del mensaja
- First message : mesnaje de texto
- context : contexto, información adicional sobre el punto en que se produce el mensaje
- extra : información adicional, de carácter general, sobre el mensaje

## Niveles de severidad

- DEBUG: información de depuración (nivel más bajo)
- INFO: eventos de interés
- NOTICE: eventos normales (no de error), pero destacables
- WARNING: eventos excepcionales que no son errores
- ERROR: errores de ejecución que no requieren un acción inmediata
- CRITICAL: condiciones críticas.
- ALERT: eventos que deben ser atendidos de inmediato.
- EMERGENCY: emergencias.

Cuando se registra un mensaje, se indica el nivel de severidad. Si el manejador definido para los logs especifica un nivel inferior de severidad, el mensaje será registrado. En otro caso, se descartará.

## Declaración de un Logger y un manejador

```
require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main'); 
    // el canal definido es main. Vale cualquier cadena de texto.

$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG)); 
    // La declaración del manejador indica:
    // 1. el archivo donde se escribirá
    // 2. el nivel de severidad (DEBUG)

$logger->info('First message');
    // Mensaje de severidad INFO.
```

## Información de contexto

La información de contexto indica cosas como el lugar donde se emite el log u otra información general. Se añade como segundo parámetro en el comando de logueo.

```
$logger->info('Information message', ['ubicacion' => 'clase y método actuales']);
```
El log correspondiente será:

```
[2019-05-15 17:24:48] main.INFO: Information message [] {"ubicacion":"clase y método actuales"}
```
## Información extra

La información extra se debe incluir en un *custom processor*. Se trata de información general que no depende del contexto.

```
<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main');
$logger->pushHandler(new StreamHandler(__DIR__.'/logs/app.log'));

$logger->pushProcessor(function ($record) {
    $record['extra']['user'] = get_current_user();

    return $record;
});

$logger->info('Information message');
```
El log correpondiente sería
```
[2019-05-15 17:24:48] main.INFO: Information message [] {"user":"Jano"}
```
Se pueden encadenar procesadores.

## Publicar logs en formato JSON

```
<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main');

$stream = new StreamHandler(__DIR__ . '/logs/app-json.log');
$stream->setFormatter(new JsonFormatter());

$logger->pushHandler($stream, Logger::DEBUG);

$logger->info('Information message', ['user' => get_current_user()]);
```

