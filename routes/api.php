<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
    Route::controller(AuthController::class)->middleware('api')->name("auth.")->group(
        function () {
            Route::get('/login', 'login')->name("login");
            Route::get('/register', 'register')->name("register");
        }
    );

    Route::middleware(['auth:api', 'api'])->group(
        function () {
            Route::controller(AuthController::class)->name("auth.")->group(
                function () {
                        Route::post('/refresh', 'refresh')->name("refresh");
                        Route::post('/logout', 'logout')->name("logout");
                        Route::get('/user', 'user')->name("user");
                    }
            );
            Route::resources([
                '/users' => UserController::class,
                '/countries' => CountryController::class,
            ]);
        }
    );
});
