<?php

//Rutas de Login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Ruta de Bienvenida
Route::get('/', 'PagesController@index')->name('inicio');

// Ruta de la Aplicacion

Route::get('/jsonapi', 'PagesController@jsonapi')->name('search');
Route::post('/jsonapi', 'PagesController@jsonapi')->name('searcho');
Route::get('/am', 'PagesController@am')->name('am');

//Route::post('/crearo', 'PagesController@crearo')->name('crearo');

//Ruta para revisar la BD
Route::get('/db', 'PagesController@dbcheck')->name('dbcheck');

//Rutas para jugar a ver un JSON después de mandar info en un formulario
Route::get('/songoku', 'PagesController@app')->name('app');

Route::post('/vivapatricio', 'PagesController@crear')->name('crear');

//Ruta secreta para exportar Usuarios
Route::get('users/export/', 'UsersController@export');



Route::view('welcome','welcome');

//Route::get('fotos/{numero?}',function($numero = 'sin número'){
//    return 'Estás en la galería de fotos: '.$numero;
//})->where('numero', '[0-9]+');

