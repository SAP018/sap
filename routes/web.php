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

Route::middleware(['login'])->group(function () {
	Route::get('/', function() {
    return view('auth.login');
});
});


//middleware
Route::middleware(['auth'])->group(function () {
	//prefix de rutas
    Route::prefix('admin')->group(function(){
	Route::resource('user','userController');
	Route::get('user/{id}/destroy',[
		'uses' => 'UserController@destroy',
		'as'  =>   'admin.user.destroy'
		]);

	//rutas de los consumidores
	Route::resource('customer','CustomerController');


	//rutas para periodos
	Route::resource('period','PeriodController');
	Route::get('period/{id}/destroy',[
		'uses' => 'PeriodController@destroy',
		'as'  =>   'admin.period.destroy'
		]);

	//rutas para teams
	Route::resource('term','TermController');
	//rutas para las lecturas
	Route::resource('reading','ReadingController');
	Route::get('period1/{id?}/index',[
		'uses' => 'MostrarPeriodController@index',
		'as'  =>   'admin.period1.index'
		]);

	//ruta para pagar el ticket
	Route::get('reading/{id?}/index',[
		'uses' => 'ReadingController@pay',
		'as'  =>   'admin.reading.pay'
		]);

});
});


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


