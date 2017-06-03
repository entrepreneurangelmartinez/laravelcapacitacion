<?php
use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use \Illuminate\Database\DatabaseManager;
// use \Illuminate\Database\Connection;

// use \Illuminate\Support\Facades\DB;

Route::post('/', function () {
    // DB::insert('insert into posts (title, body) values (?, ?)', ['La bamba uno', 'Trump baila música latina por perder apuesta']);
    return view('welcome');
});


// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/contact', function () {
//     return "Hi i'm a contact";
// });

// Route::get('post/{id}/{name}',function($id,$name)
// {
//    return "This is post number " . $id . $name;
// });

// Route::get('admin/posts/example',
//     array('as'=>'admin.home', function(){
//         $url=route('admin.home');
//         return "this url is " . $url;
//     }));

// /admin

// /admin/personas
// /admin/personas/nuevo
// /admin/compras



// Route::get('/post/{id}','PostController@index');

//  Route::resource('posts', 'PostController');

// Route::get('Post/contact','PostController@contact');



// Route::get('post/{id}/{name}/{password}','PostController@show_post');


//Raw sql queries-------------


Route::get('/insert', function() {

    //

    
   $x=DB::insert('insert into posts (title, body) values (?, ?)', ['La bamba uno', 'Trump baila música latina por perder apuesta']);
    return "b";
});


Route::get('/read' ,function()
{
    $x=DB::select('select * from posts where id = ?', [1]);
    return $x;
});


Route::get('/update', function() {
    $updated=DB::update('update posts set title = "Hola actualizado" where id = ?', [1]);
    return $updated;
});


Route::get('deleted', function() {
    $deleted=
    DB::delete('delete from posts where id = ?', [2]);
    return $deleted;
});

// ------------Eloquent-----------
Route::get('/readeloquent', function() {
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


Route::get('/findwhere', function() {
    $post=Post::where('id',2)->orderBy('id','desc')->take(1)->get();

    // return var_dump($post);
    return $post;
});


Route::get('/basicinsert', function() {
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
});


Route::get('/createmass', function() {
    //Cuando nosotros queremos insertar algo como un array asociativo
    // nos salde el error MassAssignmentException
    //para reparar el error se modifica el modelo con la propiedad fillable
    Post::create(['title'=>'the create method','body'=>'Learning with ISC. Angel Martínez ( Consultant in .NET and new technologies']);
});


Route::get('/updateeloquent', function() {
    //
    Post::where('id',2)->where('is_admin',0)->
    update(['title'=>'SERTEZA--------','body'=>'I love this Company']);
});


Route::get('/deleteeloquent', function() {
    $post=Post::find(1);
    $post->delete();
});

Route::get('/deleteeloquentwithdestroy', function() {
    //Otra manera de hacerl el borrado simple y múltiple
    Post::destroy(2);
    Post::destroy([4,5]);
    Post::where('is_admin',0)->delete();
});


Route::get('/softdeleted', function() {
    Post::find(7)->delete();
});


Route::get('/readsoftdelete', function() {
    //
    // $post=Post::where('is_admin',0)->get();


    //Devolviendo  los registros con y sin basura
    // $post=Post::withTrashed()->get();

    //Devolviendo solo los registros basura

    $post=Post::onlyTrashed()->where('is_admin',0)->get();


    return $post;
});


Route::get('/restoresfotdeleted', function() {
    Post::withTrashed()->where('is_admin',0)->restore();
});


Route::get('/forcedelete', function() {
    //Probar con un registro con softdelete y uno sin el
    Post::withTrashed()->where('id',7)->forceDelete();
});


//------------Eloquent ( Relaciones)--------

//Relación uno a uno
Route::get('/user/post/{id}', function($id) {
   return User::find($id)->post;
});

//Relación uno a uno
Route::get('/user/{id}/post', function($id) {
   return User::find($id)->post;
});

//Relación uno a uno (Relación inversa)
Route::get('/post/{id}/user', function($id) {
   return Post::find($id)->user;
});
