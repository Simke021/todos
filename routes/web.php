<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new', [
	'uses' => 'PagesController@new'
]);