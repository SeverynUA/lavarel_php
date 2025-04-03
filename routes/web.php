<?php

use app\Services\UserService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function (UserService $userService) {
    return $userService->getUsers();
});

Route::resource('infos', InfoController::class);