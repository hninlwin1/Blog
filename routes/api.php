<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('contact',function(){
//     return response()->json(['status'=>'OK','success'=>true],200);
// })->middleware('CheckAge','CheckGender');


// Route::middleware('CheckAge')->group(function(){
//     Route::get('contact',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     });
//     Route::get('home',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     });
//     Route::get('about',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     })->withoutMiddleware('api');
// });


// Route::middleware('validation','customAuth')->group(function(){
//     Route::post('home',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     })->withoutMiddleware('customAuth');

//     Route::post('contact',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     });
//     Route::post('about',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     });
//     Route::post('profile',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     });
//     Route::post('other',function(){
//         return response()->json(['status'=>'OK','success'=>true],200);
//     });
// });


// Route::post('/arrays', function () {
//     return response()->json(['status' => 'NG', 'message' => 'No input data is found!'], 200);
// })->middleware('CheckJson');

// Route::prefix("/products")->namespace('API')->group(function () {

//     Route::post('/create', 'ProductController@create');
//     Route::post('/', 'ProductController@index');
//     Route::put('/update/{id}', 'ProductController@update');
//     Route::delete('/{id}', 'ProductController@delete');
// });

Route::resource("products", API\ProductController::class);

Route::resource("categories", API\CategoryController::class);
