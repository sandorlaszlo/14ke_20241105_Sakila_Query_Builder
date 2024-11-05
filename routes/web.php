<?php

use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actors', [QueryController::class, 'actors']);
Route::post('/actors', [QueryController::class, 'actorsByFirstName']);
// Route::get('/actors/{firstName}', [QueryController::class, 'actorsByFirstName']);
Route::get('/actors/{firstName}/{lastName}', [QueryController::class, 'actorsByName']);

Route::get('/actors/count', [QueryController::class, 'countFirstNames']);

Route::get('/categories', [QueryController::class, 'categories']);
