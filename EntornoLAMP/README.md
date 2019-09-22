 
# TEMA 1. Preparar un entorno LAMP

Las siglas LAMP responden a **L**inux, **A**pache, **M**ariaDB/MySQL y **P**HP/Python/Perl

Usaremos como sistema operativo Ubuntu Server, por ser el [más usado](https://w3techs.com/technologies/details/os-linux/all/all) de entre las distribuciones de Linux como servidor web.

## [Reconfigurar interfaces de red](https://www.ostechnix.com/how-to-configure-ip-address-in-ubuntu-18-04-lts/)

	$ cp /etc/netplan/50-cloud-init.yaml /etc/netplan/50-cloud-init.yaml.bak
	

![Imagen de archivo en formato Yaml](https://www.ostechnix.com/wp-content/uploads/2018/11/configure-static-ip-1024x537.png)

	$ sudo netplan apply
	$ ip addr show

## Instalar apache

### Actualizar los repositorios
	$ sudo apt update
	$ sudo apt upgrade
	
### Instalar Apache
	$ sudo apt install apache2
	$ sudo systemctl status apache2

### Configurar el firewall para permitir a Apache

Si  hemos habilitado el [firewall de Ubuntu](docs/firewall.md)

	$ sudo ufw app list
		Available applications
		Apache
		Apache Full
		Apache Secure
		OpenSSH
		
	$ sudo ufw allow in "Apache Full"

## MySQL

Instalar MySQL en Ubuntu

	$ sudo apt install mysql-server
	
Comprobar su estado

	$ sudo systemctl status mysql
	
### Constraseña de root

Por defecto 'root' de MySQL no tiene contraseña. Para asegurar el servidor MySQL instalamos [mysql_secure_installation](https://dev.mysql.com/doc/refman/5.7/en/mysql-secure-installation.html):
	
	$ sudo mysql_secure_installation
		
Se nos pregunta si queremos configurar el plugin *VALIDATE PASSWORD* . Si lo activamos, comprobará las contraseñas simpre. Si no lo activamos debemos vigilar que las contraseñas sean buenas. El resto de opciones son adecuadas.

Por defecto, se autentica al usuario root MySQL con el plugin auth_socket a partir de MySQL 5.7. Esto es más seguro, pero complica el acceso a aplicaciones externas. Solución: cambiar *auth_socket* por *mysql_native_password*:

	$ sudo mysql
	
	SELECT user,authentication_string,plugin,host FROM mysql.user;
	
	ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
		
	FLUSH PRIVILEGES;

Para comprobar, otra vez:

	SELECT user,authentication_string,plugin,host FROM mysql.user;
	
## PHP

	$ sudo apt install php libapache2-mod-php php-mysql
	
Crear un archivo *info.php*

	<?php
		phpinfo();
	?>
	
Reiniciar Apache

	$ sudo systemctl restart apache2
	
Comprobar el archivo *info.php*

### Modificar la precedencia de extensiones para archivos *index*

	ARCHIVO: /etc/apache2/mods-enabled/dir.conf
	
	<IfModule mod_dir.c>
	DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm
	</IfModule>

	# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
	-----------
	PASA A SER:
	-----------
	
	<IfModule mod_dir.c>
	DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
	</IfModule>

	# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
		
Para aplicar la configuración, reiniciamos Apache

	$ sudo systemctl restart apache2

## Instralar módulos PHP adicionales

Listado de módulos disponibles

	$ sudo apt-cache search php- | less
	
Encontrar detalles sobre un paquete

	$ sudo apt install php-gd
	
Instalar todos los módulos php
	
	$ sudo apt-get install php*
	
# PhpMyAdmin con LAMP

Ojo -> Hay que cambiar el modo de autenticación.

	$ sudo apt-add-repository universe
	
	$ sudo apt update
	
Instalamos módulos que utiliza phpmyadmin
	
	$ sudo apt install phpmyadmin php-mbstring php-gettext
	
![instalación 1](https://www.ostechnix.com/wp-content/uploads/2019/02/phpmyadmin-1.png)
![instalación 2](https://www.ostechnix.com/wp-content/uploads/2019/02/phpmyadmin-2.png)
![instalación 3](https://www.ostechnix.com/wp-content/uploads/2019/02/phpmyadmin-3.png)
![instalación 4](https://www.ostechnix.com/wp-content/uploads/2019/02/phpmyadmin-4.png)
![instalación 5](https://www.ostechnix.com/wp-content/uploads/2019/02/phpmyadmin-5.png)

mbstring permite trabajar con múltiples codificaciones en PHP. Si no lo instalamos, podemos obtener [errores](https://stackoverflow.com/questions/18599406/phpmyadmin-mbstring-error/36981831)

	$ sudo phpenmod mbstring
	
	
	$ sudo systemctl restart apache2
	
Se puede verificar si la extensión está activada en el archivo *phpinfo.php*

![Comprobar mbstring](https://www.ostechnix.com/wp-content/uploads/2019/02/php-mbstring.png)
	
# Crear usuarios dedicados para acceder a phpMyAdmin

	$ mysql -u root -p
	
	CREATE USER 'phpmyadminuser'@'localhost' IDENTIFIED BY 'password';
	GRANT ALL PRIVILEGES ON *.* TO 'phpmyadminuser'@'localhost' WITH GRANT OPTION;
	
	exit

*NOTA: Un usuario  nuevo se puede crear desde phpMyAdmin también.*

Accedemos a http://ip-address/phpmyadmin
Podemos usar el usuario  *root* o bien el recién creado *phpmyadminuser*

![Páginaprincipal de phpmyadmin](https://www.ostechnix.com/wp-content/uploads/2019/02/phpmyadmin-8.png)
	
## Protección de phpMyAdmin
		
### .htaccess
1- Activar el uso de .htaccess en  */etc/apache2/conf-available/phpmyadmin.conf*

```
	<Directory /usr/share/phpmyadmin>
	Options SymLinksIfOwnerMatch
	DirectoryIndex index.php
	AllowOverride All     #añadimos esta opción

	[...]
```
2- Reiniciamos apache
3- Creamos el archivo */usr/share/phpmyadmin/.htaccess* con el contenido:

	AuthType Basic
	AuthName "Restricted Files"
	AuthUserFile /etc/phpmyadmin/.htpasswd
	Require valid-user

4- Creamos un nuevo usuario:
	
	$ sudo htpasswd -c /etc/phpmyadmin/.htpasswd nombreUsuario
	
![Contraseña con htaccess](https://www.ostechnix.com/wp-content/uploads/2019/02/phpmyadmin-10-1024x334.png)

**Actividad 1.** Prepara un entorno LAMP similar al expuesto en una máquina virtual con Ubuntu Server.

**Actividad 2.** Crea un usuario llamado *MiCMS_user* que tenga permisos para realizar operaciones *CRUD* sobre la base de datos *MiCMS*

**Actividad 3.** Realiza las siguientes tareas utilizando phpMyAdmin:

- Crea una base de datos utilizando *phpMyAdmin* que se llame *MiCMS*. 
- Dentro, crea una tabla llamada 'Tareas' con los campos siguientes:
	- **id**, entero, clave primaria y auto-incremental
	- **nombre**, cadena de texto de 20 caracteres no nula
	- **descripción**, cadena de texto de 100 caracteres
- Inserta algunas filas de la tabla
	
**Actividad 4.** phpMyAdmin muestra un warning (*Warning in ./libraries/sql.lib.php#613 count(): Parameter must be an array or an object that implements Countable*) cuando se accede al contenido de una tabla. Encuentra el motivo del problema y soluciónalo.

[Ajustes adicionales de Apache](docs/Ajustes_Apache.md)

# Vsftp

Necesitaremos un servicio de transferencia de archivos, que utilizará el desarrollador para subir sus archivos.

## Instalación

    sudo apt-get update
    sudo apt-get install vsftpd

Cuando la instalación esté completa, haremos una copia de seguridad del archivo de configuración inicial.

    sudo cp /etc/vsftpd.conf /etc/vsftpd.conf.orig

## Apertura del firewall

    sudo ufw allow 20/tcp
    sudo ufw allow 21/tcp
    sudo ufw allow 990/tcp
    sudo ufw allow 40000:50000/tcp

Para comprobar que todo está bien, escribiremos:

    sudo ufw status

## Directorio del usuario

El directorio donde el usuario *ftp* subirá sus archivos debe coincidir con el directorio del *virtualhost*. Dicho directorio puede estar donde deseemos. Podemos usar el comando *adduser* o el comando *useradd*.

Utilizamos un directorio llamado *ftp* sin permisos de escritura a modo de jaula *chroot*

    sudo mkdir /home/usuario/ftp
    sudo chown nobody:nogroup /home/usuario/ftp
    sudo chmod 555 /home/usuario/ftp

El directorio *files* (que puede llamarse de otra forma) será el destinado a subir archivos por *ftp*

    sudo mkdir /home/usuario/ftp/files
    sudo chown usuario:usuario /home/usuario/ftp/files

## Configuración del acceso

	sudo nano /etc/vsftpd.conf

Desactivamos usuarios anónimos

	anonymous_enable=NO

Permitimos a los usuarios locales conectarnos

	local_enable=YES

Damos permiso de escritura a los usuarios

	write_enable=YES	

Para enjaular a los usuarios en su cuenta y evitar que puedan acceder a otras partes del sistema de archivos del servidor, hacemos lo siguiente:

	chroot_local_user=YES

Añadimos *user_sub_token* para declarar el directorio del usuario creado y de cualquier otro que se cree en lo sucesivo.

	user_sub_token=$USER
	local_root=/home/$USER/ftp

El rango de puertos para el modo pasivo que abrimos en el firewall es 40000 - 50000. Indicamos a *vsftpd* que utilice este rango.

	pasv_min_port=40000
	pasv_max_port=50000

Dado que queremos permitir el acceso ftp usuario a usuario, vamos a crear un archivo donde ir declarando los que podrán acceder.

	userlist_enable=YES
	userlist_file=/etc/vsftpd.userlist
	userlist_deny=NO

Escribimos el nombre del usuario dentro del archivo *userlist*

	echo "usuario" | sudo tee -a /etc/vsftpd.userlist

Reiniciamos el servicio

	sudo systemctl restart vsftpd

# Apache debe saber dónde están los archivos del usuario

Editamos el archivo */etc/apache2/apache2.conf* y añadimos lo un directorio

	<Directory /direcrtorio/del/usaurio/ftp/>
			Options Indexes FollowSymLinks
			AllowOverride None
			Require all granted
			Allow from all
	</Directory>

# Apache no puede ver los archivos subidos por *ftp*

Por defecto los archivos se crean con permisos sólo para el usuario. Para que *Apache* pueda acceder a los archivos subidos, debemos indicarle a *vsftpd* que de permisos de lectura a los archivos subidos. En *vsfptd.conf* añadimos:

	local_umask=022


**Actividad 5**. Configura el servidor para que permita a un usuario subir archivos hasta su directorio raíz. Después, comprueba que funciona subiendo un archivo *.html*.
