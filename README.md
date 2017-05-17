# laravelcapacitacion Proyecto de la capacitación Laravel impartida a la empresa Serteza en mayo-junio de 2017 Creando un proyecto Laravel "composer create-project --prefer-dist laravel/laravel caplaravel" #Generando un host virtual Ubicarse en la ruta:
D:\xampp\apache\conf\extra Se edita el archivo httpd-vhosts



<VirtualHost *:4700>
    DocumentRoot "D:/xampp/htdocs" ServerName localhost
</VirtualHost>

<VirtualHost *:4700>
    DocumentRoot "D:/xampp/htdocs/caplaravel/public" ServerName caplaravel.com
</VirtualHost>

Ahora hay que hacer una adición a nuestros servidor que es nuestra máquina local Generando nuestras primeras rutas acceder al archivo web.php Route::get('/', function () { return view('welcome'); }); Route::get('/about', function () { return "Hi about
page"; }); Route::get('/contact', function () { return "Hi i'm a contact"; }); ------------------------------- Generando rutas pasando parametros Route::get('post/{id}/{name}',function($id,$name) { return "This is post number " . $id . $name; }); -------------------------------
Nombrando rutas para su acceso Route::get('admin/posts/example', array('as'=>'admin.home', function(){ $url=route('admin.home'); return "this url is " . $url; })); Ahora desde consola podemos verificar el nombre asignado. Nos ubicamos en la dirección
root del proyecto. Y tecleamos el siguiente comando: php artisan route:list Información complementaria de Routes https://laravel.com/docs/5.3/routing ----------------------------------------

<p><strong>Controllers</strong></p>
<p><strong>Generando un controlador con artisan</strong></p>
<code>php artisan make:controller PostsController</code>
<br/>
<p><strong>Generando un controlador con artisan implementando Andamiajes</strong></p>
<code>php artisan make:controller --resource PostController</code>

<p><strong>Enrutar hacia un controlador</strong></p>
<code>Route::get('/post','PostController@index');</code>
<br/>

<p><strong>Pasar datos a una accion del controlador</strong></p>
<p>web.php</p>
<code>Route::get('/post/{id}','PostController@index');</code>

<p>PostController.php</p>
<code>  public function index($id)
    {
        //

        return "Its working " . $id;
    }</code>

<br/>
<p> <strong>Implementando Recursos en nuestro controlador</strong> </p>
<p>web.php</p>
<br/>
<code>Route::resource('posts','PostController')</code>

<br/>
<p>El siguiente código te genera de manera automática un mapa de rutas predefinidas</p>
<p>Para comprobar el scaffold realizado utilizamos el comando:</p>
<code>php artisan route:list</code>