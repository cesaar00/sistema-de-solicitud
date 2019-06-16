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
    return redirect('/login');
});
Route::group(['middleware' => ['role:administrator']], function () {
    Route::resource('/vehiculo', 'VehiculoController');
    Route::resource('/tarjeta', 'TarjetaController');
    Route::resource('/relaciontarjeta','RelacionTarjetaController');
    Route::resource('/abono', 'AbonoController');
    Route::resource('/mantenimiento', 'MantenimientoController');
});

Route::group(['middleware' => ['role:vizor|administrator']], function () {
    Route::resource('/vehiculo', 'VehiculoController')->only(['index']);
    Route::resource('/tarjeta', 'TarjetaController')->only(['index']);
    Route::resource('/relaciontarjeta','RelacionTarjetaController')->only(['index']);
    Route::resource('/abono', 'AbonoController')->only(['index']);
    Route::resource('/mantenimiento', 'MantenimientoController')->only(['index']);
});



/* Route::get('/vales',function(){
    return view('test');
}); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/home/{id}', 'HomeController@destroy')->name('home.destroy');

Route::resource('/home', 'HomeController')->only(['index', 'destroy']);
