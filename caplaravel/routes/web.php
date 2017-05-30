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






Route::post('/', function () {
    return view('welcome');
});


// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/contact', function () {
//     return "Hi i'm a contact";
// });

Route::get('post/{id}/{name}',function($id,$name)
{
   return "This is post number " . $id . $name;
});

Route::get('admin/posts/example',
    array('as'=>'admin.home', function(){
        $url=route('admin.home');
        return "this url is " . $url;
    }));

// /admin

// /admin/personas
// /admin/personas/nuevo
// /admin/compras



// Route::get('/post/{id}','PostController@index');

 Route::resource('posts', 'PostController');

// Route::get('Post/contact','PostController@contact');



// Route::get('post/{id}/{name}/{password}','PostController@show_post');

