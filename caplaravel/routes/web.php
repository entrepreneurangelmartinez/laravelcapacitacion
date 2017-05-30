<?php

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
