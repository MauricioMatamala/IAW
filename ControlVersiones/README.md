# Git

Git es un software de control de versiones. Resulta muy difícil trabajar en la actualidad sin usar control de versiones.

Para este tema introductorio a Git, vamos a utilizar el libro de Pro Git escrito por Scott Chacon y Ben Straub

## Introducción al control de versiones

- [Acerca del control de versiones](https://git-scm.com/book/es/v1/Empezando-Acerca-del-control-de-versiones)
- [Una breve historia de Git](https://git-scm.com/book/es/v1/Empezando-Una-breve-historia-de-Git)
- [Fundamentos de Git](https://git-scm.com/book/es/v1/Empezando-Fundamentos-de-Git)

## Instalación y configuración inicial de Git

- [Instalación de Git](https://git-scm.com/book/es/v1/Empezando-Instalando-Git)
- [Configuración inicial de Git](https://git-scm.com/book/es/v1/Empezando-Configurando-Git-por-primera-vez)
- [Ayuda de Git](https://git-scm.com/book/es/v1/Empezando-Obteniendo-ayuda)

## Actividades básicas de Git

- [Crear un nuevo repositorio](https://git-scm.com/book/es/v1/Fundamentos-de-Git-Obteniendo-un-repositorio-Git)
- [Guardar cambios en un repositorio](https://git-scm.com/book/es/v1/Fundamentos-de-Git-Guardando-cambios-en-el-repositorio)
- [Ver el histórico de confirmaciones](https://git-scm.com/book/es/v1/Fundamentos-de-Git-Viendo-el-hist%C3%B3rico-de-confirmaciones)
- [Eliminar archivos](http://www.politecnico-ed.es/ED/git.html#eliminar_archivos)
- [Mover archivos](http://www.politecnico-ed.es/ED/git.html#mover_archivos)
- [Deshacer cosas](https://git-scm.com/book/es/v1/Fundamentos-de-Git-Deshaciendo-cosas)
- [Creación de etiquetas](https://git-scm.com/book/es/v1/Fundamentos-de-Git-Creando-etiquetas)
- [Consejos y trucos](https://git-scm.com/book/es/v1/Fundamentos-de-Git-Consejos-y-trucos)

# Eliminar archivos

Borrar archivos con Git requiere ciertas consideraciones. ¿Deseamos borrar el archivo del directorio y del repositorio? ¿Deseamos borrar el archivo solamente del repositorio?
Borrar un archivo del proyecto y del repositorio

El borrado completo del repositorio se puede hacer de dos maneras:

- Opción a) Borrar usando Git

```
git rm nombre_archivo		
```
- Opción b) Borrar primero el archivo del proyecto y luego con Git

```
rm nombre_archivo
git add nombre_archivo
```
Para hacer efectivos los cambios, debemos hacer un *commit*. 

### Borrar un archivo solamente del repositorio

Supongamos que olvidamos meter un archivo en .gitignore, por ejemplo. Entonces haremos lo siguiente:

```
git rm --cached nombre_archivo
```
	
### Mover archivos

Supongamos que ya hemos hecho git add, pero queremos renombrar un cierto archivo. Entonces podemos renombrar el archivo de dos maneras:

- Método 1. Renombrar el archivo en el directorio y en el repositorio.
```
    git mv nombre_original nombre_nuevo
``` 		

- Método 2. Cambiar por separado el archivo en el directorio y en el repositorio
```
    mv nombre_original nombre_nuevo
    git rm nombre_original
    git add nombre_nuevo
``` 		

## Ramificaciones

Para este tema, vamos a seguir los siguientes enlaces:

- [Introducción al concepto de rama](https://git-scm.com/book/es/v2/Ramificaciones-en-Git-%C2%BFQu%C3%A9-es-una-rama%3F)
- [Ramificaciones en Git - Procedimientos Básicos para Ramificar y Fusionar](https://git-scm.com/book/es/v2/Ramificaciones-en-Git-Procedimientos-B%C3%A1sicos-para-Ramificar-y-Fusionar)
- [Consultas sobre ramas](https://git-scm.com/book/es/v2/Ramificaciones-en-Git-Gesti%C3%B3n-de-Ramas)

Hay mucho más que tratar sobre Git, ramas y entornos distribuidos. Pero eso lo vamos a dejar para el capítulo de GitHub y flujos de trabajo.

## Reorganizaciones

Git permite realizar reorganizaciones entre ramas. El resultado es similar a realizar fusiones, aunque la estructura de ramas resultante es más sencilla. Si no queremos mantener la estructura de las ramas, es una alternativa interesante. Un ejemplo. Supongamos que tenemos la siguiente estructura de confirmaciones:

```
C1 --> C2 --> C3 (master)
		\---> C4 --> C5 (rama_x)
```

Ahora, vamos a hacer una reorganización:

```
$ git checkout rama_x
$ git rebase master
```

El resultado es similar a hacer una fusión. Pero en este caso, la primera confirmación de la rama rama_x termina apuntando a la rama master:

```
C1 --> C2 --> C3 (master) --> C4' --> C5' (rama_x) 
```

Una vez hecho el rebase, fusionamos la rama master con la rama rama_x.

```
$ git checkout master
$ git merge rama_x
```

Con lo que el árbol de confirmaciones queda como sigue:

```
C1 --> C2 --> C3 --> C4' --> C5' (rama_x, master)
```

Finalmente, podemos eliminar la rama "rama_x" sin perder ninguna confirmación:

```
$ git branch -d rama_x
```

Quedando el árbol de confirmaciones así:

```
C1 --> C2 --> C3 --> C4' --> C5' (master)
```

> Hay un caso en que no debemos hacer reorganizaciones. Nunca se debe reorganizar sobre cambios que ya han sido confirmados en un repositorio remoto. Podemos encontrar más información sobre este tema en el apartado Los peligros de la reorganización en https://git-scm.com/book/es/v1/Ramificaciones-en-Git-Reorganizando-el-trabajo-realizado

##Otras reorganizaciones

Se pueden hacer otros tipos de reorganizaciones más específicas:

- Combinar varias confirmaciones en una sola
- Cambiar de base una subrama a otra
- Eliminar un commit intermedio
- Eliminar el último commit

## Combinar varias confirmaciones en una sola

Podemos combinar varios commits en uno solo. Por ejemplo, supongamos que tenemos el siguiente árbol de confirmaciones:

```
c1 --> c2 --> c3 --> c4 (master, HEAD)
```

Supongamos que queremos que c2, c3 y c4 aparezcan como una única confirmación. Entonces haremos lo siguiente:

```
$ git rebase -i HEAD~3
```

Donde en HEAD~n, n indica el número de confirmaciones que queremos unir. Cuando ejecutamos este comando, se nos abrirá un archivo donde aparecerán las acciones a llevar a cabo. Por ejemplo, para el ejercicio anterior, aparecerá algo como lo siguiente:

```
pick 7d50158 mensaje sobre cambios hechos en c2
pick 65c5d1a mensaje sobre cambios hechos en c3
pick 329f936 mensaje sobre cambios hechos en c4

[...]
```

Nosotros debermos cambiar el comando pick por squash cuando queramos que sea unido a otra confirmación. Por ejemplo, en el caso anterior, podríamos hacer:

```
pick 7d50158 mensaje sobre cambios hechos en c2
squash 65c5d1a mensaje sobre cambios hechos en c3
squash 329f936 mensaje sobre cambios hechos en c4

[...]
```

El árbol de confirmaciones resultante incluirá una confirmación c2' con todos los cambios de c2, c3 y c4:

```
c1 --> c2' (master, HEAD)
```

## Cambiar una subrama de base a otra subrama

Supongamos que tenemos el siguiente árbol de confirmaciones:

```
A -- B -- C -- D -- E (master)
	 \ -- F -- G -- H (topicA)
	  \			\-- I -- J -- K (topicB)
	   \--N -- O (topicC)
```

Y supongamos que queremos cambiar la rama "topicB" de base, para que derive de la rama "topicC". En tal caso, podemos usar el comando rebase del siguiente modo:

```
$ git rebase --onto topicC topicA topicB
```

Donde los parámetros son los siguientes:

- topicC nueva rama base
- topicA anterior rama base
- topicB rama a cambiar de base

El resultado será el siguiente árbol de confirmaciones:

```
A -- B -- C -- D -- E (master)
	 \ -- F -- G -- H (topicA)
	  \			
	   \--N -- O (topicC) -- I' -- J' -- K' (topicB)
```

Después, siempre podemos fusionar "topicC" y "topicB" si fuese necesario.

## Eliminar un commit intermedio

Supongamos que tenemos el siguiente árbol de confirmaciones:
```
A -- B -- C -- D -- E (master)
```

Y nos damos cuenta de que en el commit C cometimos un error que no queremos conservar. Para eliminar dicho commit, haremos lo siguiente:

```
$ git checkout master
$ git rebase --onto B HEAD~2
```

Donde HEAD~2 hace referencia al commit "D". En realidad estamos diciendo que ahora el commit "D" ahora apuntará a "B" en lugar de a "C", de modo que "C" se pierde.
Eliminar el último commit

Si lo que queremos es eliminar el último commit, tenemos dos alternativas: conservar o no conserar los cambios.

## Eliminar el último commit conservando los cambios

Si quiero eliminar el último commit pero quiero que los cambios se sigan manteniendo como cambios pendientes, debemos hacer lo siguiente:

```
$ git reset --soft HEAD~1
Eliminar el último commit descartando los cambios
```

Si quiero eliminar el último commit y no mantener ningún los cambios, entonces el comando a realizar es el siguiente:

```
$ git reset --hard HEAD~1
```

Actividad 1. Crea un repositorio local en una carpeta llamada Act1-git. Supongamos que el dueño de dicha carpeta se llama Juan. La historia de dicha carpeta es la siguiente:

1. Juan crea un archivo llamado README.md y escribe en su interior lo siguiente "Apuntes de IAW"
2. Hace una primera confirmación con el nombre "Inicio del proyecto"
3. Continúa agregando el archivo javascript.txt que contiene una línea con el texto "javascript es un lenguaje de cliente". También incluye un archivo llamado css.txt que contiene el texto "CSS permite añadir estilos a una página web".
4. Después hace otra confirmación más, con el nombre "Tecnologías del lado cliente"
5. Añade un archivo más, llamado php.txt que incluye el texto "PHP es un lenguaje interpretado en el lado del servidor". Además, crea una carpeta llamada *Ejemplos* donde crea un archivo llamado ejemplo.php de tipo "Hola mundo".
6. Después hace una confirmación con el texto "Lenguajes de programación web".
7. A Juan le han dicho que también tiene que crear un archivo llamado *CSS.txt* donde debe escribir el texto *CSS permite añadir estilos a una página web*. Pero como no está seguro, crea una rama llamada *temporal*. En dicha rama, creará el archivo.
8. Juan hace una fusión de la rama temporal con la rama master. La nueva confirmación se llamará "CSS añadido". Juan decide además etiquetar esta versión como la "0.0"

> Una vez que termines la actividad, dentro de la carpeta Act1-git ejecuta el siguiente comando:
```
history > history.txt
```	

Comprime el directorio en un archivo llamado Actividad_git.zip

