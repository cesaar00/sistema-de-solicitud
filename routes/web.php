<?php
//use Illuminate\Routing\Route;
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

Route::get('/', function () {
    return view('welcome')->name('raiz');
});

Route::resource('/vale', 'ValeController');
Route::resource('/tarjeta', 'TarjetaController');
Route::resource('/vehiculo', 'VehiculoController');


/* Route::get('/vales',function(){
    return view('test');
}); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/home/{id}', 'HomeController@destroy')->name('home.destroy');

Route::resource('/home', 'HomeController')->only(['index', 'destroy']);
