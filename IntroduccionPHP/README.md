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



