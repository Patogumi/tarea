<?php

Route::get('/jsonapi', 'PagesController@jsonapi')->name('search');

Route::post('/jsonapi', 'PagesController@jsonapi')->name('searcho');

//Route::post('/crearo', 'PagesController@crearo')->name('crearo');

Route::get('/', 'PagesController@index')->name('inicio');

Route::get('/db', 'PagesController@dbcheck')->name('dbcheck');

Route::get('/songoku', 'PagesController@app')->name('app');

Route::post('/vivapatricio', 'PagesController@crear')->name('crear');





//Route::view('galeria','fotos');

//Route::get('fotos/{numero?}',function($numero = 'sin número'){
//    return 'Estás en la galería de fotos: '.$numero;
//})->where('numero', '[0-9]+');