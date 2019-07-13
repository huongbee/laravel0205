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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('trang-chu', function(){
//     return 1;
// });
// Route::get('chi-tiet/{id}-{alias}.html', function($idProduct, $alias){
//     echo $idProduct;
//     echo "--";
//     echo $alias;
// })->where([
//     'id' => '[0-9]+',
//     'alias' => '[a-zA-Z0-9]+'
// ])->name('chi-tiet');

// Route::get('chi-tiet/{id}-{alias}.html', [
//     'uses' => 'HomeController@getDetail',
//     'where' => ['id' => '[0-9]+','alias' => '[a-zA-Z]+'],
//     'name' => 'chi-tiet'
// ]);
// Route::get(
//     'chi-tiet/{id}-{alias}.html',
//     'HomeController@getDetail'
// );

Route::get('list/{page?}','HomeController@listProduct');
