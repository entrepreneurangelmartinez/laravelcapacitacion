# laravelcapacitacion Proyecto de la capacitación Laravel impartida a la empresa Serteza en mayo-junio de 2017 Creando un proyecto Laravel "composer create-project --prefer-dist laravel/laravel caplaravel" #Generando un host virtual Ubicarse en la ruta:
D:\xampp\apache\conf\extra Se edita el archivo httpd-vhosts



<VirtualHost *:4700>
    DocumentRoot "D:/xampp/htdocs" ServerName localhost
</VirtualHost>

<VirtualHost *:4700>
    DocumentRoot "D:/xampp/htdocs/caplaravel/public" ServerName caplaravel.com
</VirtualHost>

Ahora hay que hacer una adición a nuestros servidor que es nuestra máquina local Generando nuestras primeras rutas acceder al archivo web.php Route::get('/', function () { return view('welcome'); }); Route::get('/about', function () { return "Hi aboutpage";
}); Route::get('/contact', function () { return "Hi i'm a contact"; }); ------------------------------- Generando rutas pasando parametros Route::get('post/{id}/{name}',function($id,$name) { return "This is post number " . $id . $name; }); -------------------------------
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

<br/>

<p><strong>Pasando parametros a las vistas </strong></p><br/>

<p>Para poder pasar parametros a una vista, la manera básica es usando get,sin embargo el comportamiento por post es distinto</p>
<p>Pasando 1 parámetro</p>

<p>Generamos una vista en la raíz </p>
<p>post.blade.php</p>
<code><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <h1>Post {{$id}}</h1>
</body>

</html></code>

<p>Generamos una ruta pasando el parametro y enrutandolo hacia la vista</p>
<p>web.php</p>
<br/>
<code>Route::get('post/{id}','PostController@show_post');</code>
<br>
<p>Para pasar múltiples parámetros, simplemente se usa el método compact dentro del controlador y se agrega los parámetros a la vista y al enrutador</p>
<hr>
<h1>Balde engine</h1>
<br>
<p><strong>Generando un masterlayout</strong></p>
<p>Generamos una carpeta layouts dentro de views</p>
<p>Creamos un archivo llamado app.blade.php</p>
<p>Dentro del archivo generamos una plantilla base y usamos @yield para dividir las secciones dinámicas</p>
<code><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="class container">
        @yield('content')
    </div>

    @yield('footer')
</body>

</html></code>

<br>
<p>Para implementar nuestro template simplemente extendemos nuestro archivo base @extends('layouts.app') y procedemos a generar el contenido encerrado en las etiquetas del motor @section('nombredelaseccionenyield') --contenido -- @endsection()
</p>
<br>
<code>@extends('layouts.app')
@section('content')
    <h1>Post {{$id}} {{$name}} {{$password}} </h1>
@endsection()  

@section('footer') 
<script>alert("Hi Angel")</script>
@endsection()</code>

<br/>
<h1>Migraciones</h1>
<br>
<p><strong>Generando nuestra primera migración</strong></p>
<br>
<p>Primero se edita el archivo .env con la configuración de la base de datos</p>
<p>A continuación se ejecuta el comando artesanal para la migración</p>
<br>
<code>php artisan migrate</code>
<br>
<p><strong>Creando una migración y haciendo drop sobre ella</strong></p>
<br>
<code>php artisan make:migration create_post_table --create="posts"</code>
<p>Ejecutamos la migracion</p>
<br>
<code>php artisan migration</code>
<br>
<p>Para poder regresar al último punto antes de la migración se usa el siguiente comando</p>

<code>php artisan migrate:rollback</code>

<br>
<p><strong>Agregar columna a una tabla ya existente usando migraciones</strong></p>

<code>php artisan make:migration add_is_admin_column_to_posts_table --table="posts"</code>

<br>
<code>
$table->integet('is_admin')->unsigned();
 $table->dropColumn('is_admin');
 </code>

<br>

<p>Procedemos a ejecutar la migración</p>
<br>
<code>php artisan migrate</code>

<br>
<p>Definiendo valores por defecto</p>
<br>
<code>$table->tinyInteger('is_admin')->default('0');</code>

<br>
<p><strong>Borrar todo de la migración</strong></p>
<code>php artisan migrate:reset</code>

