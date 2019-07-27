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

// Route::get('list/{page?}','HomeController@listProduct')->name('list-product');

// Route::get('test-name/{page}','HomeController@testName');

// Route::prefix('product')->group(function(){
//     Route::get('/','HomeController@index');
//     Route::get('add','HomeController@add');
// });



// Route::group(['prefix'=>'product'],function(){
//     Route::get('/','HomeController@index');
//     Route::get('add','HomeController@add');
// });

Route::get('register','HomeController@getRegister')->name('get-user-register');
Route::post('register','HomeController@postRegister')->name('user-register');

Route::get('upload-file','HomeController@getUpload')->name('upload-file');
Route::post('upload-file','HomeController@postUpload')->name('upload-file');

Route::get('test',function(){
    echo date('Y-m-d H:i:s', time());
});
// Route::match(['get','post'], 'register', 'HomeController@register' );
// php artisan config:cache
// php artisan cache:clear
// php artisan view:clear
// php artisan view:cache
// php artisan

Route::get('query-builder','QueryBuilderController@index');