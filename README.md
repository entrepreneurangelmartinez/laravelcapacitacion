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

<hr>
<br> --------------------------
<p><strong>Creando vistas y customizar la acción</strong></p>

<p>Generamos nuestro método de acción</p>
<p>PostController.php</p>
<code>public function contact()
    {
        return view('contact');
    }</code>
<p>Nos dirijimos a la carpeta Views y creamos un nuevo directorio de UI llamado posts</p>
<p>Dentro de esa carpet agregamos un archivo llamado contact.blade.php</p>
<code><!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Contact Page
        </div>
    </div>
</div>
</body>
</html>
</code>

<p>Por último solo queda implementar nuestra nueva ruta hacia la vista en el archivo web.php</p>
<code>Route::get('Post/contact','PostController@contact');</code>