<?php

Route::get('/', 'Home')->name('home');
Route::get('/dashboard', 'Dashboard')->name('dashboard')->middleware('auth');
Route::get('/tree-recursive', 'TreeIndonesiaController@startRecursive');
Route::get('/tree-nested', 'TreeIndonesiaController@startNestedSet');