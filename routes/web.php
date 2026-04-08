<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class, 'index']);

Route::get('/items/create', [ItemController::class, 'create']);

Route::post('/items', [ItemController::class, 'store']);

Route::get('/items/{id}/edit', [ItemController::class, 'edit']);

Route::put('/items/{id}', [ItemController::class, 'update']);

Route::post('/items/{id}', [ItemController::class, 'update']);

Route::post('/items/{id}/delete', [ItemController::class, 'destroy']);

Route::get('/items/{id}', [ItemController::class, 'show']);

