<?php

use App\Http\Controllers\API\ProductController;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

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

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// // Route::view('/welcome','welcome',['name'=>'Taylor']);

// // Route::get('/articles',function(){
// //     return 'Article details';
// // });

// // Route::get('/user/{id}',function($id){
// //     dd("user id = $id");
// // });
// // Route::get('/emp/{id}',function($id){
// //     dd("emp id: $id");
// // });
// // Route::get('post/{postid}/comment/{commentid}',function($postid,$commid){
// //     echo "post $postid : comment $commid";
// // });

// #optional parameters
// // Route::get('/user/{name?}',function($name=null){
// //     echo "$name";
// // });
// // Route::get('/user/{name?}',function($name='john'){
// //     echo "$name";
// // });



// #regular expression constraints 


// // Route::get('/user/{name}',function($name){
// //     echo "$name";
// // })->where('name','[a-zA-Z]+');

// // Route::get('/user/{id}/{name}',function($id,$name){
// //     echo $name . " : ". $id;
// // })->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);


// #named routes
// Route::redirect("user/status", 'emp');
// Route::get('user/emp', 'Controller@index')->name('emp');
// // Route::get('user/stu',function(){dd("This is student in web.php");})->name('stu');


// Route::get('/', function () {
//     $user = User::all();

//     return  View::make('pages.home', compact('user'));
// });

// Route::get('contact', function () {
//     return View::make('pages.contact');
// });
// Route::get('about', function () {
//     return View::make('pages.about');
// });
// Route::get('profile', function () {
//     return View::make('pages.profile');
// })->name('profile');
// Route::get('other', function () {
//     return View::make('pages.other');
// });
// Route::redirect("here", 'there');
// Route::get('there', function () {
//     echo "i am here.";
// });





#named routes
// Route::get('user/profile',function(){

//     return View::make('pages.profile');
// })->name('profile');

Route::get('api/users/{user}', function (App\Models\User $user) {
    return $user->email;
});

Route::resource('photo', PhotoController::class);

Route::resource('user', UserController::class);

// Route::post('/products/create', 'API\ProductController@create');
// Route::post('/products', 'API\ProductController@index');//cannot be done / success  on only get()
