# laravelcapacitacion
Proyecto de la capacitación Laravel impartida a la empresa Serteza en mayo-junio de 2017

Creando un proyecto Laravel

"composer create-project --prefer-dist laravel/laravel caplaravel"


#Generando un host virtual

Ubicarse en la ruta:
D:\xampp\apache\conf\extra

Se edita el archivo httpd-vhosts



<VirtualHost *:4700>
 DocumentRoot "D:/xampp/htdocs"
 ServerName localhost
</VirtualHost>

<VirtualHost *:4700>
 DocumentRoot "D:/xampp/htdocs/caplaravel/public"
 ServerName caplaravel.com
</VirtualHost>

Ahora hay que hacer una adición a nuestros servidor
que es nuestra máquina local



