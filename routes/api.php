<?php

/**
 * Posts Route
 */
Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');

/**
 * Contacts Route
 */
Route::get('/contacts', 'ContactController@index');
Route::post('/contacts', 'ContactController@store');

