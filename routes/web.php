<?php

Route::get('/', 'PagesController@index')->name('inicio');

Route::get('/songoku', 'PagesController@app')->name('app');

Route::get('fotos/{numero?}',function($numero = 'sin número'){
    return 'Estás en la galería de fotos: '.$numero;
})->where('numero', '[0-9]+');

Route::view('galeria','fotos');