<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\AuthorWebController;
use App\Http\Controllers\Web\BookWebController;

Route::get('/', function () {
    return redirect()->route('authors.index');
});

Route::resource('authors', AuthorWebController::class);
Route::resource('books', BookWebController::class);
