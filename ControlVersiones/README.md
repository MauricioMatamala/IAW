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

----------------------------------------------------------------------------------------

# GitHub

GitHub es un servicio de hosting para git. Está pensado para el trabajo colaborativo entre varios programadores.
Clonar un repositorio

Para clonar un repositorio nos basta con conocer su url. Por ejemplo, imaginemos que queremos descargar el proyecto https://github.com/chef/chef.git. En tal caso, solo es necesario que hagamos lo siguiente:

```
git clone https://github.com/chef/chef.git
```

## Crear una cuenta en GitHub

Necesitamos crearnos una cuenta en GitHub. Crear una cuenta en GitHub no tiene nada de particular. Especificamos nuestro correo electrónico y una contraseña.

Además, necesitamos al menos un repositorio donde subir nuestras fuentes.

Para subir el proyecto solo tenemos que hacer lo siguiente, para compartirlo con el resto del equipo:

```
git remote add origin git@github.com:fulanito/repositorio
```

## Crear un nuevo repositorio

Para crear un nuevo repositorio, podemos seguir la ayuda de GitHub en https://help.github.com/articles/create-a-repo/. Sólo hay un punto que aclarar, que es la opción "Intialize this repository with a README".

Tenemos dos maneras de crear un nuevo repositorio:

- Opción 1: Crear primero un nuevo repositorio en GitHub, seleccionando la opción "Initialize this repository with a README". Una vez creado, clonamos localmente el repositorio, añadimos los nuevos archivos y lo volvemos a subir.
- Opción 2: Crear un repositorio en GitHub, y NO seleccionar la opción "Initialize this repository with a README", lo que creará un repositorio vacío en GitHub. Inicializamos nuestro proyecto localmente como un repositorio Git, y después los subimos a GitHub.

Según ya tengamos un repositorio creado localmente o no, marcaremos la opción "Initialize this repository with a README". En nuestro caso, no vamos a marcarla, puesto que tenemos ya un repositorio creado localmente.

Una vez que creamos el repositorio, GitHub nos ofrece ayuda sobre qué hacer. En nuestro caso, vamos a suponer que ya tenemos hecho al menos un "commit" en nuestro respositorio local. Así que para subir a GitHub nuestro repositorio, hacemos lo siguiente:

```
$ git remote add origin git@github.com:cuenta_usuario/repositorio.git
$ git push origin master
```

Después de hacer esto, podremos ver algo como lo siguiente (si todo ha ido bien):

```
Counting objects: 15, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (11/11), done.
Writing objects: 100% (15/15), 2.15 KiB | 0 bytes/s, done.
Total 15 (delta 3), reused 0 (delta 0)
To git@github.com:cuenta_usuario/repositorio.git
 * [new branch]      master -> master
Branch master set up to track remote branch master from origin.
```

De hecho ya podemos ver nuestros archivos en el repositorio.

*origin* es el repositorio remoto, pero refiriéndolos al repositorio remoto. De este modo, podemos hablar de la rama *origin/master* para referirnos al último commit del repositorio remoto en la rama *master* que tenemos registrado en nuestro repositorio local. Por ejemplo, en el siguiente código podemos ver un repositorio en el que la rama master tiene ciertos cambios que origin/master no.

```
$ git log --oneline --decorate --graph --all
* cd78ae4 (HEAD, master) Añadiendo el archivo TODO
* f763def (origin/master, origin/HEAD) Initial commit
Comprobar nuestros repositorios remotos
```

Para poder ver qué repositorios remotos tenemos configurados, podemos ejecutar el siguiente comando:

```
git remote -v
```

## Confirmando las ramas de nuestro repositorio

Supongamos que tras clonar nuestro repositorio remoto, hemos hecho algunas modificaciones localmente. También vamos a suponer quen nadie ha modificado nada en el repositorio remoto. Ahora queremos subir los nuevos cambios. En este momento tenemos lo siguiente:

- En el repositorio remoto, la rama master sigue en el sitio donde lo descargamos
- En el repositorio local, la rama origin/master sigue apuntando al commit descargada.
- En el repositorio local, la rama master apunta al último commit realizado localmente

Para subir los nuevos cambios al repositorio remoto, haremos los siguiente:

```
$ git push origin nombre_rama
```

Supongamos que el árbol de nuestro repositorio y su contenido es el siguiente:

