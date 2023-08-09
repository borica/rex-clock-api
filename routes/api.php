<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/public', function () {
    return response()->json('Rex-Clock-Api is listening for requests.', Response::HTTP_OK);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api']], function () {
    Route::prefix('/user')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'getUserById');
            Route::post('/', 'create');
            Route::put('/{id}', 'getById');
            Route::delete('/{id}', 'destroy');
        });
    });
});
