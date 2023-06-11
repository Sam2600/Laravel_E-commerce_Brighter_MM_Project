<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [ApiController::class, 'login']);

Route::group(["middleware"=>"jwt.auth"], function() {
    Route::get('me', [ApiController::class, 'me']);
});

Route::post('/register', [ApiController::class, 'register']);
