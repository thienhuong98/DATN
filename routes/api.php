<?php

use App\Http\Controllers\Auth\LoginController as LoginController;
use App\Http\Controllers\Auth\RegisterController as RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// api/auth
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('register', [RegisterController::class, 'register']);
});
Route::post('login', [LoginController::class, 'login']);
Route::group(['middleware' => 'auth.jwt'], function (){
    Route::get('logout', [LoginController::class, 'logout']);
});
