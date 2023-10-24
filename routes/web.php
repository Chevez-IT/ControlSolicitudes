<?php
use Core\Route;
Route::get('/', "ruta inicial GET");
Route::get('/api/{id}', "ruta inicial GET");
Route::get('/persona/{id}-{nombre}', "ruta inicial GET");
Route::group('/producto',function(){
    Route::get('/id', "pruducto id GET");
    Route::get('/nombre/{name}', "pruducto id GET");
});