# Securizar phpMyAdmin

Añadir una contraseña a nivel de servidor con *.htaccess*

#### Paso 1. 
Añadir la directiva *[AllowOverride ALL](https://httpd.apache.org/docs/2.4/mod/core.html#allowoverride)* al archivo /etc/apache2/conf-available/phpmyadmin.conf

NOTA: Añadir la directiva  debajo de *DirectoryIndex*.

#### Paso 2.
Reiniciar Apache2.

#### Paso 3.
Crear un archivo *.htaccess* en el directorio de la aplicación */usr/share/phpmyadmin/.htaccess*

Insertar el siguiente contenido:

	AuthType Basic
	AuthName "Usuarios de phpMyAdmin únicamente"
	AuthUserFile /etc/phpmyadmin/.htpasswd
	Require valid-user

#### Paso 4.
Instalar *htpasswd*, que está en el paquete *apache2-utils* si no está instalado.
	$ sudo apt install apache2-utils

 Después, crear un usuario seguro para phpMyAdmin:

	$ sudo htpasswd -c /etc/phpmyadmin/.htpasswd phpmyadmin
	New password:
	Re-type new password:
	Adding password for user phpmyadmin

# Soporte a virtual host
 
Un servidor Apache se utiliza normalmente para alojar más de un sitio web. Apache ofrece la posibilidad de configurar *[virtualhosts](https://httpd.apache.org/docs/2.4/vhosts/)* para ello.

Directivas asociadas:

- VirtualHost
- ServerName
- ServerAlias
- SereverPath

## Virtualhosts basados en nombre
Elección del sitio web en base a las cabeceras HTTP.
```
// Contenido añadido a httpd.conf
<VirtualHost *:80>
    # This first-listed virtual host is also the default for *:80
    # El símbolo '*' hace irrelevante el mapeado de direcciones IP
    ServerName www.example.com
    ServerAlias example.com  # Permite acceder al VH 
    							# mediante más de un nombre.
    DocumentRoot "/www/domain"
</VirtualHost>
```
La configuración se crea en la carpeta */etc/apache2/sites-available*. Luego se aplica usando el comando *a2ensite*. Ej. Para "site1.com.conf" :
	
	a2ensite site1.com
	
Hay que reiniciar el servidor para aplicar.

## Virtualhosts basados en IP
```
<VirtualHost 172.20.30.40:80>
    ServerAdmin webmaster@www1.example.com
    DocumentRoot "/www/vhosts/www1"
    ServerName www1.example.com
</VirtualHost>

<VirtualHost 172.20.30.50:80>
    ServerAdmin webmaster@www2.example.org
    DocumentRoot "/www/vhosts/www2"
    ServerName www2.example.org
</VirtualHost>
```

**Actividad 5.** Securiza *phpmyadmin* con htaccess

**Actividad 6.** Crea dos virtualhosts basados en nombre. Asegúrate de que sus directorios raíz están fuera del directorio por defecto de apache. En cada virtualhost, incluye un archivo html sencillo que permite distinguir los sitios.
