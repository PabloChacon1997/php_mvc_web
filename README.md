# php_mvc_web
Proyecto  web de BienesRaices con codigo php y mysql con el patron MVC

Despues de clonar el repositorio, ejecutar los siguientes comandos:

"""
npm i o npm install
"""
y
"""
composer i o composer install
"""

Para levantar el proyecto acceder a la carpeta publi mediante la consola de windows:
"""
cd public/
"""
Una vez accedido a public ejecutar en el cmd o la consola de windows el siguiente comando:
"""
php -S localhost:3000
"""
El puesto se puede cambiar: localhost:<tu puerto>

En caso de errores con la carpeta public, copiar los archivos dentro de la carpeta extras y pegarlos dentro de la carpeta public
  
Este proyecto funciona de manera local por lo que es necesario una Base de Datos local en MySQL.
En la carpeta includes/config/database.php cambiar las configuraciones por las suyas, el puerto, usuario y constraseña de MySQL
