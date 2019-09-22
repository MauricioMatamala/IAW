# El firewall de Ubuntu UFW

UFW = Uncomplicated Firewall

La idea es simplificar la gestión de iptables.

## Instalar
	$ sudo apt install ufw
	
Para comprobar el estado del firewall:

	$ sudo ufw status verbose
	
Su estado por defecto es inactivo

## Habilitar ufw

	$ sudo ufw enable
Después de esto, se queda activiado incluso en reinicios.

## Políticas por defecto

- Permite salir a todo: 

	$ sudo ufw default deny incoming
	
- Bloquea todas las entradas

	$ sudo ufw default allow outgoing
	
- Configuración en */etc/default/ufw*

## Permitir un servicio
Listar los servicios disponibles:

	$ sudo ufw app list
		Apache
		Apache Full
		Apache Secure
		OpenSSH
		
Para entender qué puertos incluye cada etiqueta mostrada (por ejemplo, ¿Qué significa Apache Full?:

	$ sudo ufw app info "Apache Full"

Aplicar una regla para un servicio

	$ sudo ufw allow "Apache Full"

### Más información

En Internet hay mucha más información. Ej. [Referencia de Ubuntu](https://help.ubuntu.com/community/UFW)
