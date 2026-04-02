<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class, 'index']);

Route::get('/items/create', [ItemController::class, 'create']);

Route::post('/items', [ItemController::class, 'store']);
