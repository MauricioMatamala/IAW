# PHPUnit

Se trata de una suite de pruebas. Se utiliza para comprobar que una parte del código funciona como debe. Una vez escrita una prueba, se puede volver a ejecutar tantas veces como se quiera, por lo que ayuda en la construcción del software a largo plazo.

## Instalar PHPUnit

PHPUnit es un framework utilizado para escribir tests en PHP. Podemos instalarlo de dos maneras diferentes:
Instar PHPUnit mediante Composer

Podemos utilizar Composer para instalar la última versión de PHPUnit. Es importante que PHPUnit sea un requisito de desarrollo, para que PHPUnit no se despliegue en el sistema en producción. El archivo composer.json correspondiente podría ser algo como lo siguiente:

```
{
    "require-dev":{
        "phpunit/phpunit":">=5.1.3-stable"
    }
}
```

Instalando mediante Composer, obtendremos PHPUnit como una dependencia del proyecto.

Para comprobar que todo ha ido bien, debemos ejecutar el siguiente comando dentro de la carpeta del proyecto:

vendor/bin/phpunit --version

## PHPUnit en un único archivo

PHPUnit también se puede instalar como un único archivo, que incluye todas sus dependencias. Para instalar dicho archivo, debemos seguir las instrucciones que se dan en https://packagist.org/packages/phpunit/phpunit

Para comprobar que todo ha ido bien, basta con ejecutar el siguiente comando:

```
phpunit --version
``` 

## Un primer ejemplo

Vamos a trabajar con un primer ejemplo. La estructura de nuestro proyecto es la siguiente:

```
aprendophpunit/index.php
aprendophpunit/modelo/Salario.php
composer.json
vendor/
```

Supongamos que el código que queremos probar, en la clase Salario (Salario.php), es el siguiente:

```
namespace aprendophpunit\modelo;
class Salario {
    public function incrementoSalario($salarioActual){
        return $salarioActual+$salarioActual*2/100;
    }
    
    public function retencionSalario($salarioBruto){
        return $salarioBruto*22/100;
    }
}
```

Para probar que todo es correcto, vamos en primer lugar a probar la clase en index.php. El contenido de index.php podría ser el siguiente:

```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require "vendor/autoload.php";
        use aprendophpunit\modelo\Salario;
        $salario = new Salario();
        echo "El aumento de salario es ".$salario->incrementoSalario(2000);
        ?>
    </body>
</html>
```

Veremos que esto falla, porque aún no hemos incluido la clase Salario en el autoload de Composer. Podemos modificar composer.json para que quede como en el siguiente ejemplo:

```
{
    "require-dev":{
        "phpunit/phpunit":">=5.1.3-stable"
    },
    "autoload":{
        "psr-4":{
            "aprendophpunit\\modelo\\":"modelo/"
        }
    }
}
```

Después de esto, actualizamos Composer como la opción dump-autoload. Después de esto debería funcionar nuestro pequeño proyecto.
Ubicación y nombre de los tests

Es importante la estructura de directorios que damos a nuestros tests. Lo ideal es que siguan una estructura similar a la que sigue el código probado, de esta forma podemos identificar claramente qué componente prueba un cierto test. De modo que si tenemos los siguientes archivos:

```
aprendophpunit/modelo/Salario.php
aprendophpunit/modelo/Controlador/Foo.php
```

Los archivos de test, podrían estructurarse del siguiente modo:

```
aprendophpunit/Test/modelo/SalarioTest.php
aprendophpunit/Test/modelo/Controlador/FooTest.php
Un primer test unitario
```

Vamos a crear un test para salario. Su contenido será el siguiente:

```
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalarioTest
 *
 * @author mauri
 */
/*
namespace aprendophpunit\Test\modelo;
require 'vendor/autoload.php';  // Esto es necesario para poder acceder a Salario.

use aprendophpunit\modelo\Salario;
class SalarioTest extends \PHPUnit_Framework_TestCase{
    
    
    public function testSalarioDevuelveIncremento20porciento(){
        $incremento20 = 2000*2/100;
        $salario = new Salario();
        $salarioObtenido = $salario->incrementoSalario(2000);
        $salarioEsperado = 2000 + $incremento20;
        $this->assertEquals($salarioEsperado,$salarioObtenido,"Los salarios son iguales.");
    }
    
    
    public function testRetencionSalario22porciento(){
        $retencionEsperada = 2000*22/100;
        $salario = new Salario();
        $retencionObtenida = $salario->retencionSalario(2000);
        $this->assertEquals($retencionEsperada,$retencionObtenida);
    }
}
```

En el ejemplo anterior podemos observar varias cuestiones:

### El nombre del caso de prueba

Un caso de prueba es una clase que agrupa un conjunto de pruebas unitarias. El nombre del caso de prueba (o test case) es igual que la clase que estamos probando, con la palabra TestCase al final.

```
PHPUnit_Framework_TestCase
```

Un caso de prueba hereda de la clase PHPUnit_Framework_TestCase

### Nombre de los tests unitarios

Los nombres de los tests unitarios son largos y descriptivos. Empiezan por la palabra "test", seguidos en notación camelCase de la descripción del test.
Ejecutar una suite de tests

Al conjunto de casos de prueba, se le llama siute de tests. Para poder ejecutar los tests, es preciso crear un archivo llamado phpunit.xml en la raíz del proyecto. El contenido será similar al siguiente:

```
<?xml version="1.0" encoding="UTF-8"?>
<phpunit colors="true">
    <testsuites>
        <testsuite name="Application Test Suite">
            <directory>./Test/</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

Lo que hacemos en este archivo es:

- Indicar que se utilicen colores para indicar si el test ha sido positivo o negativo (verde/rojo).
- Indicar la ruta donde se encuentran los tests

Para ejecutar los tests, abrimos una terminal, y nos vamos hasta la raíz del proyecto. Allí ejecutamos el comando siguiente:

```
vendor/bin/phpunit
```

El resultado debería ser algo como lo siguiente:

![](docs/ejecutar_phpunit.png)

## PHPUnit se integra con los IDE. PHPUnit en PHPStorm

Los entornos IDE se integran con PHPUnit de diferente manera según el entorno. En PHPStorm el framework se especifica en *File\Settings\Languages & Frameworks\PHP\Test Frameworks*. En este apartado se puede especificar la ubicación de *PHPUnit* de dos maneras:
- Utilizando *Composer* indicando la ruta del archivo *autoload.php*.
- Indicando la ruta al archivo *phpunit.phar* descargado directamente desde el sitio web del proyecto *PHPUnit*.

------------------------------

# Actividades con PHPUnit

Crea un proyecto de conversión de medidas similar al que creaste en el tema anterior. Sin embargo ahora deberás poner a prueba su funcionamiento, incluyen los casos límite. Las pruebas que debes realizar son las siguientes.:

    1 inch = 0,3937 cm
    12 inch = 4,7244 cm
    12 cm = 30,48 inc
    0 cm = 0 inch
    0,5 cm = 0,1968 inch
    Límite superior 40 inch: 41 inch = ERROR
    Límite superior 40 inch: 104 cm = ERROR
    Límite superior 100 cm: 101 cm = ERROR