```
$ git log -p --decorate
commit cd78ae4904c0302d4a8253e5b0d869c8f93a4da8 (HEAD, master)
Author: Mauricio Matamala <mauriciomatamala@hotmail.com>
Date:   Wed Jan 13 14:11:23 2016 +0100

    Añadiendo el archivo TODO

diff --git a/TODO b/TODO
new file mode 100644
index 0000000..359a564
--- /dev/null
+++ b/TODO
@@ -0,0 +1,4 @@
+Actividades que quedan por hacer
+================================
+
+1. Actividad 1.

commit f763deff8c5e4863467cf863ef35bf027f126069 (origin/master, origin/HEAD)
Author: mmatpein <mmatpein@users.noreply.github.com>
Date:   Tue Jan 12 18:57:11 2016 +0100

    Initial commit

diff --git a/README.md b/README.md
new file mode 100644
index 0000000..ddc9403
--- /dev/null
+++ b/README.md
@@ -0,0 +1 @@
+# clase_github
```

Ahora supongamos que quiero hacer una propuesta de una idea en una rama nueva, para que el resto de componentes del equipo puedan verla. Para ello, creo primero una nueva rama.

```
$ git branch idea_feliz
$ git checkout idea_feliz
```

Hago las modificaciones precisas, y luego subo la nueva rama.

```
$ git push git@github.com:mmatpein/clase_github.git idea_feliz
```

Si compruebo el estado del repositorio en GitHub, podré ver que hay una nueva rama llamada "idea_feliz"

# Actualizaciones de colaboradores en el repositorio

Supongamos un usuario colaborador descarga nuestro repositorio, realiza una modificación en la rama "master" y vuelve a subir el repositorio a GitHub. De forma que nosotros queremos actualizar la rama "origin/master". Entonces usaremos el siguiente comando:

```
$ git fecth origin
```

Con este comando obtenemos la rama "origin/master" así como el resto de ramas del repositorio. Pero "origin/master" todavía no coincide con "master". Para que esta rama sea también nuestra rama "master", tendremos que fusionar:

```
$ git merge origin/master
```

En este momento nuestro repositorio "master" ya coincide con "origin/master"

El comando *git pull origin* es una forma abreviada de hacer:

```
$ git fetch origin
$ git merge origin
```

# Fusionando ramas en github

Supongamos que tenemos la rama "idea_feliz" sin fusionar en GitHub. Hemos hablado y estamos de acuerdo en que podemos fusionarla con la rama "master". Si queremos fusionar estas dos ramas, podemos hacerlo desde GitHub, o bien utilizando Git en nuestro repositorio local y luego subiendo los cambios. Los pasos a seguir son:

### Paso 0: Asegurarnos de que tenemos la última versión de origin

```
$ git fetch origin
$ git merge origin
```

### Paso 1: Fusionar la rama "idea_feliz" con "master".

```
$ git checkout master
$ git merge idea_feliz
```

### Paso 2: Subir los cambios

```
$ git push origin master
```

Hecho esto, podremos ver en GitHub cómo se han fusionado los cambios, indicando la etiqueta "Merged" en la rama "idea_feliz".
Flujo de trabajo en proyectos con GitHub

En Git (y en GitHub) existe mucha libertad en la forma de trabajar. Por eso mismo, cuando el trabajo es entre varias personas, es necesario ponerse de acuerdo en cómo se va a utilizar. A estos acuerdos es a lo que llamamos workflow.

Existe más de un workflow, aunque los más aceptados son git-flow y github-flow.

# Git-Flow

