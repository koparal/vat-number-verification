<?php

Route::get('/', ['as' => 'vies.index', 'uses' => 'ViesController@index']);
Route::post('/vies-validator', ['as' => 'vies.validator', 'uses' => 'ViesController@validator']);
