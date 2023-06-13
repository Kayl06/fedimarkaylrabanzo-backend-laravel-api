<?php

use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserPreference\RegisteredUserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/categories', [NewsController::class, 'categories']);

Route::get('/news/sources/', [NewsController::class, 'sources']);

Route::get('/news/authors/', [NewsController::class, 'authors']);

Route::post('/user/preference/', [RegisteredUserPreference::class, 'store']);

Route::post('/user/update-first-login/', [UserController::class, 'update']);