Podemos consultar sobre *GitFlow* en [A successful git branching model](http://nvie.com/posts/a-successful-git-branching-model)/. A grandes rasgos, el *workflow* propuesto por Vincent Driessen dice lo siguiente:

- Cada desarrollador descarga y sube confirmaciones a un repositorio "origin", pero detrás de este modelo centralizado, se pueden formar subequipos que trabajen sobre ciertas ramas concretas, dejando a un lado las otras.
- Las ramas principales son master y develop.
    - origin/master contiene solamente versiones estables.
    - origin/develop contiene versiones con los últimos cambios añadidos. De esta rama saldrán las versiones estables. Cuando el código en esta rama alcanza un punto estable que puede ser liberada, llega el momento de fusionar con la rama origin/master y etiquetado correctamente.

- La rama master contiene únicamente versiones de producción, ya que solo se fusiona con origin/develop cuando el commit se hace para una versión estable.
- Las ramas adicionales tiene tiempos de vida limitados, y su objetivo será hacer cosas como desarrollo coordinado entre varios miembros del equipo, fácil seguimiento del desarrollo de características concretas, preparar versiones de producción, solución rápida a problemas del software de producción, etc. Diferenciamos entre los siguientes tipos de ramas:
    - Ramas feature: derivan de la rama develop y se vuelven a fusionar con ella. Tienen nombres del tipo feature-nombre_de_la_caracerística. Estas ramas suelen existir únicamente en el repositorio del programador.
    - Ramas release: derivan de la rama develop y se fusiona con develop o con master. Tienen nombres del tipo release-nombre_de_la_versión. Esta rama se utiliza para preparar un versión de producción. Se crean cuando la rama develop está CASI a punto. Permiten hacer cosas como:
        - Ultimar detalles de última hora
        - Resolver bugs menores
        - Asignar números de versión. Hasta este momento la rama release no deja claro si estamos hablando de la versión 0.3 o la versión 1.0.
    - Ramas hotfix: derivan de la rama master y se fusionan con develop o con master. Tienen nombres como hotfix-nombre_de_la_revisión. Este tipo de ramas se crean cuando hay un problema crítico que hay que resolver inmediatamente en una versión de producción. Se crea la rama para este problema crítico, mientras el resto del equipo sigue trabajando por otro lado. Cuando se cierra una rama hotfix es importante fusionar con la rama master y con la rama develop para que la siguiente versión de desarrollo incluya esta revisión (si no, volveríamos en el futuro a tener el mismo problema crítico al liberar la versión de desarrollo).

> Es importante recordar que cuando está abierta una rama release, la rama hotfix debe ser fusionada con la rama release.

# GitHub flow

El modelo propuesto por GitHut para GitHub puede consultarse en [https://guides.github.com/introduction/flow/](https://guides.github.com/introduction/flow/). A grandes rasgos, propone lo siguiente:

- Cualquier cosa en la rama master es siempre desplegable en producción. Por eso, las ramas de trabajo deben derivarse de ésta.
- Cuando se crea una nueva rama, avanzar por ella creando nuevos commits. Es importante cuidar los "commit messages", para que los demás sepan qué estamos haciendo.
- Crear un pull request cuando queramos recibir feedback del resto del equipo. Lo podemos hacer en cualquier momento durante la existencia de la rama.
- Una vez que se ha creado el pull request, podemos seguir creando commits conforme la conversación va avanzando.
- Cuando el pull request ha dado lugar a un commit que pasa todos nuestros tests, podemos desplegar los cambios para comprobarlos en producción. Si la rama crea problemas, siempre podemos volver a desplegar la rama master
- Una vez que hemos visto que el commit de nuestra rama es estable (ya que no ha dado problemas en producción), podemos fusionar con la rama master. Cada pull request conserva un histórico que permite entender que se hizo en su momento.

---------------------------------------------------------------------
**Actividad 1.** Crea un grupo con otras dos personas. Uno de vosotros gestionará la rama *develop*, *release* y *master*

- Cada componente creará una nueva rama *feature*, donde creará varios commits con cambios sencillos (como añadir un nuevo archivo, por ejemplo).
- Cada componente creará un pull request una vez que su rama *feature* esté lista para fusionar con la rama develop
- El responsable de las ramas *develop*, *release* y *master* realizará las fusiones de las ramas *feature* con la rama *develop*
- Una vez que la rama *develop* se haya fusionado con las diferentes ramas *feature*, deberá aplicarse el flujo de trabajo *git-flow*, de forma que se utilizarán las ramas *release* y *master* para liberar la primera versión (v0.0) del proyecto.
- En la rama release añade cualquier cambio menor, simulando cambios de última hora.
- El objetivo de este ejercicio es poder ver que los diferentes repositorios locales contienen información coherente con lo que contiene el repositorio en GitHub. Entrega la actividad en un archivo llamado Act1-github.zip, donde se debe incluir lo siguiente:
    - Un archivo de texto con el nombre del repositorio.
    - Una captura llamada <nombre_repositorio>_grafo.png con el resultado de ejecutar el comando git log --graph --all --oneline --decorate en tu repositorio local una vez que hayas terminado el ejercicio
    - La misma captura obtenida por tus otros compañeros.

-----------------------------------------------------------------------
**Actividad 2.** Continua con el ejercicio anterior. Cada componente debe crear un parche de seguridad (hacer algún cambio sobre uno de los archivos) y seguir el modelo de GitFlow propuesto. Se debe partir de la última versión de master, y crear una nueva versión a cada corrección.