<br>
<h1>Query</h1>
<br>
<p><strong>Insertar datos a una tabla</strong></p>
<br>
<code>Route::get('/insert', function() { 
   $x=DB::insert('insert into posts (title, body) values (?, ?)', ['La bamba uno', 'Trump baila música latina por perder apuesta']);
    return "b";
});</code>
<br>
<p><strong>Leer datos desde una tabla</strong></p>
<br>
<code>Route::get('/read' ,function()
{
    $x=DB::select('select * from posts where id = ?', [1]);
    return $x;
});</code>
<br>
<p><strong>Actualizar datos de una tabla</strong></p>
<br>
<code>Route::get('/update', function() {
    $updated=DB::update('update posts set title = "Hola actualizado" where id = ?', [1]);
    return $updated;
});</code>
<br>
<p><strong>Borrar datos de una tabla</strong></p>
<br>
<code>Route::get('deleted', function() {
    $deleted=
    DB::delete('delete from posts where id = ?', [2]);
    return $deleted;
});</code>
<br>
<h1>Eloquent</h1>
<br>
<p><strong>Lectura de datos</strong></p>
<br>
<p>Generando un modelo</p>
<br>
<code>php artisan make:model PostModel</code>
<br>
<p>Para generar un modelo y al mismo tiempo tener una migración ligada es de la siguiente manera:</p>
<br>
<code>php artisan make:model PostModel -m</code>
<br>
<p>Procedemos a realizar una lectura utilizando Eloquent desde una ruta</p>
<br>
<code>Route::get('/readeloquent', function() {
    $posts=Post::all();
    foreach ($posts as $post) {
        # code...
        // return $post->title;
    }
    // return "hello";
    return $posts;
});


Route::get('/find', function() {
    $post=Post::find(2);
    return $post->title;
});
</code>
<br>
<p><strong>Lectura y búsqueda con restricciones</strong></p>
<br>
<code>Route::get('/findwhere', function() {
    $post=Post::where('id',2)->orderBy('id','desc')->take(1)->get();

    // return var_dump($post);
    return $post;
});</code>
<br>
<p><strong>Insertando/Guardando datos</strong></p>
<br>
<code>Route::get('/basicinsert', function() {
    $post=new Post;
    $post->title="New Eloquent title insert";
    $post->body="Eloquent is amazin ORM for LARAVEL";
    $post->save();
});

Route::get('/basicinsert2', function() {
    $post=Post::find(1);
    $post->title="New Eloquent title insert";
    $post->body="Eloquent is amazin ORM for LARAVEL";
    $post->save();
});</code>
<br>
<p><strong>Creación de datos y configuración de la asignación de masa</strong></p>
<br>
<p>Hay un caso especial al momento de crear directamente datos, debido a la persistencia que se tiene que configurar como datos rellenables. Para resolver esto, se sobrescribe el comportamiento base en el modelo</p>
<br>
<p>Modelo</p>
<br>
<code> protected $fillable=
    [
        'title',
        'body'
    ];</code>
<br>
<p>Vista o Ruta</p>
<br>
<code>Route::get('/createmass', function() {
    //Cuando nosotros queremos insertar algo como un array asociativo
    // nos salde el error MassAssignmentException
    //para reparar el error se modifica el modelo con la propiedad fillable
    Post::create(['title'=>'the create method','body'=>'Learning with ISC. Angel Martínez ( Consultant in .NET and new technologies']);
});</code>
<br>
<p><strong>Actualizando con Eloquent</strong></p>
<br>
<code>Route::get('/updateeloquent', function() {
    //
    Post::where('id',2)->where('is_admin',0)->
    update(['title'=>'SERTEZA--------','body'=>'I love this Company']);
});</code>
<br>
<p><strong>Borrando datos usando Eloquent</strong></p>
<br>
<code>Route::get('/deleteeloquent', function() {
    $post=Post::find(1);
    $post->delete();
});

Route::get('/deleteeloquentwithdestroy', function() {
    //Otra manera de hacerl el borrado simple y múltiple
    Post::destroy(2);
    Post::destroy([4,5]);
    Post::where('is_admin',0)->delete();
});
</code>
<br>
<p><strong>Borrado suave / basura</strong></p>
<p>Este tipo de borrado es lógico no a nivel de base de datos</p>
<br>
<p>El primer paso es importar el objeto de base de datos(contexto)</p>
<br>
<code>use Illuminate\Database\Eloquent\SoftDeletes;</code>
<br>
<p>Se pone una referencia de columna al modelo</p>
<br>
<code>
    //Se incorpora la dependencia, sino no mapea hacia el arreglo
    use SoftDeletes;
    protected $date=['deleted_at'];</code>
<br>
<p>Se genera una nueva migración de base de datos</p>
<code>php artisan make:migration add_deleted_at_column_to_posts_tables --table=posts</code>
<br>
<p>Se procede a integrar en la migración el campo de borrado suave</p>
<br>
<code>
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
    </code>
<br>
<p>Ejecutamos nuestra migración</p>
<br>
<code>php artisan migrate</code>
<p>Se genera una ruta nueva para hacer pruebas</p>
<br>
<code>Route::get('/softdeleted', function() {
    Post::find(7)->delete();
});</code>
<br>
<p><strong>Devolviendo elemntos borrados/registros basura</strong></p>
<br>
<code>
Route::get('/readsoftdelete', function() {
    //
    // $post=Post::where('is_admin',0)->get();


    //Devolviendo  los registros con y sin basura
    // $post=Post::withTrashed()->get();

    //Devolviendo solo los registros basura

    $post=Post::onlyTrashed()->where('is_admin',0)->get();


    return $post;
});

</code>
<br>
