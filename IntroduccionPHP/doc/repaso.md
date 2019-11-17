# Actividades de repaso de PHP

**1.** Escribe programa que meta 10 números en un array. Después, recorrer el array, mostrando el resultado de elevar al cuadrado cada número.
- Hazlo con la instrucción *for*
- Hazlo con la instrucción *foreach*

-----

**2.** Escribe un array asociativo que almacene la siguiente información:
- 20 coches Ford vendidos.
- 100 coches Seat vendidos.
- 5 coches Mercedes vendidos.
- 1 coche Tesla vendidos.
Después muestra por pantalla el contenido de dicho array mediante frases como:
```
    <p>Se han vendido un totoal de 20 coches de marca Ford</p>
```
Utiliza un bucle *foreach*.

-----    

**3.** Un array contiene los siguientes registros de temperaturas, donde cada posición del array representa una hora. Los números incluidos en el array son:

14, 15, 15, 17, 23, 24, 25, 26,25,24,23,25,21,19,18,17,15,12,11,9,5,2,-1, -2

Escribe una función llamada *informeTemperaturasExtremas* a la que se le pasa el array y muestre por pantalla un informe con las horas a las que la temperatura salió del rango normal de temperaturas: [10 .. 20]. El resultado debe ser algo similar a lo siguiente:

```
<h1>Informe de temperaturas extremas</h1>
<ul>
    <li>A las 5 horas la temperatura fue de 23ºC</li>
    <li>A las 6 horas la temperatura fue de 24ºC</li>
    ....
</ul>
```

----

**4.** Escribe un archivo llamado "formulario.php" con el código necesario para poder enviar desde un formulario información hacia una base de datos. En el archivo "insertar.php", escribe el código para insertar los datos en la tabla correspondiente. Dicha información hará referencia a los datos de una persona: *nombre, dirección, correo electrónico* y *edad*. 

----

**5.** Escribe un archivo llamado "consultar.php" que contenga el código que necesites para consultar desde la base datos la información contenida en tabla modificada en la actividad 4. La información debe presentarse con un formato similar al siguiente:

```
<h1>Listado de personas</h1>
<ul>
    <li>Juan García, vive en C/Rue 13 del percebe, Málaga, tiene 27 años y su correo es juangarcia@hotmail.com</li>
    .....
</ul>
```
----

**6.** Vuelve a hacer el ejercicio anterior, pero utilizando una clase llamada "Persona" en el fichero "persona_model.php" que contenga los siguientes atributos:

- $nombre
- $direccion
- $edad
- $email

y los siguientes métodos:

- constructor($dbConn,$nombre=null,$direccion=null,$edad=null,$email=null)
    
- setNombre($nombre)
- getNombre()
- setDireccion($nombre)
- getDireccion()
- setEMail($email)
- getEMail()
- setEdad($edad)
- getEdad()
    
- insertar() -> inserta los datos almacenados en los atributos de la clase.
- selectPersonaByName($nombre) -> recupera los datos de una persona cuyo nombre coincida con el parámetro $nombre, y asigna su valor a los atributos $nombre, $direccion, $edad y $email.

Tanto la inserción como la extracción de datos de la base de datos se realiza desde esta clase.
    
    
